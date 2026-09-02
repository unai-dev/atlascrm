<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'main_address',
        'second_address',
        'post_code',
        'country',
        'autonomous_community',
        'city_id'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
