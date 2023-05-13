<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class ReportFeedback extends Model
{
    use HasFactory;
    protected $collection = 'reported_feedback';
    protected $connection = 'mongodb';
}
