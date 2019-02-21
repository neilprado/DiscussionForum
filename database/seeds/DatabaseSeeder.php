<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'Neil',
            'email' => 'neil@neil.com',
            'password' => bcrypt('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Luana',
            'email' => 'luana@luana.com',
            'password' => bcrypt('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Normandy House Family Tree',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Windsor House Family Tree',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('themes')->insert([
            'name' => 'Carolingian House Family Tree',
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'Richard I, Lionheart has illegitimate sons?',
            'message' => 'I saw Richard I had two illegitimate sons, is this true?',
            'theme_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'Who was John from the house of Normandy?',
            'message' => 'Why John, brother of Richard I, Lionheart was your successor?',
            'theme_id' => 1,
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'Who was the greatest carolingian king?',
            'message' => 'Who was the greatest carolingian king? Carles Martel or Carlemagne?',
            'theme_id' => 3,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'Was Windsor the greatest british house?',
            'message' => 'I think Windsor is the greatest house of british kings since unification of Britannia',
            'theme_id' => 2,
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
