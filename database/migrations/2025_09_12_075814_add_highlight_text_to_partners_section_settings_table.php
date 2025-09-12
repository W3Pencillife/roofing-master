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
        Schema::table('partners_section_settings', function (Blueprint $table) {
            $table->string('highlight_text')->default('Partners')->after('title');
        });
    }

    public function down(): void
    {
        Schema::table('partners_section_settings', function (Blueprint $table) {
            $table->dropColumn('highlight_text');
        });
    }

};
