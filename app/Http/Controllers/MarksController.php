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
        ->where('index_number', $student->index_number)
        ->where('school', auth()->user()->school)
        ->first();

        if($validate == null) {
            $getClass = StudentController::getClass($student->index_number, $data->year);
            $marks = new Marks();
            $marks->year = $data->year;
            $marks->term = $data->term;
            $marks->name = $student->initial_name;
            $marks->index_number = $student->index_number;
            $marks->grade = $getClass["grade"];
            $marks->class = $getClass["class"];
            $marks->school = auth()->user()->school;
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
            ->where('school', auth()->user()->school)
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

    public function update(Request $request) {
        $record = Marks::find($request->id);
        $total = $record->total - $request->currentMarks + $request->marks;
        $details = $record->details;
        foreach ($details as &$marks) {
            if($marks["subject"] == $request->subject) {
                $marks["marks"] = $request->marks;
            }
        }
        $record->makeHidden('details'); // temporarily hide the "details" attribute
        $record->total = $total;
        $record->details = $details; // update the "details" attribute with the new array
        $record->makeVisible('details'); // make the "details" attribute visible again
        $record->save();
    }

    public function getSubjectsList(Request $request) {
        $teacher = TeacherController::getClass(auth()->user()->index, $request->year);
        $subjects = ClassController::getSubjects($teacher->grade);

        return $subjects;
    }

    public function getMarksForSubject(Request $request) {
        $terms = ["1", "2", "3"];
        $marks = [];

        foreach ($terms as $term) {
            $item = Marks::where("index_number", $request->index)
            ->where("grade", "9")
            ->where("school", auth()->user()->school)
            ->where("term", $term)
            ->first();
            if($item == null) {
                $item = new \stdClass();
                $item->details = [];
            }
            array_push($marks, $item->details); 
        }
        $response = new \stdClass();
        $response->marks = $marks;
        $response->subjects = ClassController::getSubjects(9);
        return $response;
    }

    public static function show($index, $year, $term) {
        $marks = Marks::where('index_number', $index)
        ->where("school", auth()->user()->school)
        ->where('year', $year)
        ->where('term', $term)
        ->first();

        return $marks;
    }

    public static function getPlace($grade, $class, $year, $term, $index) {
        $all = Marks::where('year', $year)
        ->where('school', auth()->user()->school)
        ->where('term', $term)
        ->where('grade', $grade)
        ->where('class', $class)
        ->get()
        ->toArray();

        if($all != null) {
            $collection = collect($all);
            $sortedCollection = $collection->sortByDesc('total');
            $place = 1;
            foreach($sortedCollection as $key => $item) {
                if($item["index_number"] == $index) {
                    return $place;
                }
                $place ++;
            }
        }
    }
}
