<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    // Define the fillable fields to protect against mass-assignment
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];
}
