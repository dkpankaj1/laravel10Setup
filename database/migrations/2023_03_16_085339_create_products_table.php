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
        Schema::create('products', function (Blueprint $table) {
            
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('barcode')->unique();
            $table->unsignedBigInteger('barcode_type_id')->nullable();
            $table->text('description');
            $table->double('cost');
            $table->double('price');
            $table->integer('order_tex')->default(0);
            $table->unsignedBigInteger('tex_type_id')->nullable();
            $table->integer('discount')->default(0);
            $table->integer('stock_alert')->default(0);
            
            $table->unsignedBigInteger('product_unit_id')->nullable();
            $table->unsignedBigInteger('purchase_unit_id')->nullable();
            $table->unsignedBigInteger('sell_unit_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('session_id')->nullable();

            $table->foreign('barcode_type_id')->references('id')->on('barcode_types');
            $table->foreign('tex_type_id')->references('id')->on('tex_types');
            $table->foreign('product_unit_id')->references('id')->on('product_units');
            $table->foreign('purchase_unit_id')->references('id')->on('product_units');
            $table->foreign('sell_unit_id')->references('id')->on('product_units');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('session_id')->references('id')->on('application_sessions');

            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
