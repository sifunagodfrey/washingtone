<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// -------------------
// User Log Model (su_user_logs)
// -------------------

class UserLog extends Model
{
    protected $table = 'su_user_logs';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'message',
        'meta',
        'ip_address',
        'user_agent',
        'status',
    ];

    protected $casts = [
        'meta' => 'array',
    ];
}