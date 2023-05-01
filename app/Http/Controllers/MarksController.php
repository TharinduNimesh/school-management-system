<?php

namespace App\Http\Controllers;

use App\Models\Marks;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class MarksController extends Controller
{
    public function add(Request $request) {
        $data = json_decode($request->data);
        $student = Student::find($data->id);
        $validate = Marks::where('year', $data->year)
        ->where('term', $data->term)
        ->where('index_number', $student->index_number)->first();

        if($validate == null) {
            $getClass = StudentController::getClass($student->index_number, $data->year);
            $marks = new Marks();
            $marks->year = $data->year;
            $marks->term = $data->term;
            $marks->name = $student->initial_name;
            $marks->index_number = $student->index_number;
            $marks->grade = $getClass["grade"];
            $marks->class = $getClass["class"];
            $marks->details = [];
    
            $total = 0;
            foreach ($data->subjects as $subject) {
                $details = new \stdClass();
                $details->subject = $subject;
                $details->marks = $data->{$subject};
                $marks->push('details', $details);
    
                $total = $total + $data->{$subject};
            }
            $marks->total = $total;
            $marks->save();
        }
    }

    public function getUnmarkedStudents(Request $request) {
        $teacher = TeacherController::getClass(auth()->user()->index, $request->year);
        $students = ClassController::getStudentList($teacher->grade, $teacher->class, $request->year);
        $subjects = ClassController::getSubjects($teacher->grade);

        $response = [];
        foreach ($students as $student) {
            $validate = Marks::where('index_number', $student["index_number"])
            ->where('year', $request->year)
            ->where('term', $request->term)
            ->first();

            if($validate == null) {
                array_push($response, $student);
            }
        }

        $obj = new \stdClass();
        $obj->students = $response;
        $obj->subjects = $subjects;
        return json_encode($obj);
    }

    public function getSubjectsList(Request $request) {
        $teacher = TeacherController::getClass(auth()->user()->index, $request->year);
        $subjects = ClassController::getSubjects($teacher->grade);

        return $teacher->grade;
    }
}
