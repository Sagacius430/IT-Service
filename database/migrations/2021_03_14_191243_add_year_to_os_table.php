<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddYearToOsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('os', function (Blueprint $table) {
            $table->smallInteger('year');
            $table->smallInteger('month');
            $table->smallInteger('day');
            $table->smallInteger('hour');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('os', function (Blueprint $table) {
            $table->drop('year');
            $table->drop('month');
            $table->drop('day');
            $table->drop('hour');
        });
    }
}
