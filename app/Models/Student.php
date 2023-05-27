<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Database\Factories\StudentFactory;

class Student extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'students';

    protected $fillable = ["subjects"];

}
