<?php

namespace App\Http\Controllers;

use App\Mail\StudentAssignment;
use App\Models\Assignment;
use App\Models\Student;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
                $students = ClassController::getStudent($request->grade, $request->class, Date("Y"));

                $url = Storage::url($path);

                foreach ($students as $student) {
                    $data = [
                        "student_name" => $student["full_name"],
                        "start_date" => $request->startDate,
                        "end_date" => $request->endDate,
                        "url" => $url
                    ];
                    Mail::to($student->emergency_email)->send(new StudentAssignment($data));
                }
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

    public function submit(Request $request) {
        $validation = $request->validate([
            'id' => ["required"],
            "file" => ["required", "file"]
        ]);

        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $file_name = uniqid() . "." . $ext;

        $path = $file->storeAs("public/submissions", $file_name);
        if(Storage::exists($path)) {
            $student = StudentController::getClass(auth()->user()->index, Date("Y"));

            $submission = new Submission();
            $submission->name = auth()->user()->name;
            $submission->index_number = auth()->user()->index;
            $submission->grade = $student["grade"];
            $submission->class = $student["class"];
            $submission->date = Date("Y-m-d");
            $submission->time = Date("H:i:s");
            $submission->assignment_id = $request->id;
            $submission->file = $file_name;
            $submission->marks = "pending";
            $submission->save();
        }

        return redirect()->route('student.assignments');
    }

    public function search(Request $request) {
        if($request->grade != '0' && $request->class != 0) {
            $date = Date("Y");
            // get submissions for given class for this year
            $submissions = Submission::where('grade', $request->grade)
                                    ->where("class", $request->class)
                                    ->where('date', 'like', "$date%")
                                    ->get();
            
            $response = [];
            foreach ($submissions as $submission) {
                $validate = Assignment::find($submission["assignment_id"]);
                // validate each submissions own by requested teacher
                if($validate->submited_teacher == auth()->user()->index) {
                    $obj = new \stdClass();
                    $obj->name = $submission["name"];
                    $obj->subject = $validate->subject;
                    $obj->datetime = $submission["date"] . " | " . $submission["time"];
                    $obj->marks = $submission->marks;
                    $obj->status = "normal";
                    // check late submission or not
                    if($validate->end_date < $submission["date"]) {
                        $obj->status = 'late';
                    }

                    $file = $submission->file;
                    // get submission file url
                    $url = Storage::url('submissions/' . $file);

                    $obj->url = $url;
                    $obj->submission_id = $submission->_id;
                    array_push($response, $obj);
                }
            }
            
            $object = new \stdClass();
            $object->len = count($response);
            $object->details = $response;
            return $object;
        }
    }

    public function add_marks(Request $request) {
        $submission = Submission::find($request->id);
        $submission->marks = $request->marks;
        $submission->save();
    }

    public function navigateToStudentAssignments() {
        $index = auth()->user()->index;
        $year = Date("Y");
        // get student current grade and class
        $student = StudentController::getClass($index, $year);

        $assignments = null;
        if($student != null) {
            // get all assignment for student class and year
            $assignments = Assignment::where('grade', $student["grade"])
            ->where('class', $student["class"])
            ->where('start_date', 'like', "$year%")
            ->orderBy('start_date', 'desc')
            ->get();

            foreach($assignments as $assignment) {
                // check assignment status (submited or not)
                $details = Submission::where('assignment_id', $assignment->_id)->first();
                if($details == null) {
                    $assignment->marks = "Not Submited";
                } else if($details->marks == "pending"){
                    $assignment->marks = "Pending";
                } else {
                    $assignment->marks = $details->marks;
                }
            }

        }
        return view('student.assignment', [
            "assignments" => $assignments
        ]);
    }
}
