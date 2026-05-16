<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $table = 'su_services';

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'features',
        'icon',
        'image',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status'   => 'boolean',
        'features' => 'array',
    ];
}
