<?php 
	class UserTableSeeder extends Seeder {
		public function run() {
			DB::table('users')->delete();

			User::create(array(
				'username' => 'admin',
				'password' => Hash::make('pass'),
				'employee_id' => '0',
				'name' => 'Admin',
				'mobile' => '000000000',
				'email' => 'admin@mailinator.com',
				'sex' => 'other',
				'date_of_birth' => '10-10-1910',
				'group' => 'A',
				'entry_into_service' => '10-10-1910',
				'superannuation_date' => '10-10-2100',
				'total_earned_leave' => 0,
				'total_half_pay_leave' => 0,
				'user_type' => 'admin',
				'remember_token' => ''
			));
		}
	}
?>