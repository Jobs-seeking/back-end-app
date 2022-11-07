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
        Schema::create('JobDetail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('description', 1000);
            $table->string('required', 1000);
            $table->string('technical', 1000);
            $table->unsignedDouble('salary', 100);
            $table->date('deadline');
            $table->unsignedInteger('job_id');
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
