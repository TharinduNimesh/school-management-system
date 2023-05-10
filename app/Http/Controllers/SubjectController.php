<?php

namespace App\Http\Controllers;

use App\Models\RequestedSubject;
use App\Models\Student;
use App\Models\StudentsSubject;
use Illuminate\Http\Request;
use stdClass;

class SubjectController extends Controller
{
    public function activate(Request $request) {
        $permission = StudentsSubject::where('category', $request->category)->first();
        if($permission == null) {
            $newPermission = new StudentsSubject();
            $newPermission->category = $request->category;
            $newPermission->save();

            $permission = $newPermission;
        }

        $permission->status = "activate";
        $permission->deadline = $request->deadline;

        $permission->save();
    }

    public function studentAction(Request $request) {
        if($request->status == "accept") {
            $student = Student::where("index_number", $request->index)->first();
            if($student != null) {
                if($request->category == "aesthetics") {
                    $subjects = null;
                    if($student->subjects == null) {
                        $object = new stdClass();
                        $student->subjects = $object;
                        $subjects = $object;
                    } else {
                        $subjects = $student->subjects;
                    }
                    $subjects->aesthetics_subject = $request->subject;
                    $subjects->medium = $request->medium;
                }
                $student->save();
            }
        }
        $studentRequest = RequestedSubject::find($request->id);
        $studentRequest->delete();

        return "Success";
    }

    public function requestAestheticSubject(Request $request) {
        $subject = RequestedSubject::where('index_number', auth()->user()->index)->where('category', 'aesthetics')->first();
        if($subject == null) {
            $student = Student::where('index_number', auth()->user()->index)->first();
            $requestSubject = new RequestedSubject();
            $requestSubject->index_number = $student->index_number;
            $requestSubject->name = $student->initial_name;
            $requestSubject->category = 'aesthetics';
            $requestSubject->subject = $request->subject;
            $requestSubject->medium = $request->medium;

            $requestSubject->save();
        }
    }

    public function requestOlSubject(Request $request) {
        $request = json_decode($request->data);
        $index = auth()->user()->index ;
        $validate = RequestedSubject::where("index_number", $index)
        ->where("category", "ol")
        ->first();
        if($validate == null) {
            if($request->type == "one") {
                self::addOlSubjectRequestRecord($index ,$request->subjects);
            } else if($request->type == "two") {
                self::addOlSubjectRequestRecord($index, $request->first);
                self::addOlSubjectRequestRecord($index, $request->second);
            }

            return "success";
        } else {
            return "already";
        }
    }

    public static function addOlSubjectRequestRecord($index, $subjects) {
        $student = Student::where("index_number", $index)->first();
        $request = new RequestedSubject();
        $request->index_number = $index;
        $request->name = $student->initial_name;
        $request->category = 'ol';
        $request->subjects = $subjects;

        $request->save();
    }

    public function navigateToStudentSubject() {
        $aesthetic = StudentsSubject::where('category', 'aesthetics')->where('deadline', '>=', Date("Y-m-d"))->first();
        $ol = StudentsSubject::where('category', 'ol')->where('deadline', '>=', Date("Y-m-d"))->first();
        $al = StudentsSubject::where('category', 'al')->where('deadline', '>=', Date("Y-m-d"))->first();

        $aestheticRequests = RequestedSubject::where("category", "aesthetics")->get();
        $olRequests = RequestedSubject::where("category", "ol")->get();
        $olSubjects = self::getBucketSubjects("ol");

        if($aesthetic != null) {
            $aesthetic = "active";
        } 

        if($ol != null) {
            $ol = "active";
        } 

        if($al != null) {
            $al = "active";
        } 

        return view('admin.studentSubject', [
            "aesthetic" => $aesthetic,
            "ol" => $ol,
            "al" => $al,
            "aestheticRequests" => $aestheticRequests,
            "olRequests" => $olRequests,
            "ol_bucket_1" => $olSubjects->bucket_1,
            "ol_bucket_2" => $olSubjects->bucket_2,
            "ol_bucket_3" => $olSubjects->bucket_3
        ]);
    }

    public static function getBucketSubjects($category) {
        $response = new stdClass();
        if($category == "ol") {
            $bucket_1 = [
                "Business & Accounting Studies",
                "Geography",
                "Civic Education",
                "Entrepreneurship Studies",
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

            $bucket_2 = [
                "Oriental Music",
                "Western Music",
                "Carnatic Music",
                "Oriental Dancing",
                "Bharatha Dancing",
                "Art",
                "Appreciation of English Literary Texts",
                "Appreciation of Sinhala Literary Texts",
                "Appreciation of Tamil Literary Texts",
                "Appreciation of Arabic Literary Texts",
                "Drama and Theatre"
            ];

            $bucket_3 = [
                "Information & Communication Technology",
                "Agriculture & Food Technology",
                "Aquatic Bio-resources Technology",
                "Arts & Crafts",
                "Home Economics",
                "Health & Physical Education",
                "Communication & Media Studies",
                "Design & Construction Technology",
                "Design & Mechanical Technology",
                "Design, Electrical & Electronic Technology",
                "Electronic Writing & Shorthand"
            ];
            $response->bucket_1 = $bucket_1;
            $response->bucket_2 = $bucket_2;
            $response->bucket_3 = $bucket_3;
        }

        return $response;
    }
}
