<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series_size', function (Blueprint $table) {
            $table->unsignedInteger('size_id');
            $table->foreign('size_id', 'size_id_fk_6883')->references('id')->on('sizes')->onDelete('cascade');
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
        Schema::table('series_size', function (Blueprint $table) {
            //
        });
    }
}
