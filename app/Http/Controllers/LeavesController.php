<?php

namespace App\Http\Controllers;

use App\Models\Leaves;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        return redirect()->back();
    }

    public function self_remove(Request $request) {
        // delete leave record for given id
        Leaves::where("_id", $request->id)->delete();

        return redirect()->back();
    }
}