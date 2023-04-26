<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
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

        // get class teacher details for given grade and class
        $teacher = Teacher::select(["full_name"])->where("classes", "elemMatch", [
                        "grade" => $request->grade,
                        "class" => $request->class,
                        "end_year" => null
                    ])->first();

        // create response object
        $response = new \stdClass();

        // check query return any values
        if(!$students->isEmpty()) {
            $response->students = $students;
            $response->teacher = $teacher;
        }
            // if no any values for given data this will return
        else {
            $response->classStatus = 'newClass';
        }
        return json_encode($response);
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
            // create array to add for student enrollment using given data
            $enrollment = [
                'year' => $request->year,
                'grade' => $request->grade,
                'class' => $request->class,
                'isPayment' => 'no'
            ];

            // add given data for the student
            Student::where('index_number', $request->indexNumber)
                    ->push('enrollments', $enrollment);
            return 'success';
        }
            // if student have a class for given year, this will return
        else {
            // get student current grade and class and return them
            $enrollment = collect($student->enrollments)->firstWhere('year', $request->year);
            $grade = $enrollment['grade'];
            $class = $enrollment['class'];

            return "$grade-$class";
        }
    }

    public function add_teacher(Request $request) {
        // get Teacher details for given nic
        $teacher = Teacher::where('nic', $request->nic)->first();

        // create object for return response
        $response = new \stdClass();

        // check teacher exist or not
        if($teacher != null) {
            $class = collect($teacher->classes)->firstWhere('end_year', null);

            // check teacher already have a class or not
            if($class == null) {
                // create array to update teacher's classes details
                $record = [
                    "grade" => $request->grade,
                    "class" => $request->class,
                    "start_year" => $request->year,
                    "end_year" => null
                ];
                // update teacher's classes details
                Teacher::where('nic', $request->nic)
                        ->push('classes', $record);

                $response->status = 'success';
                $response->teacher = $teacher->full_name;
            }
                // this run if teacher doesn't have a class
            else {
                // return teacher current grade and class
                $grade = $class["grade"];
                $class = $class["class"];
                $response->status = 'exist';
                $response->class = "$grade-$class";
            }
        }
            // if teacher not exist return this
        else {
            $response->status = 'invalid';
        }
        return json_encode($response);
    }

    public function remove_teacher(Request $request) {

        // update searched class teacher end year as current year
        Teacher::where('_id', $request->teacherId)
        ->where('classes.end_year', null)
        ->update([
            'classes.$[elem].end_year' => date('Y')
        ],
        [
            'arrayFilters' => [
                ['elem.end_year' => null]
            ]
        ]);

        return 'success';
    }

    public function list_students() {
        $nic = auth()->user()->index;
        $current_year = Date("Y");
        $teacher = Teacher::select(['classes'])
                            ->where("nic", $nic)
                            ->where("classes", "elemMatch", [
                                "start_year" => [ '$lte' => $current_year ],
                                "end_year" => null
                            ])
                            ->first();
        if($teacher != null) {
            $object = null;
            foreach ($teacher->classes as $class) {
                if($class["end_year"] == null) {
                    $object = $class;
                }
            }

            $teacher_grade = session()->put('grade', $object["grade"]);
            $teacher_class = session()->put('class', $object["class"]);

            $students = Student::select(["index_number", "initial_name"])
                                ->where('enrollments', 'elemMatch', [
                'year' => $current_year,
                'grade' => session()->get('grade'),
                'class' => session()->get('class')
            ])->get();

            return view('teacher.attendance', [
                "students" => $students
            ]);
        }
    }
}
