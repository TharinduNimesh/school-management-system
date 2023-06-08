<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class RequestedPayment extends Model
{
    use HasFactory;
    protected $collection = 'requested_payments';
    protected $connection = 'mongodb';

    protected $fillable = [
        "amount",
        "payed_at",
        "payed_by",
        "remaining"
    ];
}
