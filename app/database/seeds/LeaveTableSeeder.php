<?php 
	class LeaveTableSeeder extends Seeder {
		public function run() {
			DB::table('leave')->delete();

			$leaves = [
				['type' => 'Earned Leave',
				'max_allowed' => 300],
				['type' => 'Half Pay Leave',
				'max_allowed' => 2000],
				['type' => 'Maternity Leave',
				'max_allowed' => 180]
			];
			
			DB::table('leave')->insert($leaves);
		}
	}
?>