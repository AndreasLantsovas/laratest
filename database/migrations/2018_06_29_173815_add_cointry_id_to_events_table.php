<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCointryIdToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events',function($table){
        //    $table->Integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
             $table->Integer('country_id')->unsigned();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events',function (Blueprint $table){
            $table->dropForeign(['country_id']);
            $table->dropColumn('country_id');

        }); 
    }
}
