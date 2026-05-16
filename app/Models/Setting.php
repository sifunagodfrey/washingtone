<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'su_settings';

    protected $fillable = [
        'site_name',
        'site_email',
        'support_email',
        'support_phone',
        'whatsapp_number',
        'alternative_phone',
        'business_location',
        'facebook',
        'instagram',
        'linkedin',
        'tiktok',
        'youtube',
        'twitter',
        'logo',
        'favicon',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'about_short',
        'mpesa_paybill',
        'mpesa_account_name',
        'whatsapp_order_number',
        'meta_description',
    ];
}
