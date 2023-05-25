<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function navigateToStudentPayment() {
        $index = auth()->user()->index;
        $student = Student::where('index_number', $index)
        ->where('school', auth()->user()->school)
        ->first();


        return view('student.payment', [
            "payments" => $student->enrollments
        ]);
    }

    public static function hasPaidFee($index, $year) {
        $student = Student::where('index_number', $index)
        ->where('enrollments.year', $year)
        ->where('school', auth()->user()->school)
        ->first();

        if($student != null) {
            foreach ($student->enrollments as $item) {
                if($item["year"] == $year) {
                    return $item["isPayment"];
                }
            }
        }
    }
}
