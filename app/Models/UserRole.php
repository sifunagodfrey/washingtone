<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// -------------------
// User Role Model
// -------------------

class UserRole extends Model
{
    // -------------------
    // Table
    // -------------------

    protected $table = 'su_user_roles';

    // -------------------
    // Fillable
    // -------------------

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    // -------------------
    // Users Relationship
    // -------------------

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}