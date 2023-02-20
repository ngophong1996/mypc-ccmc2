<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mypcs', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('useremail');
            $table->string('class');
            $table->string('option');
            $table->string('device');
            $table->string('image')->nullable();
            $table->integer('wifi');
            $table->integer('total');
            $table->integer('paymentstate')->default(0);
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
        Schema::dropIfExists('mypcs');
    }
};
