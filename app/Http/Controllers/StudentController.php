<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Marks;
use App\Models\RequestedSubject;
use App\Models\Student;
use App\Models\StudentAttendance;
use App\Models\StudentsSubject;
use App\Models\LearningRecord;
use App\Models\User;
use App\Models\Sport;
use App\Models\BorrowedBook;
use App\Models\RequestedChanges;
use App\Models\SectionHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function add(Request $request) {
        $student = self::getStudent($request->studentIndexNumber, auth()->user()->school);

        if($student == null) {
            $user = new User();
            $user->name = $request->studentInitialName;
            $user->index = $request->studentIndexNumber;
            $user->email = $request->emergrencyEmail;
            $user->login = DeveloperController::generateLogin($request->studentIndexNumber, auth()->user()->school);
            $user->password = Hash::make($request->studentPassword);
            $user->role = "student";
            $user->school = auth()->user()->school;

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

            // add discipline marks
            $student->discipline_marks = 100;

            // add school to details
            $student->school = auth()->user()->school;

            // this return true if Student Added
            $studentAdded = $student->save();

            // check data added for students and users collection
            if($studentAdded && $userAdded) {
                $data = [
                    'student_name' => $request->studentInitialName,
                    'login' => DeveloperController::generateLogin($request->studentIndexNumber, auth()->user()->school),
                    'password' => $request->studentPassword,
                ];
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
        $student = self::getStudent($id, auth()->user()->school);

        // check previous query return a value or not
        if($student != null){
            return $student;
        }
        // if query didn't recieve a value output return as invalid
        else {
            return 'invalid';
        }
    }

    public function search($id) {
        $hasPermission = TeacherController::hasPermission(auth()->user()->index, $id);

        if(!$hasPermission) {
            return ["status" => "permission_denied"];
        }
        
        $student = $this->show($id);
        if($student != 'invalid') {
            $book = BorrowedBook::where('holder_id', $id)
            ->where('school', auth()->user()->school)
            ->where('returned', false)
            ->first();
            $class = self::getClass($id, Date("Y"));
            $response = [
                "status" => "success",
                "student" => $student,
                "class" => $class,
                "book" => $book,
                "attendance" => self::getAttendancePrecentage($id, Date("Y")),
            ];
            return $response;
        }
        return ["status" => "invalid"];
    }

    public function searchStudentForDiscipline(Request $request) {
        $student = $this->show($request->index);
        if($student != 'invalid') {
            $class = self::getClass($student->index_number, Date("Y"));
            $response = new \stdClass();
            $response->index = $student->index_number;
            $response->name = $student->initial_name;
            try {
                $response->class = $class["grade"] . " - " . $class["class"];
            } catch (\Throwable $th) {
                $response->class = "Not Enrolled";
            }
            if($student->discipline_marks == null) {
                $response->marks = 100;
            } else {
                $response->marks = $student->discipline_marks;
            }
            return $response;
        } else {
            return 'invalid';
        }
    }

    public function updateDiscipline(Request $request) {
        $student = self::getStudent($request->index, auth()->user()->school);
        if($student != null) {
            if($student->discipline_marks == null) {
                $student->discipline_marks = 100;
            }

            if($student->discipline_marks - $request->marks < 0) {
                return 'error';
            } else {
                $student->discipline_marks -= $request->marks;
                $details = $student->discipline_details;
                if($details == null) {
                    $details = array();
                }
                $newRecord = new \stdClass();
                $newRecord->date = Date("Y-m-d");
                $newRecord->marks = $request->marks;
                $newRecord->reason = $request->description;
                $newRecord->teacher = $request->teacher_id;
                $newRecord->teacher_name = $request->name;
                $newRecord->role = $request->role;

                array_push($details, $newRecord);
                $student->discipline_details = $details;
            }

            $student->save();
            return 'success';
        } else {
            return 'invalid';
        }
    }

    public function live(Request $request) {
        $students = Student::where("full_name", "like", "%$request->name%")
        ->where("school", auth()->user()->school)
        ->limit(10)
        ->get();


        $response = array();
        foreach ($students as $student) {
            $hasPermission = TeacherController::hasPermission(auth()->user()->index, $student->index_number);
            if($hasPermission) {
                $class = self::getClass($student->index_number, Date("Y"));
                $obj = new \stdClass();
                $obj->index = $student->index_number;
                $obj->name = $student->initial_name;
                try {
                    $obj->class = $class["grade"] . " - " . $class["class"];
                } catch (\Throwable $th) {
                    $obj->class = "Not Enrolled";
                }
        
                array_push($response, $obj);
            }
        }
        return $response;
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

    public function dismiss() {
        $response = null;
        $hasPermission = TeacherController::hasPermission(auth()->user()->index, request()->index);
        if($hasPermission) {
            $student = self::getStudent(request()->index, auth()->user()->school);
            if($student != null) {
                $NICs = [];
                array_push($NICs, $student->father_nic);
                array_push($NICs, $student->mother_nic);
                array_push($NICs, $student->guardian_nic);
                if(!in_array(request()->nic, $NICs)) {
                    $response = 'invalid_guardian';
                }
                $dismissals = $student->dismissals;
                if($dismissals == null) {
                    $dismissals = array();
                }
                $newRecord = new \stdClass();
                $newRecord->guardian_nic = request()->nic;
                $newRecord->guardian_name = request()->name;
                $newRecord->reason = request()->reason;
                $newRecord->date = Date("Y-m-d");
                $newRecord->time = Date("H:i:s");
                $newRecord->teacher = auth()->user()->index;
                $newRecord->teacher_name = auth()->user()->name;

                array_push($dismissals, $newRecord);

                $student->dismissals = $dismissals;
                $student->save();
                
                if($response == null) {
                    $response = 'success';
                }
            } else {
                $response = 'invalid_student';
            }
        } else {
            $response = 'permission';
        }

        return $response;
    }

    public function searchDismiss($index) {
        $student = self::getStudent($index, auth()->user()->school);
        if($student->dismissals == null) {
            return 'noData';
        } else {
            $response = [];
            foreach ($student->dismissals as $record) {
                $obj = new \stdClass();
                $obj->name = $student->initial_name;
                $obj->guardian_nic = $record["guardian_nic"];
                $obj->guardian_name = $record["guardian_name"];
                $obj->reason = $record["reason"];
                $obj->date = $record["date"];
                $obj->time = $record["time"];
                $obj->teacher = $record["teacher"];
                $obj->teacher_name = $record["teacher_name"];

                array_push($response, $obj);
            }

            return $response;
        }
    }

    public function requestProfileChanges() {
        $student = self::getStudent(auth()->user()->index, auth()->user()->school);
        $class = StudentController::getClass(auth()->user()->index, Date("Y"));
        $request = new RequestedChanges();
        $request->index_number = auth()->user()->index;
        $request->name = auth()->user()->name;
        $request->grade = $class["grade"];
        $request->class = $class["class"];
        $request->school = auth()->user()->school;
        $request->row = request()->row;
        $request->category = request()->category;
        $request->new = request()->new;
        $request->old = $student->{request()->row};
        $request->type = "text"; // profile text base changes and image base changes is known as category

        $saved = $request->save();

        if($saved) {
            return 'success';
        } else {
            return 'error';
        }
    }

    public function resign() {
        $student = self::getStudent(request()->index, auth()->user()->school);
        if($student != null) {
            $student->resigned_at = request()->date;
            if($student->sports != null) {
                $sports = [];
                foreach ($student->sports as $sport) {
                    $sport["end_date"] = Date("Y-m-d");
                    array_push($sports, $sport);
                }
                $student->sports = $sports;
            }
            $student->save();
            return 'success';
        } else {
            return 'invalid';
        }
    }

    public function changesAction() {
        $request = RequestedChanges::find(request()->id);
        if(request()->type == "approve") {
            $student = self::getStudent($request->index_number, auth()->user()->school);
            $student->{$request->row} = $request->new;
            $student->save();
        }
        $request->delete();

        return redirect()->back();
    }

    public function updateProfilePicture(Request $request) {
        $student = self::getStudent($request->index, auth()->user()->school);
        $base64 = explode(',', $request->base64);
        $image = base64_decode($base64[1]);
        $image_name = $student->index_number . '.png';

        if(Storage::put('public/profile/' . $image_name, $image)) {
            $student->profile_picture = $image_name;
            $student->save();
            return 'success';
        } else {
            return 'error';
        }
    }

    public static function getAttendancePrecentage($index, $year) {
        $attendace_data = StudentAttendance::select('attendance')
        ->where('index_number', $index)
        ->where('school', auth()->user()->school)
        ->where('year', $year)
        ->first();
        $student = self::getClass($index, $year);
        $dateCount = 0;
        if($student != null) {
            $dateCount = AttendanceController::getSchoolHoldDateCount(Date("Y"), $student["grade"]);
        }
        $present_count = 0;
        if($attendace_data != null) {
            foreach ($attendace_data->attendance as $item) {
                if($item["status"] == "present") {
                    $present_count++;
                }
            }
        }

        if($dateCount == 0) {
            return 0;
        }
        return round(($present_count / $dateCount) * 100, 3);
    }

    public static function getClass($index, $year) {
        $student = Student::where('index_number', $index)
        ->where('school', auth()->user()->school)
        ->where('enrollments.year', $year)
        ->first();
        if($student != null) {
            foreach ($student->enrollments as $class) {
                if($class["year"] == $year) {
                    return $class;
                }
            }
        }
    }

    public static function getStudent($index, $school) {
        $student = Student::where('index_number', $index)
        ->where('school', $school)
        ->first();
        return $student;
    }

    public function navigateToMarks() {
        $all = Marks::where('index_number', auth()->user()->index)
        ->where('school', auth()->user()->school)
        ->get();
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

    public function navigateToProfile() {
        $student = $this->show(auth()->user()->index);
        $attendance = $this->getAttendancePrecentage(auth()->user()->index, Date("Y"));
        $class = self::getClass(auth()->user()->index, Date("Y"));

        $house = new \stdClass();
        if(auth()->user()->index % 4 == 0) {
            $house->name = env("HOUSE_01_NAME");
            $house->color = env("HOUSE_01_COLOR");
        } else if(auth()->user()->index % 4 == 1) {
            $house->name = env("HOUSE_02_NAME");
            $house->color = env("HOUSE_02_COLOR");
        } else if(auth()->user()->index % 4 == 2) {
            $house->name = env("HOUSE_03_NAME");
            $house->color = env("HOUSE_03_COLOR");
        } else if(auth()->user()->index % 4 == 3) {
            $house->name = env("HOUSE_04_NAME");
            $house->color = env("HOUSE_04_COLOR");
        }

        return view('student.profile', [
            "student" => $student,
            "house" => $house,
            "class" => $class,
            "attendance" => $attendance
        ]);
    }

    public function navigateToSubject() {
        $student = self::getClass(auth()->user()->index, Date("Y"));
        $aesthetics = null;
        $ol = null;
        $al = null;
        $bucket_1 = null;
        $bucket_2 = null;
        $bucket_3 = null;

        if($student != null) {
            $category = null;
            $sampleSubject = null;
            if($student["grade"] == 5) {
                $category = "aesthetics";
                $sampleSubject = "aesthetics_subject";
            } else if($student["grade"] == 9) {
                $category = "ol";
                $sampleSubject = "ol_subject_1";
                $subjectList = SubjectController::getBucketSubjects($category);
                $bucket_1 = $subjectList->bucket_1;
                $bucket_2 = $subjectList->bucket_2;
                $bucket_3 = $subjectList->bucket_3;
            } else {
                $student = self::getClass(auth()->user()->index, Date("Y", strtotime('-1 year')));
                if($student["grade"] == 11) {
                    $category = "al";
                    $sampleSubject = "al_subject_1";
                }
            }

            if($sampleSubject != null && $category != null) {
                $validateIsRequest = RequestedSubject::where("index_number", auth()->user()->index)
                ->where("school", auth()->user()->school)
                ->where("category", $category)
                ->first();
                $isActivate = StudentsSubject::where('category', $category)
                ->where('school', auth()->user()->school)
                ->where('deadline', '>=', Date("Y-m-d"))
                ->first();
                if($validateIsRequest == null && $isActivate != null) {
                    $subjects = self::getStudent(auth()->user()->index, auth()->user()->school);
                    if(!isset($subjects->subjects[$sampleSubject])) {
                        $$category = "active";
                    }
                }
            }
        }
        return view('student.subject', [
            'aesthetic' => $aesthetics,
            'ol' => $ol,
            'al' => $al,
            "bucket_1" => $bucket_1,
            "bucket_2" => $bucket_2,
            "bucket_3" => $bucket_3
        ]);
    }

    public function navigateToFeedback() {
        $student = StudentController::getClass(auth()->user()->index, Date("Y"));
        
        $learningRecords = LearningRecord::where('class', $student["class"])
        ->where('grade', $student["grade"])
        ->where('school', auth()->user()->school)
        ->where('date', Date("Y-m-d"))
        ->get();

        $response = [];

        foreach ($learningRecords as $record) {
            $isValid = true;
            if($record->feedback != null) {
                foreach ($record->feedback as $feedback) {
                    if($feedback["index_number"] == auth()->user()->index) {
                        $isValid = false;
                    }
                }
            }
            if($isValid) {
                array_push($response, $record);
            }
        }

        return view('student.feedback', [
            'records' => $response
        ]);
    }

    public function navigateToSports() {
        $all = Sport::where('school', auth()->user()->school)->get();
        $sports = [];
        foreach ($all as $sport) {
            if(!in_array($sport->name, $sports)) {
                array_push($sports, $sport->name);
            }
        }

        return view('student.sports', [
            'sports' => $sports
        ]);
    }
}
