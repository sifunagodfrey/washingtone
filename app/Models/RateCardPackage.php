<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RateCardPackage extends Model
{
    use HasFactory;

    protected $table = 'su_rate_card_packages';

    protected $fillable = [
        'category',
        'title',
        'description',
        'price',
        'price_suffix',
        'features',
        'is_featured',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'price'       => 'decimal:2',
        'features'    => 'array',
        'is_featured' => 'boolean',
        'status'      => 'boolean',
    ];

    // -------------------
    // Formatted price e.g. "KES 40,000"
    // -------------------
    public function getFormattedPriceAttribute(): string
    {
        $price = 'KES ' . number_format($this->price);
        return $this->price_suffix ? $price . ' / ' . $this->price_suffix : $price;
    }
}
