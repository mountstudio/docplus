<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArrayRatingsToFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->text('ratings')->after('comment');
            $table->dropColumn(['attent_rating', 'manner_rating', 'time_rating']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->dropColumn('ratings');
            $table->unsignedInteger('attent_rating')->after('comment');
            $table->unsignedInteger('manner_rating')->after('attent_rating');
            $table->unsignedInteger('time_rating')->after('manner_rating');
        });
    }
}
