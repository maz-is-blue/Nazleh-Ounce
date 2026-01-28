<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bars', function (Blueprint $table) {
            $table->unsignedBigInteger('human_code_number')->nullable()->unique()->index()->after('public_id');
        });
    }

    public function down(): void
    {
        Schema::table('bars', function (Blueprint $table) {
            $table->dropColumn('human_code_number');
        });
    }
};
