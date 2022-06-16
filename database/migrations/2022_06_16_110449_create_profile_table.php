<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->integer('worker_id');
            $table->string('passport')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('PNFL')->nullable();
            $table->string('INN')->nullable();
            $table->date('birthday')->nullable();
            $table->string('place_birthday')->nullable();
            $table->string('year_start')->nullable();
            $table->char('sex')->nullable();
            $table->string('family_status')->nullable();
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
        Schema::dropIfExists('profile');
    }
}
