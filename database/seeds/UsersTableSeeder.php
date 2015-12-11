<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    const ROOT_EMAIL = 'root@bugtrack.catho.com.br';

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
            'password' => bcrypt('test.reporter'),
            'role' => User::ROLE_REPORTER
        ]);

        if ($this->rootExists()) {
            return;
        }

        DB::table('users')->insert([
            'name' => 'Root',
            'email' => self::ROOT_EMAIL,
            'password' => bcrypt('root'),
            'role' => User::ROLE_ENGINEER
        ]);
    }

    private function rootExists()
    {
        return (bool)DB::table('users')->select()
            ->where(['email' => self::ROOT_EMAIL])
            ->count();
    }
}
