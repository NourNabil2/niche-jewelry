<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('custom_designs', function (Blueprint $table) {
            $table->id();
            $table->string('share_token', 64)->unique();
            $table->string('metal_finish', 40)->default('yellow_gold');
            $table->string('wrist_size', 20)->default('M');
            $table->json('front_track');
            $table->json('back_track');
            $table->string('engraving_text', 60)->nullable();
            $table->string('engraving_font', 40)->default('roman');
            $table->decimal('total_price', 10, 2);
            $table->longText('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('custom_designs');
    }
};
