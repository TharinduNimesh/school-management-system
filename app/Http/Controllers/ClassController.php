<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Student;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function search_register(Request $request) {

        DB::collection('students')->raw(function ($collection) {
                return $collection->aggregate([
                    [
                        '$match' => [
                            'age' => ['$gt' => 18],
                            'gender' => 'female'
                        ]
                    ],
                    [
                        '$group' => [
                            '_id' => '$class',
                            'count' => ['$sum' => 1]
                        ]
                    ]
                ]);
        });

    }
}
