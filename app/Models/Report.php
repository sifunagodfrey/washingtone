<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'su_move_reports';

    protected $fillable = [
        'move_id',
        'booking_id',
        'report_number',
        'summary',
        'issues',
        'completed_at',
    ];
}