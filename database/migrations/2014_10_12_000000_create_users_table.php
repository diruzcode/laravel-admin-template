<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('rut');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('father_surname')->nullable();
            $table->string('mother_surname')->nullable();
            $table->string('email')->unique();
            $table->boolean('access_web')->default(0);
            $table->boolean('access_app')->default(0);
            $table->boolean('hidden')->default(0);
            $table->string('password');
            $table->dateTime('last_login')->nullable();
            $table->rememberToken();
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
