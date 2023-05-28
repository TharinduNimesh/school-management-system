<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
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
        $school->zone = request()->education_zone;
        $school->save();

        return "success";
    }

    public function add_users() {
        $validate = User::where('index', request()->nic)
        ->where('role', strtolower(request()->role))
        ->first();

        if($validate != null) {
            return "already";
        }

        $user = new User();
        $user->index = request()->nic;
        $user->name = request()->name;
        $user->role = strtolower(request()->role);
        $user->school = request()->school_id;
        $user->email = request()->email;
        $user->password = Hash::make(request()->password);

        if(request()->role == "Developer" || request()->role == "Zonal Officer") {
            $user->login = request()->nic;
        } else {
            $user->login = self::generateLogin(request()->nic, request()->school_id);
        }

        $user->save();

        return "success";
    }

    public static function getSchools() {
        $schools = School::all();
        
        $response = [];
        foreach ($schools as $school) {
            $response[$school["_id"]] = $school["name"] . " - " . $school["sector"] . " - " . $school["zone"];
        }

        return $response;
    }

    public static function generateLogin($index, $school) {
        $unique_id = School::find($school)->unique_id;
        $login = "$unique_id-$index";

        return $login;
    }


    public function navigateToUsers() {
        $schools = self::getSchools();

        return view('developer.users', [
            "schools" => $schools
        ]);
    }
}
