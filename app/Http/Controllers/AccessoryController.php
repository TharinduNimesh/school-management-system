<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessory;
use App\Models\RequestedAccessory;

class AccessoryController extends Controller
{
    public function updateAccessories(Request $request) {
        $teacher = TeacherController::getClass(auth()->user()->index, Date("Y"));

        if($teacher != null) {
            $accessories = Accessory::where('grade', $teacher->grade)
            ->where('class', $teacher->class)
            ->first();
            if($accessories == null) {
                $accessories = new Accessory;
                $accessories->grade = $teacher->grade;
                $accessories->class = $teacher->class;
            }
            $accessories->tables = $request->deskCount;
            $accessories->chairs = $request->chairCount;
            $accessories->last_update = Date("Y-m-d");
            $update = $accessories->save();
    
            if($update) {
                return "success";
            } else {
                return "error";
            }
        }
        return "error";
    }

    public function requestAccessories(Request $request){
        $teacher = TeacherController::getClass(auth()->user()->index, Date("Y"));
        if($teacher != null) {
            $accessoryRequest = new RequestedAccessory();
            $accessoryRequest->subject = $request->subject;
            $accessoryRequest->description = $request->description;
            $accessoryRequest->teacher_nic = auth()->user()->name;
            $accessoryRequest->teacher_name = auth()->user()->index;
            $accessoryRequest->grade = $teacher->grade;
            $accessoryRequest->class = $teacher->class;
            $accessoryRequest->date = Date("Y-m-d");

            $save = $accessoryRequest->save();
            if($save) {
                return "success";
            } else {
                return "error";
            }
        }
        return "not allowed";
    }
}
