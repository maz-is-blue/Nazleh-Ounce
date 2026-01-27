<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bars', function (Blueprint $table) {
            $table->id();
            $table->string('public_id')->unique()->index();
            $table->string('metal_type');
            $table->decimal('weight', 10, 3);
            $table->string('purity')->nullable();
            $table->string('status')->default('unsold');
            $table->foreignId('owner_user_id')->nullable()->index()->constrained('users')->nullOnDelete();
            $table->timestamp('sold_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bars');
    }
};
