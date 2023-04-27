<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function add(Request $request) {
        $teacher = Teacher::where('nic', '=', $request->teacherNIC)->whereNull('deleted_at')->first();

        if($teacher == null) {
            // make user object and store teacher's login details on it
            $user = new User();
            $user->name = "$request->teacherFirstName $request->teacherLastName";
            $user->password = Hash::make($request->teacherPassword);
            $user->role = "teacher";
            $user->email = $request->teacherEmail;
            $user->index = $request->teacherNIC;

            // save teacher login details on User collection
            $userAdded = $user->save();

            // create Teacher model object and set propeties
            $teacher = new Teacher();
            $teacher->first_name = $request->teacherFirstName;
            $teacher->last_name = $request->teacherLastName;
            $teacher->full_name = $request->teacherFullName;
            $teacher->date_of_birth = $request->teacherDateOfBirth;
            $teacher->nic = $request->teacherNIC;
            $teacher->appointed_subject = $request->appointedSubject;
            $teacher->gender = $request->teacherGender;
            $teacher->nationality = $request->teacherNationality;
            $teacher->religion = $request->teacherReligion;
            $teacher->qualifications = $request->qualification;

            // teacher's contact information
            $teacher->mobile = $request->teacherContactNumber;
            $teacher->email = $request->teacherEmail;
            $teacher->address = $request->address;

            // teacher resignation assign to null
            $teacher->deleted_at = null;

            // save teacher's information
            $teacherAdded = $teacher->save();

            // check is teacher added successfully for both collections
            if($teacherAdded && $userAdded) {
                return 'success';
            } else {
                return 'error';
            }
            // already a teacher exist with given nic number
        } else {
            return 'exist';
        }
    }

    public static function getClass($nic) {
        $response = null;
        $current_year = Date("Y");
        $teacher = Teacher::select(['classes'])
                            ->where("nic", $nic)
                            ->where("classes", "elemMatch", [
                                "start_year" => [ '$lte' => $current_year ],
                                "end_year" => null
                            ])
                            ->first();
        if($teacher != null) {
            foreach ($teacher->classes as $class) {
                if($class['end_year'] == null) {
                    $response = new \stdClass();
                    $response->grade = $class["grade"];
                    $response->class = $class["class"];
                }
            }
        }
        return $response;
    }

    public function navigateToSummary() {
        $teacherDetails = self::getClass(auth()->user()->index);
        $students = ClassController::getStudentList($teacherDetails->grade, $teacherDetails->class, Date("Y"));

        $array = [];
        foreach ($students as $student) {
            $obj = new \stdClass();
            $obj->name = $student["initial_name"];
            $obj->index = $student["index_number"];
            $obj->attendance = StudentController::getAttendancePrecentage($student["index_number"], Date("Y"));
            $obj->payment = PaymentController::hasPaidFee($student["index_number"], Date("Y"));
            array_push($array, $obj);
        }

        return view('teacher.summary', ['data' => $array]);
    }
}
