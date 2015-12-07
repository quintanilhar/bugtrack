<?php

use Illuminate\Database\Seeder;

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
        if ($this->rootExists()) {
            return;
        }

        DB::table('users')->insert([
            'name' => 'Root',
            'email' => self::ROOT_EMAIL,
            'password' => bcrypt('root'),
        ]);
    }

    private function rootExists()
    {
        return (bool)DB::table('users')->select()
            ->where(['email' => self::ROOT_EMAIL])
            ->count();
    }
}
