<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Luana',
            'email' => 'rodrigues.93@live.com',
            'password' => bcrypt('fourier'),
        ]);
    }
}
