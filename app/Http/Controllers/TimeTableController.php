<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\TimeTable;

class TimeTableController extends Controller
{
    public static function generate()
    {
        $grades = ['6', '7', '8', '9'];
        $classes = [
            '1' => ['A', 'B', 'C'], 
            '2' => ['A', 'B', 'C'], 
            '3' => ['A', 'B', 'C'], 
            '4' => ['A', 'B', 'C'], 
            '5' => ['A', 'B', 'C'], 
            '6' => ['A', 'B', 'C'],
            '7' => ['A', 'B', 'C'],
            '8' => ['A', 'B', 'C'],
            '9' => ['A', 'B', 'C'],
            '10' => ['A', 'B', 'C'],
            '11' => ['A', 'B', 'C'],
            '12' => ['A', 'B', 'C'],
            '13' => ['A', 'B', 'C']            
        ];
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $approved_counts = [
            "Sinhala" => [
                "weekly" => 5,
                "daily" => 1
            ],
            "Mathematics" => [
                "weekly" => 6,
                "daily" => 2
            ],
            "Science" => [
                "weekly" => 6,
                "daily" => 2
            ],
            "English" => [
                "weekly" => 5,
                "daily" => 1
            ],
            "History" => [
                "weekly" => 2,
                "daily" => 1
            ],
            "Geography" => [
                "weekly" => 2,
                "daily" => 1
            ],
            "Civics" => [
                "weekly" => 2,
                "daily" => 1
            ],
            "Buddhism" => [
                "weekly" => 2,
                "daily" => 1
            ],
            "Tamil" => [
                "weekly" => 2,
                "daily" => 1
            ],
            "Health" => [
                "weekly" => 2,
                "daily" => 1
            ],
            "Aesthetics" => [
                "weekly" => 3,
                "daily" => 2
            ],
            "PTS" => [
                "weekly" => 3,
                "daily" => 2
            ],
        ];
    
        $teachers = Teacher::where('school', auth()->user()->school)
            ->whereNull('resigned_at')
            ->get();
        $teachers_period = [];
        $timeTable = [];
        $subject_details = [];
        $subjects = [];
        foreach ($grades as $grade) {
            $subjects[$grade] = ClassController::getSubjects($grade);
            foreach ($classes[$grade] as $class) {
                $subject_details["$grade-$class"] = array_fill_keys($subjects[$grade], [
                    'teacher' => null,
                    'weekly_count' => 0,
                    'daily_count' => 0,
                ]);
    
                $timeTable["$grade-$class"] = [];
                foreach ($days as $day) {
                    for($i = 0; $i < 8; $i++) {
                        $max_iterations = 2000;
                        $subject = null;
                        $teacher = null;
                        $iteration = 0;
                        while ($subject == null && $iteration < $max_iterations) {
                            $subject = Arr::random($subjects[$grade]);
                            if ($subject_details["$grade-$class"][$subject]['daily_count'] > $approved_counts[$subject]['daily']) {
                                $subject = null;
                            } else {
                                foreach ($teachers as $t) {
                                    if (collect($t['subjects'])->contains(function ($item) use ($subject, $grade) {
                                        return $item['subject'] === $subject && $item['grade'] === strval($grade);
                                    })) {
                                        try {
                                            if (in_array($t->id, $teachers_period["period_$i"])) {
                                                $subject = null;
                                                break;
                                            }
                                        } catch (\Throwable $th) {
                                            // first period
                                        }
                        
                                        if ($subject !== null && $subject_details["$grade-$class"][$subject]['daily_count'] >= $approved_counts[$subject]['daily']) {
                                            $subject = null;
                                            break;
                                        }
                        
                                        $teacher = $t;
                                        break;
                                    }
                                }
                            }
                            $iteration++;
                        }

                        if($subject == null) {
                            return response()->json([
                                'message' => 'Unable to generate timetable. Please try again.'
                            ], 500);
                        }
    
                        $timeTable["$grade-$class"][$day][] = [
                            'subject' => $subject,
                            'teacher' => $teacher,
                        ];
                        if($teacher !== null) {
                            $teachers_period["period_$i"][] = $teacher->id;
                        }
                        $subject_details["$grade-$class"][$subject]['weekly_count']++;
                        $subject_details["$grade-$class"][$subject]['daily_count']++;
                    }
                    foreach ($subject_details["$grade-$class"] as &$subject_detail) {
                        $subject_detail['daily_count'] = 0;
                    }
                }
                foreach ($subject_details["$grade-$class"] as &$subject_detail) {
                    $subject_detail['weekly_count'] = 0;
                }
            }
        }
        return $timeTable;
    }
}
