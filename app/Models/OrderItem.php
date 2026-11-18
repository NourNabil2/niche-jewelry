<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'item_type',
        'title',
        'price',
        'quantity',
        'customization_details',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'customization_details' => 'array',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
