<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 32)->unique();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone', 50);
            $table->json('shipping_address');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('discount_amount', 10, 2)->default(0.00);
            $table->decimal('total_amount', 10, 2);
            $table->string('payment_status', 30)->default('pending');
            $table->string('fulfillment_status', 40)->default('design_review');
            $table->string('tracking_number', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->string('item_type', 40)->default('product');
            $table->string('title');
            $table->decimal('price', 10, 2);
            $table->integer('quantity')->default(1);
            $table->json('customization_details')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
