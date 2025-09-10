<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partners_section', function (Blueprint $table) {
            $table->id();
            $table->string('title');         // Section title
            $table->text('description');     // Section description
            $table->timestamps();            // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partners_section');
    }
};
