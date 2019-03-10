<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceColumnToClinicServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinic_service', function (Blueprint $table) {
            $table->integer('service_price')->nullable()->after('service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clinic_service', function (Blueprint $table) {
            $table->dropColumn('service_price');
        });
    }
}
