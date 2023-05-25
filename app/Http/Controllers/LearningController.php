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

        if ($validate == null) {
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

            if ($recordAdded) {
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
        if ($feedback == null) {
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

    public function reportFeedback(Request $request)
    {
        $validate = ReportFeedback::where("record_id", $request->id)
            ->where("index_number", $request->index)
            ->first();

        if ($validate == null) {
            $student = Student::where("index_number", $request->index)
            ->where("school", auth()->user()->school)
            ->first();
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
            if ($reportAdded) {
                return 'success';
            }
        } else {
            return 'already';
        }
    }

    public function showRecord(Request $request)
    {
        // Create an empty array to hold the records
        $records = [];

        // Get the date of the current day
        $now = new \DateTime();

        // Get the date of the first day of the week (Monday)
        $monday = clone $now;
        $monday->modify('this week')->modify('Monday');

        // Create an empty array to hold the dates
        $week_dates = array();

        // Loop through the days of the week and add each date to the array
        for ($i = 0; $i < 5; $i++) {
            $date = clone $monday;
            $date->modify("+$i days");
            $week_dates[] = $date->format('Y-m-d');
        }

        // create for each week_dates as date
        foreach ($week_dates as $date) {
            // create variable record and get data from LearningRecord model
            $record = LearningRecord::where("grade", $request->grade)
                ->where("class", strtoupper($request->class))
                ->where("date", $date)
                ->get();

            // push record to records array
            array_push($records, $record);
        }

        // get count of subjects group by subjects between first and last date of the week
        $count = LearningRecord::where("grade", $request->grade)
            ->where("class", strtoupper($request->class))
            ->whereBetween("date", ["$week_dates[0]", $week_dates[count($week_dates) - 1]])
            ->get(['subject', 'date'])
            ->groupBy("subject")
            ->map(function ($group) {
                return $group->count();
            });

        // create object response
        $response = new \stdClass();

        // set records and count to response
        $response->records = $records;
        $response->count = $count;

        // return response
        return $response;
    }

    public function getFeedbacks(Request $request)
    {
        $record = LearningRecord::find($request->id);

        $response = [];
        if($record->feedback != null){
            foreach ($record->feedback as $feedback) {
                array_push($response, $feedback);
            }
        }

        return $response;
    }
}
