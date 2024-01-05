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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->json('forCompInUS')->nullable(); // Columna JSON para almacenar las características
            $table->json('forEntInUS')->nullable(); // Columna JSON para almacenar las características
            $table->json('features')->nullable(); // Columna JSON para almacenar las características
            $table->json('bookingAndTaxes')->nullable(); // Columna JSON para almacenar las características
            $table->json('bussinessDissolution')->nullable(); // Columna JSON para almacenar las características
            $table->json('ADD_ONS')->nullable(); // Columna JSON para almacenar las características

            $table->boolean('featureStatus')->default(true); // Cambiado a inglés con opciones "Active" y "Inactive"

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
