<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SportController extends Controller
{
    public function add_sport(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'category' => ['required'],
            'description' => ['required', 'min:10'],
        ]);

        if($validator->fails()) {
            return redirect()->route("admin.sports")->with([
                "errors" => $validator->errors()
            ]);
        } else {
            $errorBag = $validator->getMessageBag();
            $sports = Sport::where('name', $request->name)->first();
            if($sports == null) {
                $sport = new Sport();
                $sport->name = $request->name;
                $sport->category = $request->category;
                $sport->description = $request->description;
                $sportAdded = $sport->save();

                if($sportAdded) {
                    $errorBag->add("error", "Sport Added Successfully");
                    return view("admin.sport")->with([
                        "success" => $errorBag,
                    ]);
                } else {
                    $errorBag->add("error", "Something Went Wrong");
                    return redirect()->route("admin.sports")->with([
                        "errors" => $errorBag
                    ]);
                }
            } else {
                $errorBag->add("error", "This Sport Already Added Previously");
                return redirect()->route("admin.sports")->with([
                    "errors" => $errorBag
                ]);
            }
        }
    }

    public function add_coach(Request $request) {
        $validator = Validator::make($request->all(), [
            'nic' => ['required'],
            'password' => ['required', 'min:8', 'max:20'],
            'mobile' => ['required', 'max:10', 'min:9'],
        ]);

        if($validator->fails()) {
            return $this->navigateToAdminSport($validator->errors());
        } else {
            $messageBag = $validator->getMessageBag();
            $coaches = Coach::where('nic', $request->nic)->first();
            if($coaches == null) {
                $coach = new Coach();
                $coach->name = $request->name;
                $coach->nic = $request->nic;
                $coach->password = Hash::make($request->password);
                $coach->mobile = $request->mobile;
                $sports = [
                    $request->sport
                ];
                $coach->sports = $sports;
                $coach->save();

                $messageBag->add("success", "Coach Added successfully");
                return $this->navigateToAdminSport($messageBag);
            } else {
                $messageBag->add("error", "A Coach Already Exist With Given NIC");
                return $this->navigateToAdminSport($messageBag);
            }
        }
    }

    public function navigateToAdminSport($errors = null, $success = null) {
        $sports = Sport::all();

        return view('admin.sport', [
            "sports" => $sports,
            "coach_errors" => $errors
        ]);
    }
}
