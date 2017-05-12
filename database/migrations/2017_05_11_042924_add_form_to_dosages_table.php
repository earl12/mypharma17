<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class AddFormToDosagesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table ( 'dosages', function (Blueprint $table) {
			$table->string ( 'form' )->after ( 'dosage_name' );
		} );
	}
	public function down() {
		Schema::table ( 'dosages', function (Blueprint $table) {
			$table->dropColumn ( 'form' );
		} );
	}
}
