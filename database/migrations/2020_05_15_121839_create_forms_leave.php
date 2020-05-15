<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsLeave extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave', function (Blueprint $table) {
            $table->increments('id');
            $table->text('address')->nullable();
            $table->date('date')->nullable();
            $table->string('dear')->nullable();
            $table->integer('U_id')->nullable();
            $table->string('title')->nullable();
            $table->string('vacation')->nullable();
            $table->string('etc')->nullable();
            $table->text('detail')->nullable();
            $table->date('indate')->nullable();
            $table->date('todate')->nullable();
            $table->integer('alltime')->nullable();
            $table->string('contacted')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->integer('approve')->nullable();
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
        Schema::dropIfExists('leave');
    }
}
