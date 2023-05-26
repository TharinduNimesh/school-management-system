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
        $permission = StudentsSubject::where('category', $request->category)
        ->where('school', auth()->user()->school)
        ->first();
        if($permission == null) {
            $newPermission = new StudentsSubject();
            $newPermission->category = $request->category;
            $newPermission->school = auth()->user()->school;
            $newPermission->save();

            $permission = $newPermission;
        }

        $permission->status = "activate";
        $permission->deadline = $request->deadline;

        $permission->save();
    }

    public function studentActionAesthetics(Request $request) {
        if($request->status == "accept") {
            $student = StudentController::getStudent($request->index, auth()->user()->school);
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

    public function studentActionOL(Request $request) {
        $response = new \stdClass();
        if($request->type == "accept") {
            $student = StudentController::getStudent($request->index, auth()->user()->school);
            $subjects = $student->subjects;
            if($subjects == null) {
                $object = new \stdClass();
                $subjects = $object;
            }
            $subjects["ol_subject_1"] = $request->subject_1;
            $subjects["ol_subject_2"] = $request->subject_2;
            $subjects["ol_subject_3"] = $request->subject_3;
            $subjects["ol_medium"] = $request->medium;
            $student->subjects = $subjects;

            $isUpdated = $student->save();
            if($isUpdated) {
                $requests = RequestedSubject::where("index_number", $request->index)
                ->where('school', auth()->user()->school)
                ->where("category", "ol")
                ->get();

                $IDs = [];
                foreach ($requests as $request) {
                    array_push($IDs, $request["_id"]);
                    $request->delete();
                }
                $response->status = "Success";
                $response->ids = $IDs;
                return $response;
            } else {
                return $response->status = "Failed"; 
            }
        } else if($request->type == "reject") {
            $IDs = ["$request->id"];
            $request = RequestedSubject::find($request->id);
            $request->delete();

            $response->status = "Success";
            $response->ids = $IDs;
            return $response;
        }
    }

    public function requestAestheticSubject(Request $request) {
        $subject = RequestedSubject::where('index_number', auth()->user()->index)
        ->where('school', auth()->user()->school)
        ->where('category', 'aesthetics')
        ->first();
        if($subject == null) {
            $student = StudentController::getStudent(auth()->user()->index, auth()->user()->school);
            $requestSubject = new RequestedSubject();
            $requestSubject->index_number = $student->index_number;
            $requestSubject->name = $student->initial_name;
            $requestSubject->category = 'aesthetics';
            $requestSubject->subject = $request->subject;
            $requestSubject->medium = $request->medium;
            $requestSubject->school = auth()->user()->school;

            $requestSubject->save();
        }
    }

    public function requestOlSubject(Request $request) {
        $request = json_decode($request->data);
        $index = auth()->user()->index ;
        $validate = RequestedSubject::where("index_number", $index)
        ->where('school', auth()->user()->school)
        ->where("category", "ol")
        ->first();
        if($validate == null) {
            if($request->type == "one") {
                self::addOlSubjectRequestRecord($index ,$request->subjects, $request->medium);
            } else if($request->type == "two") {
                self::addOlSubjectRequestRecord($index, $request->first, $request->first_medium);
                self::addOlSubjectRequestRecord($index, $request->second, $request->second_medium);
            }

            return "success";
        } else {
            return "already";
        }
    }

    public function requestAlSubject() {
        $request = json_decode(request()->data);
        $validate = RequestedSubject::where("index_number", auth()->user()->index)
        ->where('school', auth()->user()->school)
        ->where('category', 'al')
        ->first();
        if($validate == null) {
            if($request->type == "one") {
                self::addAlSubjectRequestRecord(auth()->user()->index, $request->scheme, $request->subjects, $request->medium);
            } else if($request->type == "two") {
                self::addAlSubjectRequestRecord(auth()->user()->index, $request->first_scheme, $request->first, $request->first_medium);
                self::addAlSubjectRequestRecord(auth()->user()->index, $request->second_scheme, $request->second, $request->second_medium);
            }

            return 'success';
        }
        return 'already';
    }

    public static function addAlSubjectRequestRecord($index, $scheme, $subjects, $medium) {
        $student = StudentController::getStudent($index, auth()->user()->school);
        $request = new RequestedSubject();
        $request->index_number = $index;
        $request->scheme = $scheme;
        $request->name = $student->initial_name;
        $request->category = 'al';
        $request->subjects = $subjects;
        $request->medium = $medium;
        $requestSubject->school = auth()->user()->school;

        $request->save();
    }

    public static function addOlSubjectRequestRecord($index, $subjects, $medium) {
        $student = StudentController::getStudent($index, auth()->user()->school);
        $request = new RequestedSubject();
        $request->index_number = $index;
        $request->name = $student->initial_name;
        $request->category = 'ol';
        $request->subjects = $subjects;
        $request->medium = $medium;
        $requestSubject->school = auth()->user()->school;

        $request->save();
    }

    public function acceptALRequest($id) {
        $request = RequestedSubject::find($id);
        $student = StudentController::getStudent($request->index_number, auth()->user()->school);
        $subjects = $student->subjects;
        if($subjects == null) {
            $object = new \stdClass();
            $subjects = $object;
        }
        $subjects["al_scheme"] = $request->scheme;
        $subjects["al_subject_1"] = $request->subjects["subject_1"];
        $subjects["al_subject_2"] = $request->subjects["subject_2"];
        $subjects["al_subject_3"] = $request->subjects["subject_3"];
        $subjects["al_medium"] = $request->medium;
        $student->subjects = $subjects;

        $isUpdated = $student->save();
        if($isUpdated) {
            $requests = RequestedSubject::where("index_number", $request->index_number)
            ->where('school', auth()->user()->school)
            ->where("category", "al")
            ->get();

            $IDs = [];
            foreach ($requests as $req) {
                $this->rejectALRequest($req->_id);
                array_push($IDs, $req->_id);
            }

            return ["status" => "success", "ids" => $IDs];
        }
    }

    public function rejectALRequest($id) {
        $request = RequestedSubject::find($id);
        if($request != null) {
            $request->delete();
            return "success";
        }
    }

    public function navigateToStudentSubject() {
        $aesthetic = StudentsSubject::where('category', 'aesthetic')
        ->where('school', auth()->user()->school)
        ->where('deadline', '>=', Date("Y-m-d"))
        ->first();
        $ol = StudentsSubject::where('category', 'ol')
        ->where('school', auth()->user()->school)
        ->where('deadline', '>=', Date("Y-m-d"))
        ->first();
        $al = StudentsSubject::where('category', 'al')
        ->where('school', auth()->user()->school)
        ->where('deadline', '>=', Date("Y-m-d"))
        ->first();

        $aestheticRequests = RequestedSubject::where("category", "aesthetics")
        ->where('school', auth()->user()->school)
        ->get();
        $olRequests = RequestedSubject::where("category", "ol")
        ->where('school', auth()->user()->school)
        ->get();
        $alRequests = RequestedSubject::where("category", "al")
        ->where('school', auth()->user()->school)
        ->get();

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
            "ol_bucket_3" => $olSubjects->bucket_3,
            "alRequests" => $alRequests,
            "schemes" => self::getSchemes()
        ]);

        return $aesthetic;
    }

    public function navigateToTeacherSubject() {
        return view('admin.teacherSubject', [
            "subjects" => self::getAllSubjects()
        ]);
    }

    public static function getSchemes() {
        $schemes = [
            "Commerce",
            "Art",
            "Maths",
            "Bio",
            "Technology",
            "NVQ"
        ];

        return $schemes;
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
                "Information & Communication Technology Sinhala",
                "Information & Communication Technology English",
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

    public static function getAllSubjects() {
        $subjects = [
            "Sinhala",
            "Tamil",
            "English",
            "Mathematics",
            "Science",
            "History",
            "Geography",
            "Civic Education",
            "Buddhism",
            "Hinduism",
            "Islam",
            "Catholicism",
            "Christianity",
            "Business & Accounting Studies",
            "Economics",
            "Political Science",
            "Communication & Media Studies",
            "Information & Communication Technology Sinhala",
            "Information & Communication Technology English",
            "Agriculture & Food Technology",
            "Aquatic Bio-resources Technology",
            "Arts & Crafts",
            "Home Economics",
            "Health & Physical Education",
            "Communication & Media Studies",
            "Design & Construction Technology",
            "Design & Mechanical Technology",
            "Design, Electrical & Electronic Technology",
            "Electronic Writing & Shorthand",
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
            "Drama and Theatre",
            "Pali",
            "Sanskrit",
            "French",
            "German",
            "Hindi",
            "Japanese",
            "Arabic",
            "Korean",
            "Chinese",
            "Russian",
            "Entrepreneurship Studies",
            "Environmental Studies"
        ];

        return $subjects;
    }
}
