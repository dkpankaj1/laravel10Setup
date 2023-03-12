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
            $table->string('time_zone');
            $table->string('date_format');
            $table->unsignedBigInteger('default_app_session');
            $table->unsignedBigInteger('default_currency');

            $table->foreign('default_app_session')->references('id')->on('application_sessions');
            $table->foreign('default_currency')->references('id')->on('currencies');
            
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
