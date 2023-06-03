<?php

namespace App\Http\Controllers;

use App\Models\Marks;
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

    public function navigateToZonalMarks() {
        $schools = SchoolController::getSchool(auth()->user()->school);
        $years = Marks::select('year')->distinct()->get()->toArray();

        return view('zonal.marks', [
            "schools" => $schools,
            "years" => $years,
        ]);
    }
}
