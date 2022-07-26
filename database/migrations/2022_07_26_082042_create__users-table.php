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
        Schema::create('userinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 255)->nullable();
            $table->string('password', 50)->nullable();
            $table->string('name', 255)->nullable();
            $table->date('dateOfBirth', 255)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('image', 1000)->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('address', 255)->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->enum('role', ['student', 'company', 'admin'])->nullable();
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
