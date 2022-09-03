<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullabe();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('producttype_id');   
            $table->unsignedBigInteger('location_id');  
            $table->string('about')->nullabe();
            $table->text('description')->nullabe();
            $table->string('price')->nullabe();
            $table->string('contact_num')->nullabe();
            $table->string('remarks')->nullabe();
            $table->string('status')->nullabe();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('producttype_id')->references('id')->on('producttypes');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
