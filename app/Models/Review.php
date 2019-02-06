<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'title',
        'user',
        'culture',
        'management',
        'work_live_balance',
        'career_development',
        'pro',
        'contra',
        'suggestions'
    ];
}
