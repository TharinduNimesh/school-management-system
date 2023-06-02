<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function navigateToZonalStudent() {
        $schools = SchoolController::getSchool(auth()->user()->school);

        return view('zonal.students', [
            "schools" => $schools,
        ]);
    }

    public function navigateToZonalAccessories() {
        $schools = SchoolController::getSchool(auth()->user()->school);
        
        return view('zonal.accessories', [
            "schools" => $schools,
        ]);
    }
}
