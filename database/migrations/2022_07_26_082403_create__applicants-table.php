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
            $table->string('cv', 1000)->nullable();
            $table->string('cover_letter', 1000)->nullable();
            $table->unsignedInteger('job_id')->nullable();
            $table->unsignedInteger('student_id')->nullable();
            $table->unsignedInteger('year_experience')->nullable();
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('jobs')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('userinfos')
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
