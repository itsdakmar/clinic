<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patientId');
            $table->string('type');
            $table->string('status');
            $table->string('bloodPressure')->nullable();
            $table->string('respiratoryRate')->nullable();
            $table->string('temperature')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
            $table->foreign('patientId')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
