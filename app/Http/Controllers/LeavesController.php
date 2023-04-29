<?php

namespace App\Http\Controllers;

use App\Mail\ApproveLeaves;
use App\Mail\RejectLeaves;
use App\Models\Leaves;
use App\Models\ShortLeaves;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeavesController extends Controller
{
    public function request(Request $request)
    {
        // get teacher's details that request the leave
        $teacher = Teacher::where('nic', $request->nic)->first();

        $validate = Leaves::where('nic', $request->nic)->where('date', Date("Y-m-d"))->first();

        // create new Leaves object
        $leavesData = new Leaves;

        // check type of reason for leave, casual or sick
        if ($request->type == "sick") {
            // check leaves data that user already get a leave for today
            if ($validate == null) {
                // get remaining leaves count
                $remaining_leaves = 0;
                foreach ($teacher->leaves as $leave) {
                    $remaining_leaves += $leave['remaining'];
                }

                // check any leave left
                if ($remaining_leaves > 0) {
                    $leaves = $teacher->leaves;
                    // get first array key number
                    $first_key = array_key_first($leaves);

                    // get current date
                    $date = Carbon::now()->toDateString();

                    if ($leaves[$first_key]["remaining"] > 0) {
                        // update and save leaves data
                        $leaves[$first_key]['remaining'] -= 1;
                        $leaves[$first_key]['taken'] += 1;
                        $teacher->leaves = (object) $leaves;
                        $teacher->save();

                        // assign leave data 
                        $leavesData->nic = $teacher->nic;
                        $leavesData->name = $teacher->full_name;
                        $leavesData->mobile = $teacher->mobile;
                        $leavesData->date = $date;
                        $leavesData->reason = "Sick";
                        $leavesData->status = "accepted";
                        $leavesData->save();

                        return 'success';
                    } else if ($leaves[$first_key + 1]["remaining"] > 0) {
                        $leaves[$first_key + 1]['remaining'] -= 1;
                        $leaves[$first_key + 1]['taken'] += 1;
                        $teacher->leaves = (object) $leaves;
                        $teacher->save();

                        // assign leave data 
                        $leavesData->nic = $teacher->nic;
                        $leavesData->name = $teacher->full_name;
                        $leavesData->mobile = $teacher->mobile;
                        $leavesData->date = $date;
                        $leavesData->reason = "Sick";
                        $leavesData->status = "accepted";
                        $leavesData->save();
                        return 'success';
                    } else {
                        return 'error';
                    }
                } else {
                    return 'noLeaves';
                }
            }
            // already got a leave today
            else {
                return 'already';
            }
        }
        // process for casual leaves
        else {
            // validate date and reason fields are filled or not
            $validate = $request->validate([
                "date" => ["required", 'date'],
                "reason" => ["required"],
            ]);

            // check requested teacher has already request earlier in that day
            $check = Leaves::where('nic', $request->nic)
                ->where('date', $request->date)->first();

            // if teacher doen't request leave for that day
            if ($check == null) {
                $year = Date("Y");
                // get all casual vocation record for requested teacher in this year
                $getCount = Leaves::where('nic', $request->nic)
                    ->where('reason', '<>', 'Sick')
                    ->where('date', 'like', "$year%")
                    ->where('status', 'accepted')->get();
                // check casual leaves count is low than 20
                if (count($getCount) < 20) {
                    $leavesData->nic = $request->nic;
                    $leavesData->name = $teacher->full_name;
                    $leavesData->mobile = $teacher->mobile;
                    $leavesData->date = $request->date;
                    $leavesData->reason = $request->reason;
                    $leavesData->status = "pending";
                    $leavesData->save();

                    return 'success';
                } else {
                    return 'noLeaves';
                }
            }
            // this wil return if teacher already get a leave that day
            else {
                return 'casualAlready';
            }
        }
    }

    public function navigateToTeacherLeaves()
    {
        $nic = auth()->user()->index;
        $teacher = Teacher::where('nic', $nic)->first();

        // get leaves data
        $leavesData = Leaves::where('nic', $nic)->get();

        // store leaves data on array
        $leavesArray = array();
        foreach ($leavesData as $leave) {
            if ($leave->date >= Date("Y-m-d")) {
                array_push($leavesArray, $leave);
            }
        }

        $year = Date("Y");
        $getCount = Leaves::where('nic', $nic)
            ->where('reason', '<>', 'Sick')
            ->where('date', 'like', "$year%")
            ->where('status', 'accepted')->get();

        $remaining_leaves = 0;
        // get remaining sick leaves count
        foreach ($teacher->leaves as $leave) {
            $remaining_leaves += $leave['remaining'];
        }

        return view('teacher.leaves', [
            "sick_leaves" => $remaining_leaves,
            "casual_leaves" => count($getCount),
            "leaves_data" => $leavesArray
        ]);
    }

    public function navigateToadminApproveLeaves($error = null)
    {
        // get all sick leaves for today
        $sickLeaves = Leaves::where('reason', 'Sick')
            ->where('date', Date("Y-m-d"))
            ->get();

        // get casual Leaves for later today
        $casualLeaves = Leaves::where('reason', '<>', 'Sick')
            ->where('date', '>=', Date("Y-m-d"))
            ->get();

        $todayCasualLeaves = Leaves::where('reason', '<>', 'Sick')
            ->where('date', Date('Y-m-d'))
            ->get();

        return view('admin.approveLeaves', [
            "sickLeavesList" => $sickLeaves,
            "casualLeavesList" => $casualLeaves,
            "todayCasualCount" => count($todayCasualLeaves),
            "error" => $error,
        ]);
    }

    public function accept(Request $request)
    {
        // search details for given leaves id
        $details = Leaves::find($request->id);

        // get accepted leaves count for requested day
        $getCount = Leaves::where('date', $details->date)
            ->where('status', 'accepted')
            ->get();

            // check accepted leave count low than 5
        if (count($getCount) < 5) {
            // update leave details as accepted
            Leaves::where('_id', $request->id)
                ->update([
                    'status' => 'accepted'
                ]);
            
            $details = Leaves::find($request->id);
            $teacher = Teacher::where('nic', $details->nic)->first();

            $data = [
                "teacher_name" => $teacher->full_name,
                "date" => $details->date
            ];
            Mail::to($teacher->email)->send(new ApproveLeaves($data));

            return redirect()->back();
        } 
            // return back with errors
        else {
            $error = 'Maximum number of leaves accepted for that day has been reached.';
            return $this->navigateToadminApproveLeaves($error);
        }
    }

    public function reject(Request $request)
    {
        $details = Leaves::find($request->id);
        // update leave details as rejected
        Leaves::where('_id', $request->id)
            ->update([
                'status' => 'rejected'
            ]);

        $details = Leaves::find($request->id);
        $teacher = Teacher::where('nic', $details->nic)->first();

        $data = [
            "teacher_name" => $teacher->full_name,
            "date" => $details->date,
        ];
        Mail::to($teacher->email)->send(new RejectLeaves($data));

        return redirect()->back();
    }

    public function self_remove(Request $request) {
        // delete leave record for given id
        Leaves::where("_id", $request->id)->delete();

        return redirect()->back();
    }

    public function addShortLeaves(Request $request) {
        // validate nic and reason
        $validator = Validator::make($request->all(), [
            "nic" => 'required|max:13',
            "reason" => 'required|min:5|max:200'
        ]);
        // create list to store errors
        $messageBag = $validator->getMessageBag();
    
        // check is validation pass or not
        if ($validator->fails()) {
            return redirect()->route('admin.teacherShortLeaves')->with([
                "errors" => $validator->errors()
            ]);
        } 
            // if validation pass this will run
        else {
            // get all details for given teacher
            $teacher = Teacher::where('nic', $request->nic)->first();

            // check teacher exist or not
            if($teacher != null) {
                $month = Date("Y-m");

                // check teacher got previous short leaves atthis month
                $check = ShortLeaves::where('nic', $request->nic)
                                    ->where('date', 'like', "$month%")
                                    ->get();

                // check got short leaves exceed maximum leaves or not
                if(count($check) < 2) {
                    // store short leave on sgort leaves collection
                    $leave = new ShortLeaves();
                    $leave->nic = $request->nic;
                    $leave->reason = $request->reason;
                    $leave->date = Date("Y-m-d");
                    $leave->time = Date("H:i:s");
                    $leave->save();

                    return redirect()->route("admin.teacherShortLeaves");
                } 
                    // teacher already have get maximum number of short leaves this will run
                else {
                    $messageBag->add('error', "This Teacher Has Get Maximum Number Of Short Leaves At This Month");
                    return redirect()->route('admin.teacherShortLeaves')->with([
                        "errors" => $messageBag
                    ]);
                }
            } 
                // if teacher doesn't exist with given nic this will run
            else {
                $messageBag->add('error', 'Invalid Teacher NIC Number');
                return redirect()->route('admin.teacherShortLeaves')->with([
                    "errors" => $messageBag
                ]);
            }
        }
    }

    public function showShortLeaves(Request $request) {
        // validate nic number
        $validator = Validator::make($request->all(), [
            "nic" => "required"
        ]);

        // check validation pass or not
        if($validator->fails()) {
            return view('admin.teacherShortLeave')->with([
                'search_errors' => $validator->errors(),
            ]);
        } 
            // if validation pass this will run
        else {
            // get details for given teacher
            $teacher = Teacher::where('nic', $request->nic)->first();
            $errorBag = $validator->getMessageBag();

            // check teacher exist or not
            if($teacher == null) {
                // error will return if teacher doesn't exist
                $errorBag->add('error', "Invalid Teacher NIC Number");
                return view('admin.teacherShortLeave')
                                ->with('search_errors', $errorBag);
            } else {
                // return short leaves list and name for given teacher
                $leaves = ShortLeaves::where('nic', $request->nic)->get();
                return view('admin.teacherShortLeave')
                                ->with([
                                    'name' => $teacher->full_name,
                                    'list' => $leaves
                                ]);
            }
        }
    }
}