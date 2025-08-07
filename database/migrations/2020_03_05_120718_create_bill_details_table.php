<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('cust_id')->unsigned();
            $table->integer('bill_id')->unsigned();
            $table->integer('cat_id')->unsigned();
            $table->integer('subcat_id')->unsigned();
            $table->text('name')->nullable();
            $table->string('hsncode')->nullable();
            $table->string('number')->nullable();
            $table->string('feet')->nullable();
            $table->string('feet_word')->nullable();
            $table->double('single_price', 10, 2);
            $table->double('cgst', 10, 2)->default(0);
            $table->double('sgst', 10, 2)->default(0);
            $table->double('igst', 10, 2)->default(0);
            $table->double('total_price', 10, 2);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cust_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcat_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_details');
    }
}
