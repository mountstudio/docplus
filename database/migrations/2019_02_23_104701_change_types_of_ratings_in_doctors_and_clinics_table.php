<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypesOfRatingsInDoctorsAndClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->float('attent_rating')->change();
            $table->float('manner_rating')->change();
            $table->float('time_rating')->change();
            $table->float('rating')->change();
        });
        Schema::table('clinics', function (Blueprint $table) {
            $table->float('clinic_rating')->change();
            $table->float('discipline_rating')->change();
            $table->float('comfort_rating')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->unsignedInteger('attent_rating')->change();
            $table->unsignedInteger('manner_rating')->change();
            $table->unsignedInteger('time_rating')->change();
            $table->unsignedInteger('rating')->change();
        });
        Schema::table('clinics', function (Blueprint $table) {
            $table->unsignedInteger('clinic_rating')->change();
            $table->unsignedInteger('discipline_rating')->change();
            $table->unsignedInteger('comfort_rating')->change();
        });
    }
}
