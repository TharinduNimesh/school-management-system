<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Leaves extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'teachers_leaves_data';
}
