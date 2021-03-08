<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->integer('age')->unsigned();
            $table->string('email');
            $table->string('dob');
            $table->string('gender')->nullable();
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code')->nullable();
            $table->string('phone');
            $table->string('status')->default(1);

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
        Schema::dropIfExists('patients');
    }
}
