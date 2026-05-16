<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'su_vehicles';

    protected $fillable = [
        'vehicle_name',
        'plate_number',
        'capacity',
        'status',
    ];
}