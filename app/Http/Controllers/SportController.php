<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Sport;
use App\Models\Student;
use App\Models\User;
use App\Models\RequestedSport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SportController extends Controller
{
    public function add_sport(Request $request) {
        // validate given request
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'category' => ['required'],
            'description' => ['required', 'min:10'],
        ]);

        // check if validation pass or not
        if($validator->fails()) {
            return redirect()->back()->withErrors([
                "sport_validation_errors" => json_encode($validator->errors())
            ]);
        }
            // if validation pass this wil run
        else {
            $errorBag = $validator->getMessageBag();
            // check does sport exist with given name
            $sports = Sport::where('name', $request->name)->first();
            if($sports == null) {
                $sport = new Sport();
                $sport->name = $request->name;
                $sport->category = $request->category;
                $sport->description = $request->description;
                $sportAdded = $sport->save();

                if($sportAdded) {
                    $errorBag->add("success", "Sport Added Successfully");
                    return redirect()->back()->withErrors([
                        "sport_success" => $errorBag
                    ]);
                } else {
                    $errorBag->add("error", "Something Went Wrong");
                    return redirect()->back()->withErrors([
                        "sport_errors" => $errorBag
                    ]);
                }
            }
                // this will run if sport already exist
            else {
                $errorBag->add("error", "This Sport Already Added Previously");
                return redirect()->back()->withErrors([
                    "sport_errors" => $errorBag
                ]);
            }
        }
    }

    public function add_coach(Request $request) {
        // validate given request data
        $validator = Validator::make($request->all(), [
            'nic' => ['required'],
            'password' => ['required', 'min:8', 'max:20'],
            'mobile' => ['required', 'max:10', 'min:9'],
        ]);

        // check validation failed or not
        if($validator->fails()) {
            // if validation failed return an error
            return redirect()->back()->withErrors([
                "coach_validation_errors" => $validator->errors()
            ]);
        } else {
            $messageBag = $validator->getMessageBag();

            if($request->sports == null) {
                $messageBag->add("error", "Please Select At Least One Sport");
                return redirect()->back()->withErrors(["coach_errors" => $messageBag]);
            }

            // get current coaches details
            $coaches = Coach::where('nic', $request->nic)->first();
            // check already caoch exist with given nic
            if($coaches == null) {
                // add details to coach table
                $coach = new Coach();
                $coach->name = $request->name;
                $coach->nic = $request->nic;
                $coach->mobile = $request->mobile;
                $coach->sports = $request->sports;
                $coach->save();

                // add details to user table
                $user = new User();
                $user->name = $request->name;
                $user->index = $request->nic;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->role = "coach";
                $user->save();

                $messageBag->add("success", "Coach Added successfully");
                return redirect()->back()->withErrors(["coach_success" => $messageBag]);
            }
                // this will return if coach already exist with given nic
            else {
                $messageBag->add("error", "A Coach Already Exist With Given NIC");
                return redirect()->back()->withErrors(["coach_errors" => $messageBag]);
            }
        }
    }

    public function addStudent(Request $request) {
        $student = StudentController::getStudent($request->index, auth()->user()->school);
        $sports = $student->sports;
        $isValid = false;
        if($sports == null) {
            $sports = [];
            $isValid = true;
        }

        if($isValid == false) {
            $isValid = true;
            foreach ($sports as $sport) {
                if($sport["name"] == $request->sport) {
                    $isValid = false;
                    break;
                }
            }
        }

        if($isValid) {
            $sport_object = [
                "name" => $request->sport,
                "start_date" => Date("Y-m-d"),
                "end_date" => null,
                "team" => "None",
                "awards" => []
            ];

            array_push($sports, $sport_object);
            $student->sports = $sports;
            $student->save();

            return "success";
        }
        return "already";
    }

    public function searchStudent($sport, $index) {
        $students = self::getStudentList($sport);

        $response = null;
        foreach ($students as $student) {
            if($student["index"] == $index) {
                $response = $student;
                break;
            }
        }

        if($response == null) {
            return "not_found";
        } else {
            return $response;
        }
    }

    public function addAward(Request $request) {
        $dates = [];

        for ($i=0; $i <= 7; $i++) { 
            $date = Date("Y-m-d", strtotime("-$i days"));
            array_push($dates, $date);
        }

        if(in_array($request->date, $dates)) {
            $student = StudentController::getStudent($request->index, auth()->user()->school);
            $sports = $student->sports;
    
            foreach ($sports as &$sport) {
                if ($sport["name"] == $request->sport) {
                    $awards = $sport["awards"];
                    $award_object = [
                        "competition" => $request->competition,
                        "category" => $request->category,
                        "place" => $request->place,
                        "date" => Date("Y-m-d"),
                        "description" => $request->description
                    ];
                    array_push($awards, $award_object);
                    $sport["awards"] = $awards;
            
                    $student->sports = $sports;
                    $added = $student->save();
                    if ($added == true) {
                        return "success";
                    } else {
                        return "error";
                    }
                    break;
                }
            }
        } else {
            return "invalid_date";
        }
    }

    public function searchAwards(Request $request) {
        $awards = self::getAwards($request->index, $request->sport);

        if($awards == null) {
            return [];
        }

        return $awards;
    }

    public function search($name) {
        $sport = Sport::where('name', $name)->first();
        $coaches = Coach::all();

        $response = [
            "sport" => $sport,
            "coach" => null,
        ];

        foreach ($coaches as $coach) {
            foreach ($coach->sports as $sport) {
                if($sport == $name) {
                    $response["coach"] = $coach;
                }
            }
        }

        return $response;
    }

    public function request($name) {
        $coach = Coach::all();
        $isValid = false;

        foreach ($coach as $coach_object) {
            foreach ($coach_object->sports as $sport) {
                if($sport == $name) {
                    $isValid = true;
                }
            }
        }

        if(!$isValid) {
            return 'noCoach';
        }

        if($isValid) {
            $student = StudentController::getStudent(auth()->user()->index, auth()->user()->school);
            $sports = $student->sports;
            if($sports == null) {
                $isValid = true;
            } else {
                foreach ($sports as $sport) {
                    if($sport["name"] == $name && $sport["end_date"] == null) {
                        return 'already';
                    }
                }
            }
        }

        if($isValid) {
            $requests = RequestedSport::where('index_number', auth()->user()->index)
            ->where('sport', $name)
            ->first();
    
            if($requests != null) {
                return 'requested';
            }
        }

        if($isValid) {
            $class = StudentController::getClass(auth()->user()->index, Date("Y"));
            if($class != null) {
                $request = new RequestedSport();
                $request->name = auth()->user()->name;
                $request->sport = $name;
                $request->index_number = auth()->user()->index;
                $request->class = strval($class['grade']) . '-' . $class['class'];
        
                $request->save();
        
                return 'success';
            }
        }

        return 'error';
    }

    public function requestAction() {
        $request = RequestedSport::find(request()->id);
        if(request()->action == "approve") {
            $req = new Request([
                'sport' => $request->sport,
                'index' => $request->index_number,
            ]);

            $this->addStudent($req);
        }
        $request->delete();
        return redirect()->back();
    }

    public function navigateToRequests() {
        $sports = self::getSportList("200515403527");

        $requests = [];
        foreach ($sports as $sport) {
            $request = RequestedSport::where('sport', $sport)->get();
            array_push($requests, $request);
        }

        $requests = RequestedSport::all();
        return view('sport.requests', [
            'requests' => $requests
        ]);
    }

    public static function getAwards($index, $sport) {
        $student = StudentController::getStudent($index, auth()->user()->school);
        $sports = $student->sports;
        $awards = null;
        foreach ($sports as $sport_object) {
            if($sport_object["name"] == $sport) {
                $awards = $sport_object["awards"];
                break;
            }
        }

        return $awards;
    }

    public static function getSportList($nic) {
        $coach = Coach::where('nic', $nic)->first();
        return $coach->sports;
    }

    public static function getStudentList($sport) {
        $students = Student::where('sports', '!=', null)
        ->where('school', auth()->user()->school)
        ->get();
        $studentList = [];
        foreach ($students as $student) {
            $sports = $student->sports;
            foreach ($sports as $sport_object) {
                if($sport_object["name"] == $sport) {
                    if($sport_object["end_date"] == null) {
                        $student_object = [
                            "name" => $student->initial_name,
                            "index" => $student->index_number,
                            "sport" => $sport_object["name"],
                            "mobile" => $student->emergency_number,
                            "email" => $student->emergency_email,
                            "team" => $sport_object["team"],
                            "awards" => $sport_object["awards"]
                        ];
                        array_push($studentList, $student_object);
                    }
                }
            }
        }

        return $studentList;
    }

    public function navigateToAdminSport($errors = null, $success = null) {
        $sports = Sport::all();

        return view('admin.sport', [
            "sports" => $sports,
            "coach_errors" => $errors
        ]);
    }

    public function navigateToAddStudent() {
        $sports = self::getSportList("200515403527");

        return view("sport.addStudent", [
            "sports" => $sports
        ]);
    }

    public function naivgateToAddAwards() {
        $sports = self::getSportList("200515403527");

        return view("sport.awards", [
            "sports" => $sports
        ]);
    }

    public function navigateToStudentList() {
        $sports = self::getSportList("200515403527");

        $players = [];
        foreach ($sports as $sport) {
            $students = self::getStudentList($sport);
            foreach ($students as $student) {
                array_push($players, $student);
            }
        }

        return view('sport.studentList', [
            "players" => $players
        ]);
    }

    public function navigateToTimeTable() {
        $sports = self::getSportList("200515403527");

        return view('sport.timetable', [
            "sports" => $sports
        ]);
    }
}
