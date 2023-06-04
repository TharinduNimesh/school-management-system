<?php

namespace App\Jobs;

use App\Mail\AbsentStudent;
use App\Mail\PresentStudent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class AttendanceMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->data['status'] == 'absent') {
            Mail::to($this->data['email'])->send(new AbsentStudent($this->data));
        } else if($this->data['status'] == 'present') {
            Mail::to($this->data['email'])->send(new PresentStudent($this->data));
        }
    }
}
