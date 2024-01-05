<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('benefists', function (Blueprint $table) {
            $table->id();

            $table->string('benefistName');
            $table->decimal('benefistPrice', 10, 2);
            $table->boolean('benefistStatus')->default(true); // Cambiado a inglés con opciones "Active" y "Inactive"

            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefists');
    }
};
