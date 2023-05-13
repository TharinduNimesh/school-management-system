<?php

namespace App\Http\Controllers;

use App\Models\LearningRecord;
use App\Models\ReportFeedback;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class LearningController extends Controller
{
    public function addTask(Request $request)
    {
        $validate = LearningRecord::where("nic", auth()->user()->index)
        ->where('date', Date("Y-m-d"))
        ->where("period_no", $request->periodNo)
        ->first();

        if($validate == null){
            //create new record
            $record = new LearningRecord();
            $record->nic = auth()->user()->index;
            $record->name = auth()->user()->name;
            $record->date = Date("Y-m-d");
            $record->grade = $request->grade;
            $record->class = $request->class;
            $record->period_no = $request->periodNo;
            $record->subject = $request->subject;
            $record->description = $request->description;
            
            $recordAdded = $record->save();

            if($recordAdded){
                return 'success';
            }
        } else {
            return 'exist';
        }
    }

    public function sendFeedback(Request $request)
    {
        $record = LearningRecord::find($request->id);
        $feedback = $record->feedback;
        if($feedback == null){
            $feedback = [];
        }
        
        $comment = new \stdClass();
        $comment->index_number = auth()->user()->index;
        $comment->rating = $request->rating;
        $comment->comment = $request->feedback;
        array_push($feedback, $comment);
        $record->feedback = $feedback;
        $record->save();
    }

    // create function reportFeedback and get pharameters as request
    public function reportFeedback(Request $request)
    {
        $validate = ReportFeedback::where("record_id", $request->id)
        ->where("index_number", $request->index)
        ->first();

        if($validate == null) {
            $student = Student::where("index_number", $request->index)->first();
            $class = StudentController::getClass($student->index_number, Date("Y"));
            $report = new ReportFeedback();
            $report->record_id = $request->id;
            $report->index_number = $request->index;
            $report->name = $student->initial_name;
            $report->grade = $class["grade"];
            $report->class = $class["class"];
            $report->message = $request->message;
            $report->reason = $request->reasonForReport;

            $reportAdded = $report->save();
            if($reportAdded){
                return 'success';
            }
        } else {
            return 'already';
        }
    }
}
