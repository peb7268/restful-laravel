<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('UserTableSeeder');
                $this->command->info('User table seeded!');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $users = array([
        'username' => 'peb7268',
        'password' => Hash::make('testpass')
        ],
        [
        'username' => 'seconduser',
        'password' => Hash::make('second_password')
        ],
        [
        'username' => 'thirdduser',
        'password' => Hash::make('third_password')
        ],
        [
        'username' => 'fourthuser',
        'password' => Hash::make('fourth_password')
        ],
        [
        'username' => 'fifthuser',
        'password' => Hash::make('fifth_password')
        ]);
        foreach($users as $user){
                User::create(array(
                        'username' => $user['username'],
                        'password' => $user['password'],
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime
                ));
        }
    }
}