<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('metal_prices', function (Blueprint $table) {
            $table->id();
            $table->string('metal', 20);
            $table->string('currency', 3);
            $table->decimal('price_oz', 12, 4);
            $table->decimal('price_half_kg', 14, 4);
            $table->decimal('price_kg', 14, 4);
            $table->timestamp('fetched_at');
            $table->string('source', 50)->nullable();
            $table->timestamps();

            $table->unique(['metal', 'currency']);
            $table->index(['currency', 'metal']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('metal_prices');
    }
};
