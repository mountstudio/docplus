<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRatingsToDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->double('attent_rating')->nullable()->after('discount');
            $table->double('manner_rating')->nullable()->after('attent_rating');
            $table->double('time_rating')->nullable()->after('manner_rating');
            $table->double('rating')->nullable()->after('time_rating');
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
            $table->dropColumn(['attent_rating', 'manner_rating', 'time_rating','rating']);
        });
    }
}
