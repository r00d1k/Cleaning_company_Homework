<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCleanerInCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaner_in_cities', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('cleaner_id');
            $table->integer('city_id');
            $table->timestamps();
            $table->unique(['cleaner_id', 'city_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cleaner_in_cities');
    }
}
