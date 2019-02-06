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

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
