<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('commercial_projects', function (Blueprint $table) {
            // Remove old feature columns if they exist
            if (Schema::hasColumn('commercial_projects', 'feature_1')) {
                $table->dropColumn(['feature_1','feature_2','feature_3','feature_4','feature_5']);
            }

            // Add new JSON column
            if (!Schema::hasColumn('commercial_projects', 'features')) {
                $table->json('features')->nullable()->after('image');
            }
        });
    }

    public function down(): void
    {
        Schema::table('commercial_projects', function (Blueprint $table) {
            // Remove the JSON column if rolling back
            $table->dropColumn('features');

            // Add old feature columns back
            $table->string('feature_1')->nullable()->after('image');
            $table->string('feature_2')->nullable()->after('feature_1');
            $table->string('feature_3')->nullable()->after('feature_2');
            $table->string('feature_4')->nullable()->after('feature_3');
            $table->string('feature_5')->nullable()->after('feature_4');
        });
    }
};
