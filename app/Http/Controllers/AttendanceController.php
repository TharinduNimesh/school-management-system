<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class AttendanceController extends Controller
{
    public function mark(Request $request) {
        $data = json_decode($request->data);
        $present = $data->present;
        $date = $request->date;
        $year = \Carbon\Carbon::parse($date)->format('Y');
        $nic = auth()->user()->index;
        $validate = StudentAttendance::where('class_teacher', $nic)
                    ->where('attendance.date', $date)->first();

        if($validate == null) {
            foreach($present as $item) {
                $student = Student::where('index_number', $item)->first();
                $attendance = StudentAttendance::where('index_number', $item)
                                ->where('year', $year)->first();
                if($attendance == null) {
                    $attendance_data = new StudentAttendance();
                    $attendance_data->index_number = $item;
                    $attendance_data->name = $student->initial_name;
                    $attendance_data->class_teacher = $nic;
                    $attendance_data->year = $year;
                    $attendance_data->attendance = [
                        [
                            'date' => $date,
                            'status' => 'present'
                        ]
                    ];
                    $attendance_data->save();
    
                    $attendance = $attendance_data;
                } else {
                    $attendance_data = $attendance->attendance;
                    $attendance_data[] = [
                        'date' => $date,
                        'status' => 'present'
                    ];
                    $attendance->save();
                }
            }

            foreach($data->absent as $item) {
                $student = Student::where('index_number', $item)->first();
                $attendance = StudentAttendance::where('index_number', $item)
                                ->where('year', $year)->first();
                if($attendance == null) {
                    $attendance_data = new StudentAttendance();
                    $attendance_data->index_number = $item;
                    $attendance_data->name = $student->initial_name;
                    $attendance_data->class_teacher = $nic;
                    $attendance_data->year = $year;
                    $attendance_data->attendance = [
                        [
                            'date' => $date,
                            'status' => 'absent'
                        ]
                    ];
                    $attendance_data->save();
    
                    $attendance = $attendance_data;
                } else {
                    $attendance_data = $attendance->attendance;
                    $attendance_data[] = [
                        'date' => $date,
                        'status' => 'absent'
                    ];
                    $attendance->save();
                }
            }

            return 'success';
        } else {
            return 'already';
        }
    }
}
