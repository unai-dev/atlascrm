<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'phone',
        'email',
        'address_id',
        'enterprise_id'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
}
