<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'su_orders';

    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'payment_method',
        'mpesa_transaction_code',
        'total_amount',
        'status',
        'customer_notes',
        'admin_notes',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    // -------------------
    // Items relationship
    // -------------------
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    // -------------------
    // Generate unique order number
    // -------------------
    public static function generateOrderNumber(): string
    {
        $date = now()->format('Ymd');
        $last = static::whereDate('created_at', today())->latest('id')->first();
        $seq  = $last ? (intval(substr($last->order_number, -4)) + 1) : 1;
        return 'ORD-' . $date . '-' . str_pad($seq, 4, '0', STR_PAD_LEFT);
    }

    // -------------------
    // Status badge colour helper
    // -------------------
    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'confirmed'  => 'success',
            'processing' => 'info',
            'completed'  => 'primary',
            'cancelled'  => 'danger',
            default      => 'warning',   // pending
        };
    }
}
