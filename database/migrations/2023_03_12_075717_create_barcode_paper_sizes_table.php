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
        Schema::create('barcode_paper_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('paper');
            $table->integer('qnt');
            $table->double('height');
            $table->double('width');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barcode_paper_sizes');
    }
};
