<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bars', function (Blueprint $table) {
            $table->string('human_code_prefix', 4)->nullable()->index()->after('human_code_number');

            if ($this->indexExists('bars', 'bars_human_code_number_unique')) {
                $table->dropUnique('bars_human_code_number_unique');
            }
            if ($this->indexExists('bars', 'bars_human_code_number_index')) {
                $table->dropIndex('bars_human_code_number_index');
            }

            $table->unique(['human_code_prefix', 'human_code_number'], 'bars_human_code_series_unique');
        });
    }

    public function down(): void
    {
        Schema::table('bars', function (Blueprint $table) {
            $table->dropUnique('bars_human_code_series_unique');

            $table->unique('human_code_number');
            $table->index('human_code_number');

            if ($this->indexExists('bars', 'bars_human_code_prefix_index')) {
                $table->dropIndex(['human_code_prefix']);
            }
            $table->dropColumn('human_code_prefix');
        });
    }

    private function indexExists(string $table, string $indexName): bool
    {
        $result = DB::selectOne(
            'select 1 as `exists` from information_schema.statistics where table_schema = database() and table_name = ? and index_name = ? limit 1',
            [$table, $indexName]
        );

        return $result !== null;
    }
};
