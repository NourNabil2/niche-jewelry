<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'slug',
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'category',
        'base_price',
        'compare_price',
        'material',
        'images',
        'specs',
        'is_featured',
        'in_stock',
    ];

    protected $casts = [
        'images' => 'array',
        'specs' => 'array',
        'is_featured' => 'boolean',
        'in_stock' => 'boolean',
        'base_price' => 'decimal:2',
        'compare_price' => 'decimal:2',
    ];

    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? ($this->title_en ?: $this->title_ar) : ($this->title_ar ?: $this->title_en);
    }

    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? ($this->description_en ?: $this->description_ar) : ($this->description_ar ?: $this->description_en);
    }
}
