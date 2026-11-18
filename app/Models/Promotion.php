<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title_ar',
        'title_en',
        'discount_type',
        'discount_value',
        'min_order_amount',
        'max_discount_amount',
        'usage_limit',
        'used_count',
        'starts_at',
        'expires_at',
        'is_active',
    ];

    protected $casts = [
        'discount_value' => 'decimal:2',
        'min_order_amount' => 'decimal:2',
        'max_discount_amount' => 'decimal:2',
        'usage_limit' => 'integer',
        'used_count' => 'integer',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function isValid(?float $orderAmount = null): array
    {
        if (!$this->is_active) {
            return ['valid' => false, 'message' => 'هذا الكوبون غير مفعّل حالياً / Coupon is inactive'];
        }

        $now = Carbon::now();
        if ($this->starts_at && $now->lt($this->starts_at)) {
            return ['valid' => false, 'message' => 'هذا الكوبون لم يبدأ بعد / Coupon is not active yet'];
        }

        if ($this->expires_at && $now->gt($this->expires_at)) {
            return ['valid' => false, 'message' => 'انتهت صلاحية هذا الكوبون / Coupon has expired'];
        }

        if ($this->usage_limit !== null && $this->used_count >= $this->usage_limit) {
            return ['valid' => false, 'message' => 'وصل هذا الكوبون إلى الحد الأقصى للاستخدام / Usage limit reached'];
        }

        if ($orderAmount !== null && $this->min_order_amount > 0 && $orderAmount < $this->min_order_amount) {
            return [
                'valid' => false,
                'message' => 'الحد الأدنى للطلب لتفعيل هذا الكوبون هو $' . number_format($this->min_order_amount, 2)
            ];
        }

        return ['valid' => true, 'message' => 'الكوبون صالح للاستخدام'];
    }

    public function calculateDiscount(float $orderAmount): float
    {
        $discount = 0.0;
        if ($this->discount_type === 'percentage') {
            $discount = ($orderAmount * (float)$this->discount_value) / 100.0;
        } else {
            // fixed_usd or fixed_kwd
            $discount = (float)$this->discount_value;
        }

        if ($this->max_discount_amount !== null && $discount > (float)$this->max_discount_amount) {
            $discount = (float)$this->max_discount_amount;
        }

        return min($discount, $orderAmount);
    }
}
