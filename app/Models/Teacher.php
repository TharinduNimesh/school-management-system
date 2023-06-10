<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Database\Factories\TeacherFactory;

class Teacher extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'teachers';

    protected $fillable = ['classes.$[elem].end_year'];
}
