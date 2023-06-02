<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use App\Models\Accessory;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function getSchoolStudent() {
        if(request()->school == "0") {
            return redirect()->back()->withErrors(['Please select a school']);
        }

        $response = [];
        for ($i=0; $i < 13; $i++) { 
            $object = new \stdClass();
            $object->grade = $i + 1;
            $students = [];

            $boys = Student::where('school', request()->school)
            ->where('enrollments', 'elemMatch', [
                'grade' => strval($i + 1),
                'year' => date('Y'),
            ])->whereNull('resigned_at')
            ->where('gender', 'male')
            ->get();
            $object->male = count($boys);
                
            $girls = Student::where('school', request()->school)
            ->where('enrollments', 'elemMatch', [
                'grade' => strval($i + 1),
                'year' => date('Y'),
            ])
            ->whereNull('resigned_at')
            ->where('gender', 'female')
            ->get();
            $object->female = count($girls);

            $students = array_merge($students, $boys->toArray());
            $students = array_merge($students, $girls->toArray());

            $classes = self::getClassList($i + 1, request()->school);
            $object->classes = count($classes);
            $object->total = count($students);
            array_push($response, $object);
        }
        $school = School::find(request()->school);
        return redirect()->back()->with([
            "students" => $response,
            "school" => $school->name,
        ]);
    }

    public function getSchoolAccessories() {
        if(request()->school == "0") {
            return redirect()->back()->withErrors(['Please select a school']);
        }
        $accessories = [];
        for ($i=1; $i <= 13; $i++) { 
            $object = new \stdClass();
            $object->grade = $i;
            $object->tables = 0;
            $object->chairs = 0;

            $accessory = Accessory::where('school', request()->school)
            ->where('grade', strval($i))
            ->get();

            foreach ($accessory as $item) {
                $object->tables += $item["tables"];
                $object->chairs += $item["chairs"];
            }
            $object->classes = count(self::getClassList($i, request()->school));
            $object->students = count(Student::where('school', request()->school)
            ->where('enrollments', 'elemMatch', [
                'grade' => strval($i),
                'year' => date('Y'),
            ])->whereNull('resigned_at')
            ->get());
            array_push($accessories, $object);
        }
        $school = School::find(request()->school);
        return redirect()->back()->with([
            "accessories" => $accessories,
            "school" => $school->name,
        ]);
    }

    public static function getSchool($zone) {
        $schools = School::where('zone', $zone)
        ->orderBy('name', 'asc')
        ->get();
        
        $response = [];
        foreach ($schools as $school) {
            $response[$school["_id"]] = $school["name"] . " - " . $school["sector"];
        }
        
        return $response;
    }

    public static function getAllSchools() {
        $schools = School::all();
        
        $response = [];
        foreach ($schools as $school) {
            $response[$school["_id"]] = $school["name"] . " - " . $school["sector"] . " - " . $school["zone"];
        }

        return [
            "schools" => $response,
            "details" => $schools,
        ];
    }

    public static function getClassList($grade, $school) {
        $students = Student::where('school', $school)
        ->where('enrollments', 'elemMatch', [
            'grade' => strval($grade),
            'year' => date('Y'),
        ])->whereNull('resigned_at')
        ->get();
        $classes = [];
        foreach ($students as $student) {
            foreach ($student["enrollments"] as $enrollment) {
                if($enrollment["grade"] == strval($grade)) {
                    if(!in_array($enrollment["class"], $classes)) {
                        array_push($classes, $enrollment["class"]);
                    }
                }
            }
        }
        return $classes;
    }
}
