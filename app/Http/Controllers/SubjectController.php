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

    public function navigateToStudentSubject() {
        $aesthetic = StudentsSubject::where('category', 'aesthetics')->where('deadline', '>=', Date("Y-m-d"))->first();
        $ol = StudentsSubject::where('category', 'ol')->where('deadline', '>=', Date("Y-m-d"))->first();
        $al = StudentsSubject::where('category', 'al')->where('deadline', '>=', Date("Y-m-d"))->first();

        $aestheticRequests = RequestedSubject::where("category", "aesthetics")->get();

        if($aesthetic != null) {
            $subject = RequestedSubject::where("index_number", auth()->user()->index)->where('category', 'aesthetics')->first();
            if($subject == null) {
                $aesthetic = "active";
            }
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
            "aestheticRequests" => $aestheticRequests
        ]);
    }
}
