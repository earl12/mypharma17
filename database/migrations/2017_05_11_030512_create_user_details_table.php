<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('user_id')->unsigned();
           $table->foreign('user_id')
           ->references('id')
           ->on('users')
           ->onDelete('cascade');
           $table->string('first_name',50);
           $table->string('middle_name',50);
           $table->string('last_name',50);
           $table->string('gender',6);
           $table->string('dob',10);
           $table->string('placeOfBirth',75);
           $table->string('description',75);
           $table->string('city',30);
           $table->string('barangay',25);
           $table->string('street_name',50);
           $table->string('house_number',20);
           $table->string('personal_email');
           $table->string('telephone')->nullable();
           $table->string('mobile');
           $table->string('file_name');
           $table->string('file_path');
           $table->string('file_size',10);
           $table->string('file_mime',50);
           $table->timestamps();
       });
    }

    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
