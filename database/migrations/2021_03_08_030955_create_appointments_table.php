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
            $table->id();
            $table->string('appointment_id');
            $table->integer('patient_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->string('date');
            $table->string('time')->nullable();
            $table->string('patient_email')->nullable();
            $table->string('patient_phone');
            $table->text('message');
            $table->string('status')->default(1);
            $table->timestamps();
           // $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
           // $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
           // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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
