<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Test Reporter',
            'email' => 'test.reporter@bugtrack.com',
            'login' => 'test.reporter',
            'password' => bcrypt('test.reporter'),
            'role' => User::ROLE_REPORTER
        ]);

        DB::table('users')->insert([
            'name' => 'Test Engineer',
            'email' => 'test.engineer@bugtrack.com',
            'login' => 'test.engineer',
            'password' => bcrypt('test.engineer'),
            'role' => User::ROLE_ENGINEER
        ]);
    }
}
