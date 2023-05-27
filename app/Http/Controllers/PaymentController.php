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

    public function changePayment() {
        $student = StudentController::getStudent(request()->index, auth()->user()->school);
        if($student->enrollments != null) {
            $payment = 90;
            $other_payments = [];
            foreach ($student->enrollments as $item) {
                if($item["grade"] == request()->grade) {
                    $payment = $item;
                }
            }
            if($payment["isPayment"] == "yes") {
                $payment["isPayment"] = "no";
            } else {
                $payment["isPayment"] = "yes";
            }
            Student::where('index_number', request()->index)
            ->where('school', auth()->user()->school)
            ->where('enrollments.year', $payment["year"])
            ->update([
                'enrollments.$.isPayment' => $payment["isPayment"]
            ]);
            $student->save();

            return $payment["isPayment"];
        }
        return 'not_enrolled';
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
