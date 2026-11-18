<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('charms', function (Blueprint $table) {
            $table->id();
            $table->string('charm_code', 50)->unique();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('category', 50)->default('symbols'); // symbols, letters, numbers, custom
            $table->decimal('price', 10, 2);
            $table->string('mesh_type', 50)->default('parametric');
            $table->text('icon_svg')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('charms');
    }
};
