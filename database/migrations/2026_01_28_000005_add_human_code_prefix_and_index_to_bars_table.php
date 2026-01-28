<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bars', function (Blueprint $table) {
            $table->string('human_code_prefix', 4)->nullable()->index()->after('human_code_number');

            $table->dropUnique('bars_human_code_number_unique');
            $table->dropIndex('bars_human_code_number_index');

            $table->unique(['human_code_prefix', 'human_code_number'], 'bars_human_code_series_unique');
        });
    }

    public function down(): void
    {
        Schema::table('bars', function (Blueprint $table) {
            $table->dropUnique('bars_human_code_series_unique');

            $table->unique('human_code_number');
            $table->index('human_code_number');

            $table->dropIndex(['human_code_prefix']);
            $table->dropColumn('human_code_prefix');
        });
    }
};
