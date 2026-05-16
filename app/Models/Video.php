<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    protected $table = 'su_videos';

    protected $fillable = [
        'title',
        'description',
        'youtube_url',
        'youtube_id',
        'thumbnail',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    // -------------------
    // Auto-extract YouTube ID when URL is set
    // -------------------
    public function setYoutubeUrlAttribute(string $value): void
    {
        $this->attributes['youtube_url'] = $value;

        preg_match(
            '/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([A-Za-z0-9_\-]{11})/',
            $value,
            $matches
        );

        $this->attributes['youtube_id'] = $matches[1] ?? null;
    }

    // -------------------
    // Embed URL accessor
    // -------------------
    public function getEmbedUrlAttribute(): string
    {
        return 'https://www.youtube.com/embed/' . $this->youtube_id;
    }

    // -------------------
    // Thumbnail accessor (YouTube default if no override)
    // -------------------
    public function getThumbnailUrlAttribute(): string
    {
        if ($this->thumbnail) {
            return asset('uploads/videos/' . $this->thumbnail);
        }
        return 'https://img.youtube.com/vi/' . $this->youtube_id . '/hqdefault.jpg';
    }
}
