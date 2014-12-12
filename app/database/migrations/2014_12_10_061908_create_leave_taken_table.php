<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveTakenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leave_taken',function(Blueprint $table){
			$table->increments('id');
			$table->integer('user_id')->length(10);
			$table->integer('leave_id')->length(10);
			$table->date('leave_from');
			$table->date('leave_to');
			$table->integer('no_of_days')->length(3);
			$table->enum('status',['Submitted','Approved','Rejected']);
			$table->string('remark',255);
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
		Schema::drop('leave_taken');
	}

}
