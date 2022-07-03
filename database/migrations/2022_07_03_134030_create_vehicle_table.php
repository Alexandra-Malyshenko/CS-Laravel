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
        Schema::create('vehicle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('VIN');
            $table->string('model', 120);
            $table->integer('price');
            $table->year('year');
            $table->integer('type');
            $table->foreignId('dealer_id');
            $table->foreignId('manufacture_id');
            $table->foreignId('transmission_id');
            $table->foreignId('type_of_vehicle_id');
            $table->foreignId('status_id');

            $table->timestamps();
        });

        Schema::create('dealer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->integer('manufacture_id');
            $table->integer('email');
            $table->integer('phone');

            $table->timestamps();
        });

        Schema::create('picture', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->integer('email');
            $table->integer('phone');
            $table->foreignId('vehicle_id');

            $table->timestamps();
        });

        Schema::create('type_of_vehicle', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);

            $table->timestamps();
        });

        Schema::create('transmission', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);

            $table->timestamps();
        });

        Schema::create('vehicle_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);

            $table->timestamps();
        });

        Schema::create('manufacture', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);

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
        Schema::dropIfExists('vehicle');
        Schema::dropIfExists('manufacture');
        Schema::dropIfExists('vehicle_status');
        Schema::dropIfExists('transmission');
        Schema::dropIfExists('type_of_vehicle');
        Schema::dropIfExists('picture');
        Schema::dropIfExists('dealer');
    }
};
