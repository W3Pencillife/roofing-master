<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');              // Main title
            $table->string('slug');               // URL-friendly slug
            $table->text('content');              // Main content (About section)
            $table->string('category');           // Category (optional)
            
            $table->string('subtitle1')->nullable();   // Hero subtitle
            $table->text('subcontent1')->nullable();   // Hero content

            $table->string('subtitle2')->nullable();   // About section subtitle

            $table->string('subtitle3')->nullable();   // Pricing section subtitle
            $table->text('subcontent2')->nullable();   // Pricing section content

            $table->string('image')->nullable();       // Dynamic image path

            $table->timestamps();                       // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
