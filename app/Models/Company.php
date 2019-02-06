<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'name',
        'slug',
        'city',
        'country',
        'industry'
    ];

    /**
     * This attributes will be added to model's json presentation
     *
     * @var array
     */
    protected $appends = [
        'average_culture',
        'average_management',
        'average_work_live_balance',
        'average_career_development'
    ];

    /**
     * Returns company reviews
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * @return float
     */
    public function getAverageCultureAttribute()
    {
        return $this->reviews()->avg('culture');
    }

    /**
     * @return float
     */
    public function getAverageManagementAttribute()
    {
        return $this->reviews()->avg('management');
    }

    /**
     * @return float
     */
    public function getAverageWorkLiveBalanceAttribute()
    {
        return $this->reviews()->avg('work_live_balance');
    }

    /**
     * @return float
     */
    public function getAverageCareerDevelopmentAttribute()
    {
        return $this->reviews()->avg('career_development');
    }
}
