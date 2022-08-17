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
        Schema::create('JobDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('required', 1000)->nullable();
            $table->string('technical', 1000)->nullable();
            $table->unsignedDouble('salary', 100)->nullable();
            $table->date('deadline')->nullable();
            $table->unsignedInteger('job_id')->nullable();
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('jobs')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
