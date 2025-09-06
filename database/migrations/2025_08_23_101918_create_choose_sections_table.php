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
        Schema::create('choose_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // section title
            $table->string('highlight')->nullable(); // highlighted word (e.g., BD Roofing)
            $table->timestamps();
        });

        Schema::create('choose_benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('choose_section_id')->constrained()->onDelete('cascade');
            $table->string('icon')->nullable(); // Bootstrap icon class
            $table->string('heading');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choose_sections');
    }
};
