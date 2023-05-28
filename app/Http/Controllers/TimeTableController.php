<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\TimeTable;

class TimeTableController extends Controller
{
    public static function generate() {
        $grade = "11";
        $class = "F";
        $year = "2023";
        $validate = TimeTable::where('grade', $grade)
        ->where('class', $class)
        ->where('year', $year)
        ->where('school', auth()->user()->school)
        ->first();
        if($validate != null) {
            return response()->json([
                'message' => 'Time table already exists'
            ], 400);
        }
        $target_bucket = null;
        $target_medium = null;
        $replace_subject = null;
        if($grade > 11) {
            $target_bucket = "al_scheme";
            $target_medium = "al_medium";
        } else if ($grade > 9) {
            $target_bucket = "ol_subject_1";
            $target_medium = "ol_medium";
            $replace_subject = "Bucket_1";
        } else if ($grade > 5) {
            $target_bucket = "aesthetics_subject";
            $target_medium = "medium";
            $replace_subject = "Aesthetics";
        } 
        $all_teachers = Teacher::where('school', auth()->user()->school)
        ->where('subjects.grade', $grade)
        ->get();

        $teachers = [];
        foreach($all_teachers as $teacher) {
            $target = Teacher::find($teacher->_id);
            $teachers_subjects = [];
            foreach ($teacher->subjects as $subject) {
                if($subject['grade'] == $grade) {
                    array_push($teachers_subjects, $subject["subject"]);
                }
            }
            foreach ($teachers_subjects as $subject) {
                if($target->subjects != null) {
                    array_push($teachers, [
                        'id' => $target->_id,
                        'name' => $target->full_name,
                        'subjects' => $subject
                    ]);
                }
            }
        }
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $subjects = [];
        $mediums = [];
        $students = ClassController::getStudentList($grade, $class, $year);
        if(count($students) != 0) {
            foreach($students as $student) {
                $target = Student::find($student->_id);
                if($target->subjects != null) {
                    array_push($subjects, $target->subjects[$target_bucket]);
                    array_push($mediums, $target->subjects[$target_medium]);
                }
            }
        }
        sort($subjects);
        sort($mediums);
        
        $main_subject = null;
        $main_medium = null;
        if(isset($mediums[0]) && isset($subjects[0])) {
            $main_subject = $subjects[0];
            $main_medium = $mediums[0];    
        }

        $subjects = ClassController::getSubjects($grade);

        foreach ($days as $day) {
            $subject = Arr::random($subjects);
            return $subject;
        }
    }
}
