<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SportTable;
use App\Mail\TeacherManual;
use App\Mail\GeneralMeeting;
use App\Mail\StudentTrip;
use App\Mail\UpcomingExam;
use App\Mail\ParentsMeeting;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendTimetable(Request $request) {
        $students = SportController::getStudentList($request->sport);
        $data = [
            "Sport" => $request->sport,
            "Day" => $request->day,
            "Place" => $request->place,
            "Start_Time" => $request->startTime,
            "End_Time" => $request->endTime,
            "Description" => $request->description,
        ];
        foreach ($students as $student) {
            $data["student_name"] = $student["name"];
            Mail::to($student["email"])->send(new SportTable($data));
        }
    }

    public function manual() {
        $emails = json_decode(request()->emails);
        $data = [
            "student_name" => "Student",
            "teacher_name" => auth()->user()->name,
            "subject" => request()->subject,
            "message" => request()->content,
        ];
        foreach ($emails as $email) {
            Mail::to($email)
            ->send(new TeacherManual($data));
        }
    }

    public function general_meeting() {
        $teacher = TeacherController::getClass(auth()->user()->index, Date("Y-m-d"));
        if($teacher == null) {
            return 'not_a_class_teacher';
        }
        $students = ClassController::getStudentList($teacher->grade, $teacher->class, Date("Y"));
        $data = [
            "date" => request()->date,
            "time" => request()->time,
            "place" => request()->place,
            "subject" => request()->subject,
            "teacher" => auth()->user()->name,
        ];
        foreach ($students as $s) {
            $student = StudentController::getStudent($s->index_number, auth()->user()->school);
            $data["student"] = $student->initial_name;
            Mail::to($student->emergency_email)->send(new GeneralMeeting($data));
        }
    }

    public function school_trip() {
        $teacher = TeacherController::getClass(auth()->user()->index, Date("Y-m-d"));
        if($teacher == null) {
            return 'not_a_class_teacher';
        }
        $students = ClassController::getStudentList($teacher->grade, $teacher->class, Date("Y"));
        $data = [
            "teacher" => auth()->user()->name,
            "firstPlace" => explode(",", request()->viewpoints)[0],
            "duration" => request()->duration,
            "date" => request()->date,
            "place" => request()->place,
            "time" => request()->time,
            "viewpoints" => request()->viewpoints,
            "things" => request()->things,
            "amount" => request()->amount,
            "deadline" => request()->deadline,
        ];
        foreach ($students as $s) {
            $student = StudentController::getStudent($s->index_number, auth()->user()->school);
            $data["student"] = $student->initial_name;
            Mail::to($student->emergency_email)->send(new StudentTrip($data));
        }
    }

    public function exam_details() {
        $teacher = TeacherController::getClass(auth()->user()->index, Date("Y-m-d"));
        if($teacher == null) {
            return 'not_a_class_teacher';
        }
        $students = ClassController::getStudentList($teacher->grade, $teacher->class, Date("Y"));
        $data = [
            "subjects" => json_decode(request()->obj)->subjects,
            "dates" => json_decode(request()->obj)->dates,
            "startTimes" => json_decode(request()->obj)->startTime,
            "endTimes" => json_decode(request()->obj)->endTime,
            "teacher_name" => auth()->user()->name,
            "category" => request()->exam,
        ];
        foreach ($students as $s) {
            $student = StudentController::getStudent($s->index_number, auth()->user()->school);
            $data["student_name"] = $student->initial_name;
            Mail::to($student->emergency_email)->send(new UpcomingExam($data));
        }
    }

    public function parent_meeting() {
        $teacher = TeacherController::getClass(auth()->user()->index, Date("Y-m-d"));
        if($teacher == null) {
            return 'not_a_class_teacher';
        }
        $students = ClassController::getStudentList($teacher->grade, $teacher->class, Date("Y"));
        $data = [
            "date" => request()->date,
            "time" => request()->time,
            "place" => request()->place,
            "teacher_name" => auth()->user()->name,
        ];
        $parents = [];
        foreach ($students as $s) {
            $student = StudentController::getStudent($s->index_number, auth()->user()->school);
            
            $obj1 = new \stdClass();
            $obj1->name = "Mr. $student->father_name";
            $obj1->email = $student->father_email;
            array_push($parents, $obj1);

            $obj2 = new \stdClass();
            $obj2->name = "Mrs. $student->mother_name";
            $obj2->email = $student->mother_email;
            array_push($parents, $obj2);
        }

        foreach ($parents as $parent) {
            $data["parent_name"] =  $parent->name;
            Mail::to($parent->email)->send(new ParentsMeeting($data));
        }
    }

    public function manual_all() {
        $teacher = TeacherController::getClass(auth()->user()->index, Date("Y-m-d"));
        if($teacher == null) {
            return 'not_a_class_teacher';
        }
        $students = ClassController::getStudentList($teacher->grade, $teacher->class, Date("Y"));
        foreach ($students as $s) {
            $student = StudentController::getStudent($s->index_number, auth()->user()->school);
            $data = [
                "student_name" => $student->initial_name,
                "teacher_name" => auth()->user()->name,
                "subject" => request()->heading,
                "message" => request()->content,
            ];
            Mail::to($student->emergency_email)->send(new TeacherManual($data));
        }
    }
}