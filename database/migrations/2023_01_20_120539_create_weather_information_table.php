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
        Schema::create('weather_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained();
            $table->dateTime('time');
            $table->string('weather_name');
            $table->string('longitude');
            $table->string('latitude');
            $table->double('temperature');
            $table->smallInteger('pressure');
            $table->smallInteger('humidity');
            $table->double('min_temperature');
            $table->double('max_temperature');
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
        Schema::dropIfExists('weather_information');
    }
};
