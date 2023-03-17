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
        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('company_name');
            $table->string('company_email');
            $table->string('company_phone');
            $table->string('company_address');
            $table->string('time_zone')->nullable();
            $table->string('date_format')->nullable();
            $table->unsignedBigInteger('default_warehouse')->nullable();
            $table->unsignedBigInteger('default_currency')->nullable();
            $table->unsignedBigInteger('default_unit')->nullable();
            $table->unsignedBigInteger('current_app_session')->nullable();
            $table->unsignedBigInteger('default_app_session')->nullable();

            $table->foreign('default_warehouse')->references('id')->on('warehouses');
            $table->foreign('default_currency')->references('id')->on('currencies');
            $table->foreign('default_unit')->references('id')->on('product_units');
            $table->foreign('current_app_session')->references('id')->on('application_sessions');
            $table->foreign('default_app_session')->references('id')->on('application_sessions');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settions');
    }
};
