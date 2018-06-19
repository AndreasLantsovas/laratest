<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEventModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events',function($table){
            $table->tinyInteger('published')->default('0');
            $table->timestamps();            
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
            $table->dropColumn('published');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });       //
    }
}
