<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// -------------------
// Admin 2FA Model
// -------------------

class AdminTwoFactor extends Model
{
    protected $table = 'su_admin_2fa_tokens';

    protected $fillable = [
        'user_id',
        'code',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];
}