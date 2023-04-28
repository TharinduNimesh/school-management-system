<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function add(Request $request) {
        // get assignment file that user provided
        $file = $request->file('file');

        // get file extension
        $ext = $file->getClientOriginalExtension();

        // create uniq name to store file
        $file_name = uniqid() . '.' . $ext;

        // save file on /storage/app/assignments directory
        $path = $file->storeAs('public/assignments', $file_name);

        // check file saved or not
        if(Storage::exists($path)) {
            // if file saved add assignment details to database
            $assignment = new Assignment();
            $assignment->heading = $request->heading;
            $assignment->subject = $request->subject;
            $assignment->grade = $request->grade;
            $assignment->class = $request->class;
            $assignment->start_date = $request->startDate;
            $assignment->end_date = $request->endDate;
            $assignment->description = $request->description;
            // store user's nic that assignment uploaded
            $assignment->submited_teacher = auth()->user()->index;
            $assignment->file = $file_name;
            
            // save data on database
            $assignmentAdded = $assignment->save();

            // check data saved successfully in database
            if($assignmentAdded) {
                return 'success';
            } else {
                return 'dbError';
            }
        } 
            // if file not saved this will return
        else {
            return 'fileNotSaved';
        }
    }

    public function navigateToStudentAssignments() {
        $index = auth()->user()->index;
        $year = Date("Y");
        $student = StudentController::getClass($index, $year);
        $assignments = Assignment::where('grade', $student["grade"])->where('class', $student["class"])->get();

        return view('student.assignment', [
            "assignments" => $assignments
        ]);
    }
}
