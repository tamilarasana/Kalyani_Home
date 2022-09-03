<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brouchers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullabe();
            $table->unsignedBigInteger('product_id');
            $table->string('file')->nullabe();
            $table->text('description')->nullabe();
            $table->string('status')->nullabe();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brouchers');
    }
}
