<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\RequestedPayment;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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

    public function requestPayment() {
        $validate = Validator::make(request()->all(), [
            'subject' => 'required',
            'description' => 'required',
            'file' => 'required|mimes:pdf,docx,doc'
        ]);

        if($validate->fails()) {
            return redirect()->back()->withErrors(['request' => json_encode($validate->errors())]);
        }

        $file = request()->file('file');
        $file_name = uniqid() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs('public/payments/', $file_name);

        if(Storage::exists($path)) {
            $school = School::find(auth()->user()->school);

            $request = new RequestedPayment();
            $request->nic = auth()->user()->index;
            $request->subject = request()->subject;
            $request->description = request()->description;
            $request->proof = $file_name;
            $request->school = $school->name;
            $request->zone = $school->zone;
            $request->date = Date('Y-m-d');
    
            $request->save();
    
            return redirect()->back()->with('success', 'Payment request sent successfully!');
        }
        return redirect()->back()->withErrors(['file', 'Error While Uploading File. Please Try Again!']);
    }

    public function schoolPaymentAction() {
        $validate = Validator::make(request()->all(), [
            'id' => 'required',
        ]);

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $payment = RequestedPayment::find(request()->id);
        $payment->action_taken_at = Date("Y-m-d");
        $payment->action_taken_nic = auth()->user()->index;
        $payment->action_taken_by = auth()->user()->name;
        $payment->save();

        return redirect()->back()->with('success', 'Payment request successfully!');
    }

    public function schoolPayment($id) {
        $validate = Validator::make(request()->all(), [
            'amount' => 'required|numeric',
        ]);

        if($validate->fails()) {
            return redirect()->back()->withErrors(['amount' => $validate->errors()]);
        }

        $request = RequestedPayment::find($id);
        if($request->action_taken_at == null) {
            return redirect()->back()->withErrors(['action' => 'You must need to get an action before pass money!']);
        }

        $request->update([
            "amount" => request()->amount,
            "payed_at" => Date("Y-m-d"),
            "payed_by" => auth()->user()->name,
            "remaining" => $request->amount,
        ]);

        return redirect()->back()->with('success', 'Payment request successfully!');
    }

    public function addPaymentRecord() {
        $validate = Validator::make(request()->all(), [
            'id' => 'required',
            'cost' => 'required|numeric',
            'file' => 'required|mimes:pdf,docx,doc'
        ]);

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
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
