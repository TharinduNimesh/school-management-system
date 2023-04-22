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
}
