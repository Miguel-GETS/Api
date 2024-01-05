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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();


            $table->string('companyName');

            $table->integer('parValue')->nullable();
            $table->decimal('AuthorizedShares',10,2)->nullable();

            $table->string('businessAbout');
            $table->string('fullName');
            $table->string('countryCode');
            $table->string('phoneNumber');
            $table->string('emailAddress');

            $table->unsignedBigInteger('termination_id')->nullable();
            $table->foreign('termination_id')->references('id')->on('terminations')->onDelete('cascade');

            $table->unsignedBigInteger('field_id')->nullable();
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('status_id')->nullable()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');

            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
