<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_en',
        'subtitle_ar',
        'subtitle_en',
        'badge_text_ar',
        'badge_text_en',
        'image_url',
        'link_url',
        'button_text_ar',
        'button_text_en',
        'placement',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order', 'asc');
    }

    public function scopePlacement($query, string $placement)
    {
        return $query->where('placement', $placement);
    }
}
