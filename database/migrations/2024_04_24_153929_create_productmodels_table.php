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
        Schema::create('productmodels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('subcat_id')->nullable();
            $table->double('regular_price');
            $table->double('discount_price')->nullable();
            $table->double('buy_price');
            $table->integer('quantity');
            
            $table->string('sqy_code');
            $table->string('product_type');
            $table->string('short_desc')->nullable();
            $table->longText('long_desc');
            $table->longText('product_policy')->nullable();
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productmodels');
    }
};
