<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Settings Table
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->longText('value')->nullable();
            $table->string('group', 50)->default('general');
            $table->string('type', 30)->default('text');
            $table->timestamps();
        });

        // 2. Banners & Marketing Announcements Table
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->text('subtitle_ar')->nullable();
            $table->text('subtitle_en')->nullable();
            $table->string('badge_text_ar')->nullable();
            $table->string('badge_text_en')->nullable();
            $table->string('image_url')->nullable();
            $table->string('link_url')->nullable();
            $table->string('button_text_ar')->nullable();
            $table->string('button_text_en')->nullable();
            $table->string('placement', 40)->default('hero'); // hero, top_bar, popup_offer, mid_banner
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 3. Promotions & Discount Codes Table
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->string('discount_type', 30)->default('percentage'); // percentage, fixed_usd, fixed_kwd
            $table->decimal('discount_value', 10, 2);
            $table->decimal('min_order_amount', 10, 2)->default(0);
            $table->decimal('max_discount_amount', 10, 2)->nullable();
            $table->integer('usage_limit')->nullable();
            $table->integer('used_count')->default(0);
            $table->dateTime('starts_at')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promotions');
        Schema::dropIfExists('banners');
        Schema::dropIfExists('settings');
    }
};
