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
        Schema::create('soldier__weapon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('weapon_id')
                ->constrained('weapons')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('soldier_id')
                ->constrained('soldiers')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soldier__weapon');
    }
};
