<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'main_text', 'footer_text', 'image_1', 'image_2', 'image_3'];

}
