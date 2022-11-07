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
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cv', 1000);
            $table->string('cover_letter', 1000);
            $table->unsignedInteger('job_id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('year_experience');
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('jobs')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('userinfo')
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
