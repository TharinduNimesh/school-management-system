<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Database\Factories\BookFactory;

class Book extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'books';
}
