<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function(Blueprint $table) {
        $table->integer('role_id')->after('password')->unsigned();
        $table->foreign('role_id')->references('id')->on('roles');
        $table->string('scn')->nullable()->after('role_id');    
        $table->enum('status', ['1', '0'])->after('scn');    
      });
    }

    public function down()
    {
      Schema::dropIfExists('users');   
    }
  }
