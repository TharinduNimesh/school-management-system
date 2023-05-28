<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessory;
use App\Models\RequestedAccessory;
use App\Models\Teacher;

class AccessoryController extends Controller
{
    public function updateAccessories(Request $request) {
        $teacher = TeacherController::getClass(auth()->user()->index, Date("Y"));

        if($teacher != null) {
            $accessories = Accessory::where('grade', $teacher->grade)
            ->where('class', $teacher->class)
            ->where('school', auth()->user()->school)
            ->first();
            if($accessories == null) {
                $accessories = new Accessory;
                $accessories->grade = $teacher->grade;
                $accessories->class = $teacher->class;
                $accessories->school = auth()->user()->school;
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
            $accessoryRequest->teacher_nic = auth()->user()->index;
            $accessoryRequest->teacher_name = auth()->user()->name;
            $accessoryRequest->grade = $teacher->grade;
            $accessoryRequest->class = $teacher->class;
            $accessoryRequest->date = Date("Y-m-d");
            $accessoryRequest->school = auth()->user()->school;

            $save = $accessoryRequest->save();
            if($save) {
                return "success";
            } else {
                return "error";
            }
        }
        return "not allowed";
    }

    public function show($grade, $class) {
        $accessories = Accessory::where('grade', $grade)
        ->where('class', $class)
        ->where('school', auth()->user()->school)
        ->first();

        $studentList = ClassController::getStudentList($grade, $class, Date("Y"));

        $response = new \stdClass();
        try {
            $response->deskCount = $accessories->tables;
            $response->chairCount = $accessories->chairs;
        } catch (\Throwable $th) {
            $response->deskCount = "Not Set";
            $response->chairCount = "Not Set";
        }
        $response->students = count($studentList);
        ClassController::getCurrentTeacher($grade, $class) == null ? $response->teacher = "Not Set" : $response->teacher = ClassController::getCurrentTeacher($grade, $class)->full_name;
        
        return $response;
    }

    public function deleteRequest($id) {
        $request = RequestedAccessory::find($id);
        $delete = $request->delete();

        return redirect()->back();
    }

    public function adminNavigateToAccessories() {
        $requests = RequestedAccessory::where('school', auth()->user()->school)->get();
        $totalDesk = 0;
        $totalChair = 0;
        $accessories = Accessory::where('school', auth()->user()->school)->get();
        foreach ($accessories as $item) {
            $totalChair += $item->chairs;
            $totalDesk += $item->tables;
        }
        if($requests == null) {
            $requests = [];
        }

        return view('admin.accessories', [
            'requests' => $requests,
            'totalDesks' => $totalDesk,
            'totalChairs' => $totalChair
        ]);
    }
}
