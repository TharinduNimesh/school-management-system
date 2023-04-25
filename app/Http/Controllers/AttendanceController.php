<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function mark(Request $request) {
        $data = json_decode($request->data);
        $present = $data->present;
        foreach($present as $item) {
            return $item;
        }
    }
}
