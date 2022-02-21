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
            // $table->unsignedBigInteger('job_title_id');
            // $table->unsignedBigInteger('department_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('salary');
            $table->foreignId('job_title_id')
                  ->constrained('jobtitles')
                  ->onUpdate('cascade')
                  ->onDelete('set null');
            $table->foreignId('department_id')
                  ->constrained('department')
                  ->onUpdate('cascade')
                  ->onDelete('set null');
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
        Schema::dropIfExists('employees');
        // $table->dropForeign(['job_title_id']);
        // $table->dropForeign(['department_id']);
    }
};