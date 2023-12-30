<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $primaryKey = 'SSN';
    protected $fillable = [
        'fname',
        'lname',
        'phone_number',
        'email',
        'password',
        'card_number'
    ];

}
