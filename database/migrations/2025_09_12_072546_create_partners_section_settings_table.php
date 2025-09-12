<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partners_section_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Our');
            $table->string('highlight_text')->default('Partners'); // ✅ add this column
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Insert a default row so the frontend has data
        DB::table('partners_section_settings')->insert([
            'title' => 'Our',
            'highlight_text' => 'Partners',
            'description' => 'We work with valued partners to create lasting impact and bring better solutions to our community.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('partners_section_settings');
    }
};
