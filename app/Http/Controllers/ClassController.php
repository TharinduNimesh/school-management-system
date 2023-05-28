<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use MongoDB\BSON\ObjectId;
use \App\Models\Student;

class ClassController extends Controller
{
    public function search_register(Request $request)
    {

        // get student data from student collection for given grade, year and class
        $students = self::getStudentList($request->grade, $request->class, $request->year);

        // get class teacher details for given grade and class
        $teacher = self::getCurrentTeacher($request->grade, $request->class);

        // create response object
        $response = new \stdClass();

        // check query return any values
        if (!$students->isEmpty()) {
            $response->students = $students;
            $response->teacher = $teacher;
        }
        // if no any values for given data this will return
        else {
            if($teacher != null) {
                $response->teacher = $teacher;
                $response->students = [];
            } else {
                $response->classStatus = 'newClass';
            }
        }
        return json_encode($response);
    }

    public function remove_student(Request $request)
    {
        // Removal of year details provided from student enrollment details
        $update = Student::where('_id', $request->studentId)
            ->pull('enrollments', [
                'year' => $request->year
            ]);

        return 'success';
    }

    public function add_student(Request $request)
    {
        // search student have a class in given year
        $student = Student::where('index_number', $request->indexNumber)
        ->where('school', auth()->user()->school)
        ->where('enrollments.year', $request->year)
        ->first();

        // check student have a class or not
        if ($student == null) {
            // create array to add for student enrollment using given data
            $enrollment = [
                'year' => $request->year,
                'grade' => $request->grade,
                'class' => strtoupper($request->class),
                'isPayment' => 'no'
            ];

            // add given data for the student
            StudentController::getStudent($request->indexNumber, auth()->user()->school)
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

    public function add_teacher(Request $request)
    {
        // get Teacher details for given nic
        $teacher = TeacherController::getTeacher($request->nic, auth()->user()->school);

        // create object for return response
        $response = new \stdClass();

        // check teacher exist or not
        if ($teacher != null) {
            $class = collect($teacher->classes)->firstWhere('end_year', null);

            // check teacher already have a class or not
            if ($class == null) {
                // create array to update teacher's classes details
                $record = [
                    "grade" => $request->grade,
                    "class" => strtoupper($request->class),
                    "start_year" => $request->year,
                    "end_year" => null
                ];
                // update teacher's classes details
                TeacherController::getTeacher($request->nic, auth()->user()->school)
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

    public function remove_teacher(Request $request)
    {
        // update searched class teacher end year as current year
        Teacher::where('_id', $request->teacherId)
            ->where('classes.end_year', null)
            ->update(
                [
                    'classes.$[elem].end_year' => date('Y')
                ],
                [
                    'arrayFilters' => [
                        ['elem.end_year' => null]
                    ]
                ]
            );

        return 'success';
    }

    public function list_students()
    {
        $current_year = Date("Y");
        $details = TeacherController::getClass(auth()->user()->index, $current_year);

        $students = [];
        $status = "not_a_class_teacher";
        if($details != null) {
            $status = "class_teacher";
            $students = self::getStudentList($details->grade, $details->class, $current_year);
        }

        return view('teacher.attendance', [
            "students" => $students,
            "status" => $status,
        ]);
    }

    public function generateRegister() {
        $alreadyStudents = count(self::getStudentList(request()->grade, request()->class, request()->year));
        $class_teacher = self::getCurrentTeacher(request()->grade, request()->class);
        $point = 5;
        if(request()->grade > 11) {
            $point = 6;
        }
        $birthYear = request()->year - request()->grade - $point;
        $students = Student::where('date_of_birth', 'like', "$birthYear%")
        ->orWhere('date_of_birth', 'like', ($birthYear + 1) . "-01-%")
        ->where('school', auth()->user()->school)
        ->whereNull('resigned_at')
        ->get();

        $target_subject = null;
        $target_medium = null;
        if(request()->grade > 5 && request()->grade < 11) {
            $target_subject = 'aesthetics_subject';
            $target_medium = 'medium';
        } else if (request()->grade > 10 && request()->grade < 12) {
            $target_subject = 'ol_subject_1';
            $target_medium = 'ol_medium';
        } else if (request()->grade > 11) {
            $target_subject = 'al_scheme';
            $target_medium = 'al_medium';
        }

        $target_students = [];
        foreach ($students as $student) {
            $isValid = true;
            if($student->enrollments != null) {
                foreach ($student->enrollments as $enrollment) {
                    if($enrollment['year'] == request()->year) {
                        $isValid = false;
                    }
                }
            }
            if(request()->subject != "any") {
                if($student->subjects == null) {
                    $isValid = false;
                } else {
                    if(request()->subject == "Languages") {
                        $subjects = [
                            "Second Language (Sinhala)",
                            "Second Language (Tamil)",
                            "Pali",
                            "Sanskrit",
                            "French",
                            "German",
                            "Hindi",
                            "Japanese",
                            "Arabic",
                            "Korean",
                            "Chinese",
                            "Russian"
                        ];
                        if(!in_array($student->subjects[$target_subject], $subjects)) {
                            $isValid = false;
                        }
                    } else {
                        $student->subjects[$target_subject] == request()->subject ? null : $isValid = false;
                    }
                }
            }
            if(request()->medium != "any") {
                $student->subjects[$target_medium] == request()->medium ? null : $isValid = false;
            }
            if($isValid) {
                array_push($target_students, $student);
            }
        }
        $response = new \stdClass();

        if(count($target_students) == 0) {
            $response->status = "no_students";
            return $response;
        }else if(count($target_students) < request()->count) {
            $response->status = "not_enough";
        }
        $count = $alreadyStudents;
        foreach ($target_students as $student) {
            if($count == request()->count) {
                break;
            }
            $request = new Request([
                "indexNumber" => $student->index_number,
                "grade" => request()->grade,
                "class" => request()->class,
                "year" => request()->year,
            ]);
            $this->add_student($request);
            $count++;
        }

        if($class_teacher == null) {
            $teacher = Teacher::where('school', auth()->user()->school)
            ->where('classes.end_year', '!=', null)
            ->get();
            if(count($teacher) > 0) {
                $randomTeacher = $teacher->random(1)->first();;
                $record = new Request([
                    "nic" => $randomTeacher->nic,
                    "grade" => request()->grade,
                    "class" => request()->class,
                    "year" => request()->year
                ]);
                $this->add_teacher($record);
            }
        }
        if(!isset($response->status)) {
            $response->status = "success";
        }

        return $response;
    }

    public static function getStudentList($grade, $class, $year) {
        $students = Student::select(["index_number", "initial_name"])
        ->where('enrollments', 'elemMatch', [
            'year' => $year,
            'grade' => $grade,
            'class' => strtoupper($class)
        ])
        ->where('school', auth()->user()->school)
        ->where('resigned_at', null)
        ->get();

        return $students;
    }

    public static function getCurrentTeacher($grade, $class) {
        $teacher = Teacher::where("classes", "elemMatch", [
            "end_year" => null,
            "grade" => $grade,
            "class" => $class
        ])
        ->where("school", auth()->user()->school)
        ->first();

        return $teacher;
    }

    public static function getSubjects($grade) {
        $subjects = [];
        if($grade < 6) {
            $subjects = [
                "Buddhism",
                "Sinhala", 
                "Tamil", 
                "English",
                "Mathematics",
                "Environment"
            ];
        } else if($grade < 10) {
            $subjects = [
                "Buddhism",
                "Sinhala", 
                "Tamil", 
                "English",
                "Mathematics",
                "Science",
                "History",
                "Geography",
                "Civics",
                "Health",
                "PTS",
                "Aesthetics"
            ];
        } else if($grade < 12) {
            $subjects = [
                "Buddhism",
                "Sinhala", 
                "English",
                "Mathematics",
                "Science",
                "History",
                "Bucket_1",
                "Bucket_2",
                "Bucket_3"
            ];
        } else if ($grade < 14) {
            $subjects = [
                "Bucket_1",
                "Bucket_2",
                "Bucket_3",
                "General_English"
            ];
        }

        return $subjects;
    }
}
