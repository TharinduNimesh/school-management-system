<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class BorrowedBook extends Model
{
    use HasFactory;
    protected $collection = 'borrowed_books';
    protected $connection = 'mongodb';
}
