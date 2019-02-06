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

    protected $appends = [
        'average_culture',
        'average_management',
        'average_work_live_balance',
        'average_career_development'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getAverageCultureAttribute()
    {
        return $this->reviews()->avg('culture');
    }

    public function getAverageManagementAttribute()
    {
        return $this->reviews()->avg('management');
    }

    public function getAverageWorkLiveBalanceAttribute()
    {
        return $this->reviews()->avg('work_live_balance');
    }

    public function getAverageCareerDevelopmentAttribute()
    {
        return $this->reviews()->avg('career_development');
    }
}
