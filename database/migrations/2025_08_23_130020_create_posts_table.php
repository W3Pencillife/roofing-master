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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('subtitle1')->nullable()->after('category');   // Hero subtitle
            $table->text('subcontent1')->nullable()->after('subtitle1'); // Hero content
            $table->string('subtitle2')->nullable()->after('subcontent1'); // About section subtitle
            $table->string('subtitle3')->nullable()->after('subtitle2'); // Pricing section subtitle
            $table->text('subcontent2')->nullable()->after('subtitle3'); // Pricing section content
            $table->string('image')->nullable()->after('subcontent2'); // Dynamic image path
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn([
                'subtitle1',
                'subcontent1',
                'subtitle2',
                'subtitle3',
                'subcontent2',
                'image',
            ]);
        });
    }
};
