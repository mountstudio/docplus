<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeoColumnsToSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('specs', function (Blueprint $table) {
            Schema::table('specs', function (Blueprint $table) {
                $table->text('title')->nullable()->after('id');
                $table->text('keywords')->nullable()->after('title');
                $table->text('description')->nullable()->after('keywords');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specs', function (Blueprint $table) {
            $table->dropColumn('title', 'keywords', 'description');
        });
    }
}
