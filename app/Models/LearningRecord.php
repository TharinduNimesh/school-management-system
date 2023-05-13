<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class LearningRecord extends Model
{
    use HasFactory;
    protected $collection = 'learning_records';
    protected $connection = 'mongodb';
}
