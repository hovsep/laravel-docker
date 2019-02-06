<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
        'title',
        'user',
        'culture',
        'management',
        'work_live_balance',
        'career_development',
        'pro',
        'contra',
        'suggestions',
        'company_id'
    ];

    /**
     * Returns parent company
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
