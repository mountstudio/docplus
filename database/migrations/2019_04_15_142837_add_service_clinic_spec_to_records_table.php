<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServiceClinicSpecToRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->unsignedInteger('spec_id')->nullable()->after('clinic_id');
            $table->unsignedInteger('service_id')->nullable()->after('spec_id');
            $table->unsignedInteger('doctor_clinic_id')->nullable()->after('service_id');
            $table->string('lastname')->nullable()->after('service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->dropColumn(['spec_id', 'service_id', 'doctor_clinic_id', 'lastname']);
        });
    }
}
