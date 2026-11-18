<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomDesign extends Model
{
    protected $fillable = [
        'share_token',
        'metal_finish',
        'wrist_size',
        'front_track',
        'back_track',
        'engraving_text',
        'engraving_font',
        'total_price',
        'thumbnail',
    ];

    protected $casts = [
        'front_track' => 'array',
        'back_track' => 'array',
        'total_price' => 'decimal:2',
    ];
}
