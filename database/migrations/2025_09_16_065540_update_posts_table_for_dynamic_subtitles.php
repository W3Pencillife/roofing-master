<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('posts', function (Blueprint $table) {
        // Drop old fixed columns
        $table->dropColumn(['subtitle1','subtitle2','subtitle3','subcontent1','subcontent2']);

        // Add new JSON columns
        $table->json('subtitles')->nullable();
        $table->json('subcontents')->nullable();
    });
}

public function down()
{
    Schema::table('posts', function (Blueprint $table) {
        $table->string('subtitle1')->nullable();
        $table->string('subtitle2')->nullable();
        $table->string('subtitle3')->nullable();
        $table->text('subcontent1')->nullable();
        $table->text('subcontent2')->nullable();

        $table->dropColumn(['subtitles','subcontents']);
    });
}

};
