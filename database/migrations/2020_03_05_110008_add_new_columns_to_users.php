<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gst')->nullable();
            $table->string('mobile')->nullable();
            $table->string('comp_name')->nullable();
            $table->text('address')->nullable();
            $table->text('bank_branch')->nullable();
            $table->string('bank_ac_no')->nullable();
            $table->string('bank_ifsc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['gst', 'mobile', 'comp_name', 'address', 'bank_branch', 'bank_ac_no', 'bank_ifsc']);
        });
    }
}
