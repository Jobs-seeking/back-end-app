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
        Schema::create('userinfo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('name', 255);
            $table->date('dateOfBirth', 255);
            $table->string('phone', 10);
            $table->string('discription', 1000);
            $table->string('address', 255);
            $table->enum('status', ['active', 'unactive']);
            $table->enum('role', ['student', 'company', 'admin']);
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
        //
    }
};
