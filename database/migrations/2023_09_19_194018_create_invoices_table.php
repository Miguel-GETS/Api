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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->decimal('total', 10, 2);

            $table->string('holderName');
            $table->string('holderLastName');
            $table->string('holderEmail');
            $table->string('holderDocument');

            $table->unsignedBigInteger('document_type_id')->nullable();
            $table->foreign('document_type_id')->references('id')->on('document_types')->onDelete('cascade');
            
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            
            $table->unsignedBigInteger('state_fee_id')->nullable();
            $table->foreign('state_fee_id')->references('id')->on('state_fees')->onDelete('cascade');

            $table->unsignedBigInteger('bonus_id')->nullable();
            $table->foreign('bonus_id')->references('id')->on('bonuses')->onDelete('cascade');

            $table->unsignedBigInteger('payment_id')->nullable();

            $table->date('plan_start_date')->nullable(); // Campo para la fecha de inicio del plan
            $table->date('plan_end_date')->nullable(); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
