<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// -------------------
// Blog Model
// -------------------

class Blog extends Model
{
    use HasFactory;

    protected $table = 'su_blogs';

    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'slug',
        'featured_image',
        'content',
        'status',
        'published_at',
    ];

    // -------------------
    // ATTRIBUTE CASTS
    // -------------------

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}