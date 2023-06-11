<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\TimeTable;

class TimeTableController extends Controller
{
    public function generate_old()
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
            $important_subjects[$grade] = $this->getImportantSubjects($grade);
            foreach ($classes[$grade] as $class) {
                $subject_details["$grade-$class"] = array_fill_keys($subjects[$grade], [
                    'teacher' => null,
                    'weekly_count' => 0,
                    'daily_count' => 0,
                    'isDouble' => false,
                ]);

                $timeTable["$grade-$class"] = [];
                foreach ($days as $day) {
                    for ($i = 0; $i < 8; $i++) {
                        $max_iterations = 2000;
                        $subject = null;
                        $teacher = null;
                        $iteration = 0;

                        while ($subject == null && $iteration < $max_iterations) {
                            if ($max_iterations < 1000) {
                                while (true) {
                                    $subject = Arr::random($important_subjects[$grade]);
                                    break;
                                }
                            } else {
                                $subject = Arr::random($subjects[$grade]);
                            }
                            $approved_count = $approved_counts[$subject]['daily'];
                            if ($subject_details["$grade-$class"][$subject]['isDouble']) {
                                $approved_count = 1;
                            }
                            if ($subject_details["$grade-$class"][$subject]['weekly_count'] >= $approved_counts[$subject]['weekly']) {
                                $subject = null;
                            } else if ($subject_details["$grade-$class"][$subject]['daily_count'] >= $approved_count) {
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

                                        if ($subject !== null && $subject_details["$grade-$class"][$subject]['daily_count'] >= $approved_count) {
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

                        if ($subject == null) {
                            return response()->json([
                                'message' => 'Unable to generate timetable. Please try again.'
                            ], 500);
                        }

                        $timeTable["$grade-$class"][$day][] = [
                            'subject' => $subject,
                            'teacher_name' => $teacher ? $teacher->full_name : null,
                            'teacher_nic' => $teacher ? $teacher->nic : null,
                        ];
                        if ($teacher !== null) {
                            $teachers_period["period_$i"][] = $teacher->id;
                        }
                        $subject_details["$grade-$class"][$subject]['weekly_count']++;
                        $subject_details["$grade-$class"][$subject]['daily_count']++;
                        if ($subject_details["$grade-$class"][$subject]['daily_count'] == 2) {
                            $subject_details["$grade-$class"][$subject]['isDouble'] = true;
                        }
                    }
                    $teachers_period = [];
                    foreach ($subject_details["$grade-$class"] as &$subject_detail) {
                        $subject_detail['daily_count'] = 0;
                    }
                }
                foreach ($subject_details["$grade-$class"] as &$subject_detail) {
                    $subject_detail['weekly_count'] = 0;
                }
            }
        }
        // return $timeTable;
        return view('admin.table', [
            'classes' => $timeTable,
        ]);
    }

    public function generate()
    {
        $grades = ['1', '2', '3'];
        $classes = [
            '1' => ['A', 'B'],
            '2' => ['A', 'B'],
            '3' => ['A', 'B'],
        ];
        $subjects = [
            '1' => [
                'Sinhala',
                'English',
                'Mathematics',
                'Environment',
                'Tamil',
            ],
            '2' => [
                'Sinhala',
                'English',
                'Mathematics',
                'Environment',
                'Tamil',
            ],
            '3' => [
                'Sinhala',
                'English',
                'Mathematics',
                'Environment',
                'Tamil',
            ],
        ];
        $approved_information = [
            'Sinhala' => [
                'weekly' => 5,
                'daily' => 1
            ],
            'English' => [
                'weekly' => 5,
                'daily' => 1
            ],
            'Mathematics' => [
                'weekly' => 5,
                'daily' => 1
            ],
            'Environment' => [
                'weekly' => 5,
                'daily' => 1
            ],
            'Tamil' => [
                'weekly' => 5,
                'daily' => 1
            ],
        ];
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $teacher_availablility = [];
        $timetable = [];

        $current_information = [];

        foreach ($grades as $grade) {
            foreach ($classes[$grade] as $class) {
                $available_subjects = $subjects[$grade];
                foreach ($available_subjects as $subject) {
                    $current_information[$subject] = [
                        'weekly_count' => 0,
                        'daily_count' => 0,
                        'isDouble' => false,
                        'teacher' => null,
                    ];
                }
                foreach ($days as $day) {
                    for ($i = 0; $i < 5; $i++) {
                        $subject = null;
                        $teacher = null;

                        $max_iterations = 1000;
                        while(true) {
                            if($max_iterations < 0) {
                                break;
                            }
                            $subject = Arr::random($available_subjects);
                            $approved_count = $approved_information[$subject]['daily'];
                            if($current_information[$subject]['isDouble']) {
                                $approved_count = 1;
                            }
                            if($current_information[$subject]['weekly_count'] < $approved_information[$subject]['weekly'] && $current_information[$subject]['daily_count'] < $approved_count) {
                                if($current_information[$subject]['teacher'] == null) {
                                    $teacher = Teacher::where('school', auth()->user()->school)
                                    ->whereNull('resigned_at')
                                    ->where('subjects', 'elemMatch', [
                                        'subject' => $subject,
                                        'grade' => strval($grade)
                                    ])
                                    ->get()->toArray();
                                    $teacher = Arr::random($teacher);

                                    $current_information[$subject]['teacher'] = $teacher;
                                }
                                $teacher = $current_information[$subject]['teacher'];
                                if(!isset($teacher_availablility["period_$i"])) {
                                    break; 
                                } 
                                if(!in_array($teacher["_id"], $teacher_availablility["period_$i"])) {
                                    break;
                                } 
                                $subject = null;
                            } else {
                                $subject = null;
                            }

                            $max_iterations--;
                        }

                        if($subject === null) {
                            return response()->json([
                                'message' => 'Unable to generate timetable. Please try again.'
                            ], 500);
                        }

                        $timetable["$grade-$class"][$day][] = [
                            'subject' => $subject,
                            'teacher_name' => $teacher ? $teacher["full_name"] : null,
                            'teacher_nic' => $teacher ? $teacher["nic"] : null
                        ];

                        if ($teacher !== null) {
                            $teacher_availablility["period_$i"][] = $teacher["_id"];
                        }

                        $current_information[$subject]['weekly_count']++;
                        $current_information[$subject]['daily_count']++;
                    }
                    $teacher_availablility = [];
                    foreach ($current_information as &$information) {
                        $information['daily_count'] = 0;
                    }
                }
                foreach ($current_information as &$information) {
                    $information['weekly_count'] = 0;
                }
            }
        }
        return view('admin.table', [
            'classes' => $timetable,
        ]);
    }

    public function getImportantSubjects($grade)
    {
        $subjects = [];
        if ($grade < 6) {
            $subjects = [
                "Sinhala",
                "English",
                "Mathematics",
                "Environment"
            ];
        } else if ($grade < 12) {
            $subjects = [
                "Sinhala",
                "English",
                "Mathematics",
                "Science",
            ];
        } else if ($grade < 14) {
            $subjects = [
                "Bucket_1",
                "Bucket_2",
                "Bucket_3",
                "General_English"
            ];
        }

        return $subjects;
    }
}
