<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /** @use HasFactory<\Database\Factories\SliderFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'title_color',
        'sub_title',
        'sub_title_color',
        'image',
        'url',
        'button_text',
        'button_text_color',
        'button_background_color',
    ];
}
