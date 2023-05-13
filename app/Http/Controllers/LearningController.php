<?php

namespace App\Http\Controllers;

use App\Models\LearningRecord;
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
            $record->period_no = $request->periodNo;
            $record->subject = $request->subject;
            $record->description = $request->description;
            
            $recordAdded = $record->save();

            if($recordAdded){
                return 'success';
            }
        }
    }

}
