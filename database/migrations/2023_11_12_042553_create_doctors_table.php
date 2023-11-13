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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('specialty_id');
            $table->string('name');
            $table->text('bio')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();

            // Define la clave foránea con la tabla de usuarios y especialidades.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};

