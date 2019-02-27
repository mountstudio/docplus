<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeoColumnsToAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinics', function (Blueprint $table) {
            $table->text('title')->nullable()->after('id');
            $table->text('keywords')->nullable()->after('title');
            $table->text('description')->nullable()->after('keywords');
        });
        Schema::table('doctors', function (Blueprint $table) {
            $table->text('title')->nullable()->after('id');
            $table->text('keywords')->nullable()->after('title');
            $table->text('description')->nullable()->after('keywords');
        });
        Schema::table('services', function (Blueprint $table) {
            $table->text('title')->nullable()->after('id');
            $table->text('keywords')->nullable()->after('title');
            $table->text('description')->nullable()->after('keywords');
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
            $table->dropColumn(['title', 'keywords', 'description']);
        });
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn(['title', 'keywords', 'description']);
        });
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['title', 'keywords', 'description']);
        });
    }
}
