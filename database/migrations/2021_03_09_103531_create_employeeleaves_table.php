<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeleavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeeleaves', function (Blueprint $table) {
            $table->id();
            $table->string('leave_type');
            $table->integer('employee_id')->unsigned();
            $table->string('from');
            $table->string('to');
            $table->integer('no_of_days')->unsigned();
            $table->string('status');
            $table->string('leave_reason');
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
        Schema::dropIfExists('employeeleaves');
    }
}
