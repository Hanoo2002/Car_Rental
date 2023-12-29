<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'fname',
        'lname',
        'city',
        'country',
        'district',
        'phone_number',
        'email',
        'password',
        'card_number',
        'created_at',
        'updated_at'
    ];

}
