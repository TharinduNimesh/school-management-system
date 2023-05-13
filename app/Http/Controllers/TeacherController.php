<?php

namespace App\Http\Controllers;

use App\Mail\TeacherWelcome;
use App\Models\LearningRecord;
use App\Models\Marks;
use App\Models\SectionHead;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class TeacherController extends Controller
{
    public function add(Request $request) {
        $teacher = Teacher::where('nic', '=', $request->teacherNIC)->whereNull('deleted_at')->first();

        if($teacher == null) {
            // make user object and store teacher's login details on it
            $user = new User();
            $user->name = "$request->teacherFirstName $request->teacherLastName";
            $user->password = Hash::make($request->teacherPassword);
            $user->role = "teacher";
            $user->email = $request->teacherEmail;
            $user->index = $request->teacherNIC;

            // save teacher login details on User collection
            $userAdded = $user->save();

            // create Teacher model object and set propeties
            $teacher = new Teacher();
            $teacher->first_name = $request->teacherFirstName;
            $teacher->last_name = $request->teacherLastName;
            $teacher->full_name = $request->teacherFullName;
            $teacher->date_of_birth = $request->teacherDateOfBirth;
            $teacher->nic = $request->teacherNIC;
            $teacher->appointed_subject = $request->appointedSubject;
            $teacher->gender = $request->teacherGender;
            $teacher->nationality = $request->teacherNationality;
            $teacher->religion = $request->teacherReligion;
            $teacher->qualifications = $request->qualification;

            // teacher's contact information
            $teacher->mobile = $request->teacherContactNumber;
            $teacher->email = $request->teacherEmail;
            $teacher->address = $request->address;

            // teacher resignation assign to null
            $teacher->deleted_at = null;

            // save teacher's information
            $teacherAdded = $teacher->save();

            // check is teacher added successfully for both collections
            if($teacherAdded && $userAdded) {
                $data = [
                    'teacher_name' => $request->teacherFullName,
                    'login' => $request->teacherNIC,
                    'password' => $request->teacherPassword
                ];
                Mail::to($request->teacherEmail)->send(new TeacherWelcome($data));
                return 'success';
            } else {
                return 'error';
            }
            // already a teacher exist with given nic number
        } else {
            return 'exist';
        }
    }

    public function show(Request $request) {
        $teacher = Teacher::where('nic', $request->nic)->first();
        if($teacher == null) {
            return "Invalid";
        } else {
            return $teacher;
        }
    }

    public function makeAsSectionHead(Request $request) {
        $section = SectionHead::where('section', $request->section)->whereNull('end_date')->first();
        $head = SectionHead::where('nic', $request->nic)->whereNull('end_date')->first();
        if($section != null) {
            if($section->end_date == null) {
                return 'sectionHasAHead';
            }
        } else if($head != null){
            return 'alreadyASectionHead';
        } else {
            $sectionHead = SectionHead::where('section', $request->grade)->first();
            if($sectionHead == null) {
                $newSectionHead = new SectionHead();
                $newSectionHead->section = $request->section;
                $newSectionHead->save();

                $sectionHead = $newSectionHead;
            }
            $teacher = Teacher::where('nic', $request->nic)->first();
            $sectionHead->name = $teacher->full_name;
            $sectionHead->nic = $teacher->nic;
            $sectionHead->mobile = $teacher->mobile;
            $sectionHead->appointed_date = Date("Y-m-d");
            $sectionHead->end_date = null;

            $sectionHead->save();

            return 'success';
        }
    }

    public function removeSectionHead(Request $request) {
        $section = SectionHead::find($request->id);
        $section->end_date = Date("Y-m-d");
        $section->save();

        return redirect()->back();
    }

    public static function getClass($nic, $year) {
        $teacher = Teacher::where('nic', $nic)->first();
        if($teacher != null) {
            foreach ($teacher->classes as $class) {
                if(intval($class["start_year"]) <= intval($year) && intval($class["end_year"] > intval($year)) || 
                intval($class["start_year"]) <= intval($year) && $class["end_year"] == null) {
                    $response = new \stdClass();
                    $response->grade = $class["grade"];
                    $response->class = $class["class"];
                    return $response;
                }
            }
        }
    }

    public function getStudentMarksToUpdate(Request $request) {
        $marks = MarksController::show($request->index, $request->year, $request->term);

        $response = new \stdClass();
        if($marks != null) {
            foreach ($marks->details as $item) {
                if($item["subject"] == $request->subject) {
                    $response->id = $marks->_id;
                    $response->marks = $item["marks"];
                    return $response;
                }
            }
        } else {
            $response->status = 'noData';
            return $response;
        }
    }

    public function teacherSearchMarks(Request $request) {
        $students = ClassController::getStudentList($request->grade, $request->class, $request->year);
        $marks = [];
        $subjects = ClassController::getSubjects($request->grade);
        
        foreach ($students as $student) {
            $getMarks = MarksController::show($student["index_number"], $request->year, $request->term);
            $object = new \stdClass();
            $object->index = $student["index_number"];
            $object->name = $student["initial_name"];
            if($getMarks != null) {
                $object->marks = $getMarks->details;
                $object->total = $getMarks->total;
                array_push($marks, $object);
            } else {
                $absentMarks = [];
                foreach ($subjects as $subject) {
                    $absentObj = new \stdClass();
                    $absentObj->subject = $subject;
                    $absentObj->marks = "ab";
                    array_push($absentMarks, $absentObj);
                }
                $object->marks = $absentMarks;
                $object->total = 0;
                array_push($marks, $object);
            }
        }

        usort($marks, function($a, $b) {
            return $b->total - $a->total;
        });

        $response = new \stdClass();
        $response->marks = $marks;
        $response->subjects = $subjects;
        return $response;
    }

    public function navigateToSummary() {
        $teacherDetails = self::getClass(auth()->user()->index, Date("Y"));
        $students = ClassController::getStudentList($teacherDetails->grade, $teacherDetails->class, Date("Y"));
        $array = [];
        foreach ($students as $student) {
            $obj = new \stdClass();
            $obj->name = $student["initial_name"];
            $obj->index = $student["index_number"];
            $obj->attendance = StudentController::getAttendancePrecentage($student["index_number"], Date("Y"));
            $obj->payment = PaymentController::hasPaidFee($student["index_number"], Date("Y"));
            array_push($array, $obj);
        }

        return view('teacher.summary', ['data' => $array]);
    }

    public function navigateToSectionHead() {
        $sectionHeads = SectionHead::whereNull('end_date')->get();

        return view('admin.sectionHead', [
            "sectionHeads" => $sectionHeads
        ]);
    }

    public function navigateToMarks() {
        $teacher = self::getClass(auth()->user()->index, Date("Y"));
        $students = ClassController::getStudentList($teacher->grade, $teacher->class, Date("Y"));
        $subjects = ClassController::getSubjects($teacher->grade);
        return view('teacher.marks', [
            "subjects" => $subjects,
            "students" => $students
        ]);
    }

    public function navigateToResultSheet() {
        $all = Marks::all();
        $years = [];
        foreach ($all as $item) {
            if(!in_array($item["year"], $years)) {
                array_push($years, $item["year"]);
            }
        }
        sort($years);
        return view('teacher.resultsheet', [
            'years' => $years
        ]);
    }

    public function navigateToFeedback() {
        $year = date("Y");
        $records = LearningRecord::where("nic", auth()->user()->index)
        ->where("date", "like", "$year%")
        ->orderBy("date", "desc")
        ->get();

        $response = [];

        foreach ($records as $record) {
            if($record["feedback"] != null) {
                foreach ($record["feedback"] as $feedback) {
                    $obj = new \stdClass();
                    $obj->id = $record["_id"];
                    $obj->student = $feedback["index_number"];
                    $obj->grade = $record["grade"];
                    $obj->class = $record["class"];
                    $obj->subject = $record["subject"];
                    $obj->comment = $feedback["comment"];
                    $obj->date = $record["date"];
                    $obj->rating = $feedback["rating"];
                    array_push($response, $obj);
                }
            }
        }

        return view('teacher.feedback', [
            "records" => $response
        ]);

    }
}
