<?php

namespace App\Http\Controllers;

use App\Mail\AbsentStudent;
use App\Mail\PresentStudent;
use App\Models\Student;
use App\Models\StudentAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use App\Jobs\AttendanceMailJob;

use function PHPUnit\Framework\isEmpty;

class AttendanceController extends Controller
{
    public function mark(Request $request) {
        $data = json_decode($request->data);

        // declare present and absent arrays 
        $present = $data->present;
        $absent = $data->absent;

        // get the date and year
        $date = $request->date;
        $year = \Carbon\Carbon::parse($date)->format('Y');
        $nic = auth()->user()->index;

        if($date > Date('Y-m-d')) {
            return 'future';
        }

        // check if the attendance is already marked
        $validate = StudentAttendance::where('class_teacher', $nic)
                    ->where('attendance.date', $date)->first();

        // if not marked, mark the attendance
        if($validate == null) {
            $teacher_class = TeacherController::getClass($nic, Date('Y'));
            // mark the attendance
            foreach($present as $item) {
                $student = StudentController::getStudent($item, auth()->user()->school);
                $attendance = StudentAttendance::where('index_number', $item)
                ->where('school', auth()->user()->school)
                ->where('year', $year)
                ->first();
                if($attendance == null) {
                    $attendance_data = new StudentAttendance();
                    $attendance_data->index_number = $item;
                    $attendance_data->name = $student->initial_name;
                    $attendance_data->class_teacher = $nic;
                    $attendance_data->year = $year;
                    $attendance_data->grade = $teacher_class->grade;
                    $attendance_data->school = auth()->user()->school;
                    $attendance_data->attendance = [];
                    $attendance_data->save();

                    $attendance = $attendance_data;
                } 

                $attendance->push('attendance', [
                    'date' => $date,
                    'status' => 'present'
                ], true);

                $data = [
                    "guardian_name" => $student->mother_name,
                    "date" => $date,
                    "student_name" => $student->full_name,
                    "email" => $student->emergency_email,
                    "status" => 'present'
                ];

                dispatch(new AttendanceMailJob($data));
            }

            foreach($absent as $item) {
                $student = StudentController::getStudent($item, auth()->user()->school);
                $attendance = StudentAttendance::where('index_number', $item)
                ->where('school', auth()->user()->school)
                ->where('year', $year)
                ->first();
                if($attendance == null) {
                    $attendance_data = new StudentAttendance();
                    $attendance_data->index_number = $item;
                    $attendance_data->name = $student->initial_name;
                    $attendance_data->class_teacher = $nic;
                    $attendance_data->year = $year;
                    $attendance_data->grade = $teacher_class->grade;
                    $attendance_data->school = auth()->user()->school;
                    $attendance_data->attendance = [];
                    $attendance_data->save();

                    $attendance = $attendance_data;
                } 

                $attendance->push('attendance', [
                    'date' => $date,
                    'status' => 'absent'
                ], true);

                $data = [
                    "guardian_name" => $student->mother_name,
                    "date" => $date,
                    "student_name" => $student->full_name,
                    "email" => $student->emergency_email,
                    "status" => 'absent'
                ];
                
                dispatch(new AttendanceMailJob($data));
            }

            return 'success';
        } else {
            return 'already';
        }
    }

    public function search(Request $request) {
        $nic = auth()->user()->index;
        $students = StudentAttendance::where('class_teacher', $nic)
        ->where('school', auth()->user()->school)
        ->where('attendance.date', $request->date)
        ->get();
        $response = [];
        if(empty($student)) {
            foreach ($students as $student) {
                foreach ($student["attendance"] as $attendance) {
                    if($attendance["date"] == $request->date){
                        $obj = new \stdClass();
                        $obj->name = $student["name"];
                        $obj->index = $student["index_number"];
                        $obj->status = $attendance["status"];
                        $obj->date = $attendance["date"];
                        array_push($response, $obj);
                    }
                }
            }
            return $response;
        }
    }

    public function update(Request $request) {
        $newStatus = null;
        $response = null;
        if($request->status == 'present') {
            $newStatus = 'absent';
            $response = 'false';
        } else {
            $newStatus = 'present';
            $response = 'true';
        }

        $attendance = StudentAttendance::where('index_number', $request->index)
        ->where('school', auth()->user()->school)
        ->where('attendance.date', $request->date)
        ->first();

        // Update the value in the object in the array
        $attendance->attendance = collect($attendance->attendance)->map(function ($item) use ($newStatus, $request) {
            if ($item['date'] == $request->date) {
                $item['status'] = $newStatus;
            }
            return $item;
        })->toArray();

        // Save the updated document
        $attendance->save();

        return $response;
    }

    public static function getSchoolHoldDateCount($year, $grade) {
        $dates = StudentAttendance::select('attendance.date')
        ->where('year', $year)
        ->where('grade', $grade)
        ->where('school', auth()->user()->school)
        ->distinct('attendance.date')
        ->count();
        return $dates;
    }

    public function navigateToStudentAttendance($year = null) {
        $index = auth()->user()->index;
        if($year == null) {
            $year = Date("Y");
        }
        $attendance = self::gatherStudentAttendance($index, $year);

        return view('student.attendance', [
            "attendance" => $attendance
        ]);
    }

    public static function gatherStudentAttendance($index, $year) {
        $attendance = StudentAttendance::select('attendance')
        ->where("index_number", $index)
        ->where("year", $year)
        ->where('school', auth()->user()->school)
        ->first();

        if($attendance != null) {
            return $attendance->attendance;
        }
    }
}
