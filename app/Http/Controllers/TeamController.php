<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SportTeam;
use App\Models\Student;

class TeamController extends Controller
{
    public function addStudent(Request $request) {
        $student = Student::where('index_number', $request->index)
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
                    ->where('sport', $request->sport)
                    ->first();
                
                if($validate != null) {
                        return "teamExist";
                }

                $newTeam = new SportTeam();
                $newTeam->name = $request->team;
                $newTeam->sport = $request->sport;
                $newTeam->start_date = date("Y-m-d");
                $newTeam->end_date = null;
                $newTeam->players = [];
                $newTeam->save();
                $team = $newTeam;
            } else {
                $team = SportTeam::where('name', $request->team)
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

        if($players != null) {
            return $players;
        } else {
            return "failed";
        }
    }

    public function removePlayer($sportName, $teamName, $index) {
        $team = SportTeam::where('sport', $sportName)
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
    
        $student = Student::where('index_number', $index)
            ->first();
    
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

    public static function getPlayersList($sport, $team) {
        $teams = SportTeam::where('sport', $sport)
        ->where('name', $team)
        ->where('end_date', null)
        ->first();

        return $teams->players;
    }

    public static function getTeamList($sport) {
        $teams = SportTeam::where('sport', $sport)->get();
        return $teams;
    }

    public function navigateToTeams() {
        $sports = SportController::getSportList("200515403527");
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
