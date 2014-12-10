<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function(Blueprint $table){
			$table->increments('id');
			$table->string('username',15);
			$table->string('password',64);
			$table->string('employee_id',20);
			$table->string('name',50);
			$table->string('mobile',10);
			$table->string('email',70);
			$table->enum('sex',['male','female','other']);
			$table->date('date_of_birth');
			$table->enum('group',['A','B','C','D']);
			$table->date('entry_into_service');
			$table->date('superannuation_date');
			$table->integer('total_earned_leave')->length(3);
			$table->integer('total_half_pay_leave')->length(3);
			$table->enum('user_type',['admin','employee']);
			$table->string('remember_token');
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
		Schema::drop('users');
	}

}

