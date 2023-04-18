<?php
// php artisan migrate:rollback
//php artisan migrate
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crear tablas
     */
    public function up(): void{
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content',500);
            $table->string('category',20);
            $table->timestamps();
        });
    }

    /**
     * matar tablas
     */
    public function down(): void{
        Schema::dropIfExists('questions');
    }
};