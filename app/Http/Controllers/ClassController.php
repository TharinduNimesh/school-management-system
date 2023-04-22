<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use MongoDB\BSON\ObjectId;
use \App\Models\Student;

class ClassController extends Controller
{
    public function search_register(Request $request) {

        // get student data from student collection for given grade, year and class
        $students = Student::select(['index_number', 'initial_name'])
                            ->where('enrollments' , 'elemMatch', [
                                'year' => $request->year,
                                'grade' => $request->grade,
                                'class' => $request->class
                            ])
                            ->get();

        // check query return any values
        if(!$students->isEmpty()) {
            return $students;
        } 
            // if no any values for given data this will return
        else {
            $response = new \stdClass();
            $response->classStatus = 'newClass';
            return json_encode($response);
        }
    }

    public function remove_student(Request $request) {
        // Removal of year details provided from student enrollment details 
        $update = Student::where('_id' , $request->studentId)
                        ->pull('enrollments', [
                            'year' => $request->year
                        ]);

        return 'success';
    }

    public function add_student(Request $request) {
        // search student have a class in given year 
        $student = Student::where('index_number', $request->indexNumber)
                ->where('enrollments.year', $request->year)
                ->first();

        // check student have a class or not
        if($student == null) {
            $enrollment = [
                'year' => $request->year,
                'grade' => $request->grade,
                'class' => $request->class,
                'isPayment' => 'no'
            ];
            Student::where('index_number', $request->indexNumber)
                    ->push('enrollments', $enrollment);
            
            return 'success';
        }
            // if student have a class for given year, this will return
        else {
            $enrollment = collect($student->enrollments)->firstWhere('year', $request->year);
            $grade = $enrollment['grade'];
            $class = $enrollment['class'];

            return "$grade-$class"; 
        }
    }
}
