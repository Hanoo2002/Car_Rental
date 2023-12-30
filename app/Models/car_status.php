<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car_status extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $table = 'car_status';
    protected $primaryKey = ['plate_number', 'date'];
    protected $fillable = [
        'status'
    ];
}
