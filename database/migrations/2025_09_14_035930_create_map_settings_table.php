<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('map_settings', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->text('map_embed_url'); 
            $table->string('location_name')->nullable();
            $table->integer('map_height')->default(400); 
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('map_settings');
    }
};
