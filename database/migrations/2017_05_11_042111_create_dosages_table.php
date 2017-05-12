<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('dosages', function (Blueprint $table) {
        $table->increments('id');
        $table->string('dosage_name');
        $table->integer('medicine_id')->unsigned();
        $table->foreign('medicine_id')
        ->references('id')
        ->on('medicines')
        ->onDelete('restrict');  
        $table->float('price');
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
        Schema::drop('dosages');
    }
}
