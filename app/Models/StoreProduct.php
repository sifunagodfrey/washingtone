<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoreProduct extends Model
{
    use HasFactory;

    protected $table = 'su_store_products';

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'price',
        'image',
        'gallery_images',
        'stock_quantity',
        'is_featured',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'price'          => 'decimal:2',
        'gallery_images' => 'array',
        'is_featured'    => 'boolean',
    ];

    // -------------------
    // Formatted price
    // -------------------
    public function getFormattedPriceAttribute(): string
    {
        return 'KES ' . number_format($this->price);
    }

    // -------------------
    // Orders relationship
    // -------------------
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }
}
