<?php

namespace App\Http\Controllers;

use App\Models\Marks;
use App\Models\RequestedPayment;
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

    public function navigateToZonalSchools() {
        $schools = SchoolController::getSchool(auth()->user()->school);

        return view('zonal.schools', [
            "schools" => $schools,
        ]);
    }

    public function navigateToZonalPayments() {
        $request = RequestedPayment::where('zone', auth()->user()->school)
        ->whereNull('amount' )
        ->get();

        $returned = RequestedPayment::where('zone', auth()->user()->school)
        ->whereNotNull('amount' )
        ->get();

        return view('zonal.payment', [
            "requests" => $request,
            "returned" => $returned,
        ]);
    }
}
