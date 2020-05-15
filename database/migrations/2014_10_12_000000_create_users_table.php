<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefix')->nullable();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->integer('position')->nullable();
            $table->integer('department')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('profile')->nullable();
            $table->boolean('type')->default(0);
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
        Schema::dropIfExists('users');
    }
}
