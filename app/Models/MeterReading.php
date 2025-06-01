<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeterReading extends Model
{
    protected $fillable = [
    'hall_name',
    'client_name',
    'previous_meter',
    'current_meter',
    'total',
    'amount',
    'notes',
    'status',
];

}
