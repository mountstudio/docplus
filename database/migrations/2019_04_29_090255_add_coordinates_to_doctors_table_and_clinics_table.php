<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoordinatesToDoctorsTableAndClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('latitude')->nullable()->after('home');
            $table->string('longtitude')->nullable()->after('latitude');
        });
        Schema::table('clinics', function (Blueprint $table) {
            $table->string('latitude')->nullable()->after('user_id');
            $table->string('longtitude')->nullable()->after('latitude');
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
            $table->dropColumn(['latitude', 'longtitude']);
        });
        Schema::table('clinics', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longtitude']);
        });
    }
}
