<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// -------------------
// Route Model
// -------------------

class RouteModel extends Model
{
    use HasFactory;

    // -------------------
    // TABLE NAME
    // -------------------
    protected $table = 'su_routes';

    // -------------------
    // TIMESTAMP CONFIG
    // -------------------
    public $timestamps = true;     // allow created_at
    const UPDATED_AT = null;       // disable updated_at

    // -------------------
    // FILLABLE FIELDS
    // -------------------
    protected $fillable = [
        'move_id',
        'start_location',
        'end_location',
        'distance',
        'estimated_duration',
    ];

    // -------------------
    // MOVE RELATIONSHIP
    // -------------------
    public function move()
    {
        return $this->belongsTo(Move::class, 'move_id');
    }
}