<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_series', function (Blueprint $table) {
            $table->unsignedInteger('color_id');
            $table->foreign('color_id', 'color_id_fk_6883')->references('id')->on('colors')->onDelete('cascade');
            $table->unsignedInteger('series_id');
            $table->foreign('series_id', 'series_id_fk_6883')->references('id')->on('series')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brand_series', function (Blueprint $table) {
            //
        });
    }
}
