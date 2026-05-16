<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// -------------------
// Blog Category Model
// -------------------

class BlogCategory extends Model
{
    use HasFactory;

    // -------------------
    // TABLE NAME
    // -------------------
    protected $table = 'su_blog_categories';

    // -------------------
    // FILLABLE FIELDS
    // -------------------
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
    ];

    // -------------------
    // RELATIONSHIP: BLOGS
    // -------------------
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}