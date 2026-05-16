<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    // -------------------
    // TABLE NAME
    // -------------------
    protected $table = 'su_invoices';

    // -------------------
    // FILLABLE FIELDS
    // -------------------
    protected $fillable = [
        'client_id',
        'booking_id',
        'quotation_id',
        'invoice_number',
        'subtotal',
        'tax',
        'total',
        'status',
        'issued_at',
        'due_date',
    ];

    // -------------------
    // CLIENT RELATIONSHIP
    // -------------------
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    // -------------------
    // BOOKING RELATIONSHIP
    // -------------------
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    // -------------------
    // QUOTATION RELATIONSHIP
    // -------------------
    public function quotation()
    {
        return $this->belongsTo(Quotation::class, 'quotation_id');
    }

    // -------------------
    // GENERATE INVOICE NUMBER
    // -------------------
    public static function generateInvoiceNumber()
    {
        $last = static::latest('id')->first();
        $next = $last ? (intval(substr($last->invoice_number, 4)) + 1) : 1;
        return 'INV-' . str_pad($next, 4, '0', STR_PAD_LEFT);
    }
}