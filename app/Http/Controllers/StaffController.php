<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function add(Request $request) {
        // search staff by given nic
        $validate = Staff::where('nic', $request->nic)
        ->where('role', $request->role)
        ->where('school', auth()->user()->school)
        ->first();

        // check is staff role is administrative staff and check is there already 5 administrative staff
        if($request->role == "Administrative staff") {
            $users = Staff::where('role', $request->role)
            ->where('school', auth()->user()->school)
            ->get()
            ->count();

            if($users >= 5) {
                return 'limit';
            }
        }

        // check staff already exist with given nic
        if($validate == null) {
            // add staff details to staff collection
            $staff = new Staff;
            $staff->full_name = $request->fullName;
            $staff->nic = $request->nic;
            $staff->date_of_birth = $request->date;
            $staff->mobile = $request->mobile;
            $staff->role = $request->role;
            $staff->school = auth()->user()->school;
            $staff->start_date = strval(Date("Y-m-d"));
            $staff->end_date = null;

            // check is staff added successfully or not
            $staffAdded = $staff->save();
            if($staffAdded) {
                // check is user role is administrative staff or librarian
                if($request->role == "Administrative staff" || $request->role == "Librarian") {
                    if($request->role == "Administrative staff") {
                        $request->role = "admin";
                    }
                    // add new user login details to user collection
                    $user = new User;
                    $user->name = $request->fullName;
                    $user->index = $request->nic;
                    $user->email = $request->email;
                    $user->login = DeveloperController::generateLogin($request->nic, auth()->user()->school);
                    $user->password = Hash::make($request->password);
                    $user->role = strtolower($request->role);
                    $user->school = auth()->user()->school;

                    $user->save();
                }
                return 'success';
            } 
                // if staff didn't add to the database this will return
            else {
                return 'error';
            }
        } 
            // if staff already exist with given nic this will return
        else {
            return 'exist';
        }
    }

    public function live(Request $request) {
        // return name and nic list for name like that user searching
        return Staff::select(['full_name', 'nic'])
        ->where('full_name', 'like', "%$request->name%")
        ->where('school', auth()->user()->school)
        ->get();
    }

    public function show(Request $request) {
        // search staff information for given nic
        $staff = Staff::where('nic', $request->nic)
        ->where('school', auth()->user()->school)
        ->first();

        // create response object for send object
        $response = new \stdClass();

        // check does a staff exist with given nic or not
        if($staff != null) {
            $response->staff = $staff;
        } 
            // if staff doesn't exist with given nic this will return
        else {
            $response->status = "error";
        }

        // convert as json and return response
        return json_encode($response);
    }

    public function remove(Request $request) {
        $staff = Staff::find($request->id);

        if($staff->role == "Administrative staff" || $staff->role == "Librarian") {
            if($staff->role == "Administrative staff") {
                $staff->role = "admin";
            }
            $user = User::where('index', $staff->nic)
            ->where('school', auth()->user()->school)
            ->where('role', strtolower($staff->role))
            ->first();

            if($user != null) {
                $user->delete();
            }
        }
        
        $staff->update([
            'end_date' => strval(Date("Y-m-d"))
        ]);

        return strval(Date("Y-m-d"));
    }
}
