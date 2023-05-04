<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Marks;
use App\Models\Student;
use App\Models\StudentAttendance;
use App\Models\StudentsSubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function add(Request $request) {
        $student = Student::where('index_number', '=', strval($request->studentIndexNumber))->first();

        if($student == null) {
            $user = new User();
            $user->name = $request->studentInitialName;
            $user->index = $request->studentIndexNumber;
            $user->email = $request->emergrencyEmail;
            $user->password = Hash::make($request->studentPassword);
            $user->role = "student";

            // this return true if user added
            $userAdded = $user->save();

            $student = new Student();

            // student personal details
            $student->full_name = $request->studentFullName;
            $student->initial_name = $request->studentInitialName;
            $student->date_of_birth = $request->studentDateOfBirth;
            $student->index_number = $request->studentIndexNumber;
            $student->enroll_year = $request->enrollYear;
            $student->enroll_class = $request->enrollclass;
            $student->distance = $request->distanceToSchool;
            $student->previous_school = $request->previousSchool;
            $student->gender = $request->gender;
            $student->nationality = $request->nationality;
            $student->religion = $request->religion;
            $student->travel_method = $request->travelMethod;
            $student->scholarship = $request->scholarship;

            // student's mother's details
            $student->mother_name = $request->motherName;
            $student->mother_nic = $request->motherNIC;
            $student->mother_mobile = $request->motherNumber;
            $student->mother_job = $request->motherJob;
            $student->mother_job_address = $request->motherJobAddress;
            $student->mother_email = $request->motherEmail;

            // student's father's details
            $student->father_name = $request->fatherName;
            $student->father_nic = $request->fatherNIC;
            $student->father_mobile = $request->fatherNumber;
            $student->father_job = $request->fatherJob;
            $student->father_job_address = $request->fatherJobAddress;
            $student->father_email = $request->fatherEmail;

            // student's guardian's details (not compulsory)
            $student->guardian_name = $request->guardianName;
            $student->guardian_nic = $request->guardianNIC;
            $student->guardian_mobile = $request->guardianNumber;
            $student->guardian_job = $request->guardianJob;
            $student->guardian_job_address = $request->guardianJobAddress;
            $student->guardian_email = $request->guardianEmail;

            // student's contact information
            $student->emergency_number = $request->emergrencyNumber;
            $student->emergency_email = $request->emergrencyEmail;
            $student->address = $request->address;

            // this return true if Student Added
            $studentAdded = $student->save();

            // check data added for students and users collection
            if($studentAdded && $userAdded) {
                $data = [
                    'student_name' => $request->studentInitialName,
                    'login' => $request->studentIndexNumber,
                    'password' => $request->studentPassword,
                ];
                // $this->sendWelcomeMail($data, $request->emergrencyEmail);
                Mail::to($request->emergrencyEmail)->send(new WelcomeMail($data));
                return 'success';
            } else {
                return 'error';
            }
            // A student already exist with given index number
        } else {
            return 'exist';
        }
    }

    public function show($id) {
        // search student by given index number
        $student = Student::where('index_number', $id)->first();

        // check previous query return a value or not
        if($student != null){
            return $student;
        }
        // if query didn't recieve a value output return as invalid
        else {
            return 'invalid';
        }
    }

    public function searchMarks(Request $request) {
        $marks = MarksController::show(auth()->user()->index, $request->year, $request->term);
        if($marks == null) {
            return 'noData';
        } else {
            $average = $marks->total / count($marks->details);
            $student = StudentController::getClass(auth()->user()->index, $request->year);
            $response = new \stdClass();
            $response->marks = $marks->details;
            $response->total = $marks->total;
            $response->place = MarksController::getPlace($student["grade"], $student["class"], $request->year, $request->term, auth()->user()->index);
            $response->average = $average;
            return $response;
        }
    }

    public static function getAttendancePrecentage($index, $year) {
        $attendace_data = StudentAttendance::select('attendance')->where('index_number', $index)->where('year', $year)->first();
        $dateCount = AttendanceController::getSchoolHoldDateCount(Date("Y"));
        $present_count = 0;
        foreach ($attendace_data->attendance as $item) {
            if($item["status"] == "present") {
                $present_count++;
            }
        }
        return round(($present_count / $dateCount) * 100, 3);
    }

    public static function getClass($index, $year) {
        $student = Student::where('index_number', $index)->where('enrollments.year', $year)->first();
        if($student != null) {
            foreach ($student->enrollments as $class) {
                if($class["year"] == $year) {
                    return $class;
                }
            }
        }
    }

    public function navigateToMarks() {
        $all = Marks::where('index_number', auth()->user()->index)->get();
        $years = [];

        if($all != null) {
            foreach ($all as $item) {
                if(!in_array($item["year"], $years)) {
                    array_push($years, $item["year"]);
                }
            }
        }
        sort($years);
        return view('student.marks', [
            'years' => $years
        ]);
    }

    public function navigateToSubject() {
        $student = self::getClass(auth()->user()->index, Date("Y"));
        $aesthetic = null;
        $ol = null;
        $al = null;
        if($student["grade"] == 5) {
            $subject = StudentsSubject::where('category', 'aesthetic')
            ->where('deadline', '>=', Date("Y-m-d"))
            ->first();
            if($subject != null) {
                $aesthetic = "active";
            }
        } else if($student["grade"] == 9) {
            $subject = StudentsSubject::where('category', 'ol')
            ->where('deadline', '>=', Date("Y-m-d"))
            ->first();
            if($subject != null) {
                $ol = "active";
            }
        } else {
            $student = self::getClass(auth()->user()->index, Date("Y", strtotime('-1 year')));
            if($student["grade"] == 11) {
                $subject = StudentsSubject::where('category', 'al')
                ->where('deadline', '>=', Date("Y-m-d"))
                ->first();
                if($subject != null) {
                    $al = "active";
                }
            }
        }
        return view('student.subject', [
            'aesthetic' => $aesthetic,
            'ol' => $ol,
            'al' => $al
        ]);
    }
}
