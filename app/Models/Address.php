<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_address',
        'second_address',
        'postal_code',
        'country',
        'autonomous_community',
        'city'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
