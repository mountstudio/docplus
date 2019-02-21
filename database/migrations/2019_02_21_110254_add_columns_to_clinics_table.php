<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinics', function (Blueprint $table) {
            $table->unsignedInteger('clinic_rating')->after('phones');
            $table->unsignedInteger('comfort_rating')->after('clinic_rating');
            $table->unsignedInteger('discipline_rating')->after('comfort_rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clinics', function (Blueprint $table) {
            $table->dropColumn(['clinic_rating', 'comfort_rating', 'discipline_rating']);
        });
    }
}
