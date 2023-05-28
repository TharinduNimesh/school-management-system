<?php

namespace App\Console\Commands;

use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TeacherLeaves extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'teacher:leaves';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new teacher leaves count per year, and remove leaves data older than 3 year';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // get all teachers
        $teachers = Teacher::all();

        // get current year
        $year = Carbon::now()->year;

        // get year that more than 3 years ago
        $cutoffYear = Carbon::now()->subYears(3)->year;
    
        // check teacher by teacher
        foreach ($teachers as $teacher) {
            $leaves = $teacher->leaves;
            if($leaves == null) {
                $leaves = [];
            }
            
            // check teachers leaves data
            foreach ($leaves as $key => $leave) {
                // if teacher have leave records more than 3 years old remove them
                if ($leave['year'] < $cutoffYear || $leave["remaining"] == 0) {
                    unset($leaves[$key]);
                }
            }
    
            // check leaves data for current year
            $currentYearLeaves = collect($leaves)->where('year', $year)->first();
    
            // if doesn't have records for current year, add new record
            if (!$currentYearLeaves) {
                $totalLeaves = 20; 
                $remainingLeaves = $totalLeaves;
    
                $currentYearLeaves = [
                    'year' => $year,
                    'total' => $totalLeaves,
                    'taken' => 0,
                    'remaining' => $remainingLeaves,
                ];
    
                $leaves[] = $currentYearLeaves;
            }
    
            // save changes on teacher object
            $teacher->leaves = $leaves;
            $teacher->save();
        }
    
        return 0;
    }
}
