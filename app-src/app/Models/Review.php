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

    protected $appends = [
        'summary_rating'
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

    /**
     * Returns sum of all ratings
     *
     * @return float|int
     */
    public function getSummaryRatingAttribute()
    {
        return array_sum($this->only(['culture', 'management', 'work_live_balance', 'career_development']));
    }
}
