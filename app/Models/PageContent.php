<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $table = 'su_page_content';

    protected $fillable = [
        'page_slug',
        'title',
        'content',
        'meta_title',
        'meta_description',
    ];

    // -------------------
    // Convenience finder
    // -------------------
    public static function getPage(string $slug): self
    {
        return static::firstOrCreate(
            ['page_slug' => $slug],
            ['title' => ucwords(str_replace('-', ' ', $slug))]
        );
    }
}
