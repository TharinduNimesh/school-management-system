<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class LeavesController extends Controller
{
    public function request(Request $request) {
        $teacher = Teacher::where('nic', $request->nic)->first();
        $leaves = $teacher->leaves;
        $first_key = array_key_first($leaves);
    
        if ($leaves[$first_key]["remaining"] > 0) {
            $leaves[$first_key]['remaining'] -= 1;
            $leaves[$first_key]['taken'] += 1;
            $teacher->leaves = (object) $leaves;
            $teacher->save();
            return 'success';
        } else {
            return 'noLeaves';
        }
    


    }

    public function navigateToTeacherLeaves() {
        $nic = auth()->user()->index;
        $teacher = Teacher::where('nic', $nic)->first();

        $remaining_leaves = 0;
        foreach ($teacher->leaves as $leave) {
            $remaining_leaves += $leave['remaining'];
        }

        return view('teacher.leaves', [ "sick_leaves" => $remaining_leaves ]);
    }
}
