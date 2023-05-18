<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SportTable;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendTimetable(Request $request) {
        $students = SportController::getStudentList($request->sport);
        $data = [
            "Sport" => $request->sport,
            "Day" => $request->day,
            "Place" => $request->place,
            "Start_Time" => $request->startTime,
            "End_Time" => $request->endTime,
            "Description" => $request->description,
        ];
        foreach ($students as $student) {
            $data["student_name"] = $student["name"];
            Mail::to($student["email"])->send(new SportTable($data));
        }
    }
}