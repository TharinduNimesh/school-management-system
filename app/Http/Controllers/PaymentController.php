<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function navigateToStudentPayment() {
        $index = auth()->user()->index;
        $student = StudentController::getStudent($index, auth()->user()->school);


        return view('student.payment', [
            "payments" => $student->enrollments
        ]);
    }

    public static function hasPaidFee($index, $year) {
        $student = Student::where('index_number', $index)
        ->where('school', auth()->user()->school)
        ->where('enrollments.year', $year)
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
