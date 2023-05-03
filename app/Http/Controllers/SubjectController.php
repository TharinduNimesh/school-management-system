<?php

namespace App\Http\Controllers;

use App\Models\StudentsSubject;
use Illuminate\Http\Request;

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

    public function navigateToStudentSubject() {
        $aesthetic = StudentsSubject::where('category', 'aesthetic')->where('deadline', '>=', Date("Y-m-d"))->first();
        $ol = StudentsSubject::where('category', 'ol')->where('deadline', '>=', Date("Y-m-d"))->first();
        $al = StudentsSubject::where('category', 'al')->where('deadline', '>=', Date("Y-m-d"))->first();

        if($aesthetic == null) {
            $aesthetic = "deactive";
        } else {
            $aesthetic = "active";
        }

        if($ol == null) {
            $ol = "deactive";
        } else {
            $ol = "active";
        }

        if($al == null) {
            $al = "deactive";
        } else {
            $al = "active";
        }

        return view('admin.studentSubject', [
            "aesthetic" => $aesthetic,
            "ol" => $ol,
            "al" => $al
        ]);
    }
}
