<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'car';
    protected $primaryKey = 'plate_number';
    protected $fillable = [
        'year',
        'model',
        'color',
        'office_id',
        'price',
        'current_status'
    ];
}
