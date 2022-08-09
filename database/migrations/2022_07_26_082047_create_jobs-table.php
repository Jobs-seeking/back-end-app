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
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('job_type_id')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('job_type_id')->references('id')->on('jobtypes')
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
