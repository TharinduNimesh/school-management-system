<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SportTeam;
use App\Models\Student;

class TeamController extends Controller
{
    public function addStudent(Request $request) {
        $student = Student::where('index_number', $request->index)
            ->where('school', auth()->user()->school)
            ->where('sports.name', $request->sport)
            ->where('sports.end_date', null)
            ->first();
    
        if ($student != null) {
            $team = null;
            $studentTeam = null;
            foreach ($student->sports as $sport) {
                if ($sport["name"] == $request->sport) {
                    $studentTeam = $sport["team"];
                    break;
                }
            }
            if($studentTeam != "None") {
                return 'already';
            }

            if ($request->category == "new") {
                $validate = SportTeam::where('name', $request->team)
                    ->where('school', auth()->user()->school)
                    ->where('sport', $request->sport)
                    ->first();
                
                if($validate != null) {
                        return "teamExist";
                }

                $newTeam = new SportTeam();
                $newTeam->name = $request->team;
                $newTeam->sport = $request->sport;
                $newTeam->school = auth()->user()->school;
                $newTeam->start_date = date("Y-m-d");
                $newTeam->end_date = null;
                $newTeam->players = [];
                $newTeam->save();
                $team = $newTeam;
            } else {
                $team = SportTeam::where('name', $request->team)
                    ->where('school', auth()->user()->school)
                    ->where('sport', $request->sport)
                    ->first();
                foreach ($team->players as $player) {
                    if($player["index"] == $request->index && $player["end_date"] == null) {
                        return "exist";
                    }
                }
            }

            $newMember = new \stdClass();
            $newMember->index_number = $request->index;
            $newMember->name = $student->initial_name;
            $newMember->position = $request->position;
            $newMember->start_date = date("Y-m-d");
            $newMember->end_date = null;
    
            $team->players = array_merge($team->players, [$newMember]);
            $added = $team->save();
    
            if ($added) {
                if($student->sport_positions == null) {
                    $student->sport_positions = [];
                }
    
                $newPosition = [
                    "sport" => $request->sport,
                    "team" => $request->team,
                    "position" => $request->position,
                    "start_date" => date("Y-m-d"),
                    "end_date" => null
                ];
    
                $student->sport_positions = array_merge($student->sport_positions, [$newPosition]);

                $object = null;
                $sports = [];
                foreach ($student->sports as $sport) {
                    if ($sport["name"] == $request->sport) {
                        $object = $sport;
                    } else {
                        array_push($sports, $sport);
                    }
                }
                $object["team"] = $request->team;
                array_push($sports, $object);
                $student->sports = $sports;
                $student->save();
                return "success";
            } else {
                return "failed";
            }
        }
    
        return 'invalid';
    }

    public function searchTeam() {
        $players = self::getPlayersList(request()->sport, request()->team);

        if(count($players) > 0) {
            return $players;
        } else {
            return "failed";
        }
    }

    public function removePlayer($sportName, $teamName, $index) {
        $team = SportTeam::where('sport', $sportName)
            ->where('school', auth()->user()->school)
            ->where('name', $teamName)
            ->where('end_date', null)
            ->first();
    
        $player = null;
        $players = [];
        foreach ($team->players as $p) {
            if ($p["index_number"] == $index && $p["end_date"] == null) {
                $player = $p;
            } else {
                $players[] = $p;
            }
        }
        $player["end_date"] = date("Y-m-d");
        $players[] = $player;
        $team->players = $players;
    
        $save1 = $team->save();
    
        $student = StudentController::getStudent($index, auth()->user()->school);

        $otherPositions = [];
        $position = null;
        foreach ($student->sport_positions as $sportPosition) {
            if ($sportPosition["sport"] == $sportName && $sportPosition["team"] == $teamName && $sportPosition["end_date"] == null) {
                $position = $sportPosition;
            } else {
                $otherPositions[] = $sportPosition;
            }
        }
        $position["end_date"] = date("Y-m-d");
        $otherPositions[] = $position;
        $student->sport_positions = $otherPositions;
    
        $object = null;
        $sports = [];
        foreach ($student->sports as $studentSport) {
            if ($studentSport["name"] == $sportName) {
                $object = $studentSport;
            } else {
                $sports[] = $studentSport;
            }
        }
        $object["team"] = "None";
        $sports[] = $object;
        $student->sports = $sports;
        $save2 = $student->save();
    
        if ($save1 && $save2) {
            return "success";
        } else {
            return "failed";
        }
    }    

    public function changePosition() {
        $team = SportTeam::where('sport', request()->sport)
            ->where('school', auth()->user()->school)
            ->where('name', request()->team)
            ->where('end_date', null)
            ->first();
    
        $player = null;
        $players = [];
        foreach ($team->players as $p) {
            if ($p["index_number"] == request()->index && $p["end_date"] == null) {
                $player = $p;
            } else {
                $players[] = $p;
            }
        }
        $player["position"] = request()->position;
        $players[] = $player;
        $team->players = $players;

        $student = StudentController::getStudent(request()->index, auth()->user()->school);

        $otherPositions = [];
        $position = null;
        foreach ($student->sport_positions as $sportPosition) {
            if ($sportPosition["sport"] == request()->sport && $sportPosition["team"] == request()->team) {
                $position = $sportPosition;
            } else {
                $otherPositions[] = $sportPosition;
            }
        }
        $position["end_date"] = Date("Y-m-d");
        $newPosition = [
            "sport" => request()->sport,
            "team" => request()->team,
            "position" => request()->position,
            "start_date" => Date("Y-m-d"),
            "end_date" => null
        ];
        $otherPositions[] = $position;
        $otherPositions[] = $newPosition;
        $student->sport_positions = $otherPositions;
    
        $student->save();
        $save = $team->save();
    
        if ($save) {
            return "success";
        } else {
            return "failed";
        }
    }

    public function addAward() {
        $team = SportTeam::find(request()->team);
        $players = self::getPlayersList($team->sport, $team->name);

        foreach ($players as $player) {
            $award_object = [
                "competition" => request()->competition,
                "category" => request()->category,
                "place" => request()->place,
                "date" => Date("Y-m-d"),
                "description" => request()->description
            ];
            $student = Student::where('index_number', $player["index_number"])
            ->where('school', auth()->user()->school)
            ->where('sports.name', $team->sport)
            ->push('sports.$.awards', $award_object);
        }
    }

    public static function getPlayersList($sport, $team) {
        $teams = SportTeam::where('sport', $sport)
        ->where('school', auth()->user()->school)
        ->where('name', $team)
        ->where('end_date', null)
        ->first();

        $players = [];

        if($team != null) {
            foreach ($teams->players as $player) {
                if($player["end_date"] == null) {
                    $players[] = $player;
                }
            }
        }

        return $players;
    }

    public static function getTeamList($sport) {
        $teams = SportTeam::where('sport', $sport)
        ->where('school', auth()->user()->school)
        ->get();
        return $teams;
    }

    public function navigateToTeams() {
        $sports = SportController::getSportList(auth()->user()->index);
        $teams = [];

        foreach ($sports as $sport) {
            $myTeams = self::getTeamList($sport);

            foreach ($myTeams as $team) {
                $teams[$sport] = $team->name;
            }
        }

        return view('sport.teams', [
            'teams' => $teams,
            'sports' => $sports,
        ]);
    }
}
