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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();

            $table->string('planName');
            $table->string('planPeriod');
            $table->decimal('planPrice', 10, 2);
            $table->string('planDescription')->nullable();

            //$table->text('features');
            
            $table->boolean('planStatus')->default(true); // Cambiado a inglés con opciones "Active" y "Inactive"

            $table->unsignedBigInteger('feature_id')->nullable();
            $table->foreign('feature_id')->references('id')->on('features');
       

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
