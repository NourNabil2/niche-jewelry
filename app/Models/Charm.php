<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charm extends Model
{
    protected $fillable = [
        'charm_code',
        'name_ar',
        'name_en',
        'category',
        'price',
        'price_kwd',
        'mesh_type',
        'allow_upright',
        'icon_svg',
        'thumbnail_url',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'price_kwd' => 'decimal:3',
        'allow_upright' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? ($this->name_en ?: $this->name_ar) : ($this->name_ar ?: $this->name_en);
    }
}
