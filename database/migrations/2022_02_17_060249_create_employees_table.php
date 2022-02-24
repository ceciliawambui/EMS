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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('salary');
            $table->unsignedBigInteger('job_title_id');
            $table->unsignedBigInteger('department_id');            
            $table->softDeletes();
            $table->timestamps();            
 
            // $table->foreign('job_title_id')->references('id')->on('jobtitles')->onDelete('set null');
            // $table->foreign('department_id')->references('id')->on('department')->onDelete('set null');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};