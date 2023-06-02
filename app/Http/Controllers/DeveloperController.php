<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeveloperController extends Controller
{
    public function add_school() {
        $unique_id = School::where('unique_id', request()->unique_code)->first();
        if($unique_id != null) {
            return "already";
        }
        $school = new School();
        $school->name = request()->school_name;
        $school->unique_id = request()->unique_code;
        $school->mobile = request()->contact_number;
        $school->approved_grades = request()->approved_grades;
        $school->grades_in_school = request()->grades_in_school;
        $school->address = request()->address;
        $school->sector = request()->education_sector;
        $school->zone = strtolower(request()->zone);
        $school->save();

        return "success";
    }

    public function add_users() {
        $validate = User::where('index', request()->nic)
        ->where('role', strtolower(request()->role))
        ->where('school', request()->school_id)
        ->first();

        if($validate != null) {
            return "already";
        }

        $user = new User();
        $user->index = request()->nic;
        $user->name = request()->name;
        $user->role = strtolower(request()->role);
        $user->email = request()->email;
        $user->password = Hash::make(request()->password);

        if(request()->role == "developer" || request()->role == "officer") {
            if(request()->role == "officer") {
                $user->school = request()->school_id;
            }
            $user->login = request()->nic;
        } else {
            $user->login = self::generateLogin(request()->nic, request()->school_id);
            $user->school = request()->school_id;

            // add staff details to staff collection
            $staff = new Staff;
            $staff->full_name = request()->name;
            $staff->nic = request()->nic;
            $staff->date_of_birth = request()->birth;
            $staff->mobile = request()->mobile;
            $staff->role = "Administrative staff";
            $staff->school = auth()->user()->school;
            $staff->start_date = strval(Date("Y-m-d"));
            $staff->end_date = null;
            
            // check is staff added successfully or not
            $staffAdded = $staff->save();
        }

        $user->save();

        return "success";
    }

    public static function generateLogin($index, $school) {
        $unique_id = School::find($school)->unique_id;
        $login = "$unique_id-$index";

        return $login;
    }

    public function navigateToUsers() {
        $all = SchoolController::getAllSchools();
        $schools = $all["schools"];
        $zones = [];

        foreach ($all["details"] as $school) {
            if(!in_array(strtolower($school["zone"]), $zones)) {
                array_push($zones, strtolower($school["zone"]));
            }
        }

        return view('developer.users', [
            "schools" => $schools,
            "zones" => $zones,
        ]);
    }
}
