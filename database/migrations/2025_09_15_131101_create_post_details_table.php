<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade'); // link to posts table
            $table->string('subtitle1')->nullable();
            $table->text('subcontent1')->nullable();
            $table->string('subtitle2')->nullable();
            $table->string('subtitle3')->nullable();
            $table->text('subcontent2')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_details');
    }
};
