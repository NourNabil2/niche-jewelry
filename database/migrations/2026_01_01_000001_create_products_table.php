<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title_ar');
            $table->string('title_en');
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->string('category', 50)->default('bangles');
            $table->decimal('base_price', 10, 2);
            $table->decimal('compare_price', 10, 2)->nullable();
            $table->string('material', 50)->default('14k_gold');
            $table->json('images');
            $table->json('specs')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('in_stock')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
