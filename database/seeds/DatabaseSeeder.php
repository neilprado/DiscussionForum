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

        DB::table('relatives')->insert([ #1
            'user_id' => 1,
            'name' => 'William I',
            'birth_year' => 1028,
            'death_year' => 1087,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #2
            'user_id' => 1,
            'name' => 'Matilda of Flanders',
            'birth_year' => 1031,
            'death_year' => 1083,
            'husband_relative_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #3
            'user_id' => 1,
            'name' => 'Robert Curthose',
            'birth_year' => 1054,
            'death_year' => 1134,
            'mother_relative_id' => 2,
            'father_relative_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #4
            'user_id' => 1,
            'name' => 'William II',
            'birth_year' => 1056,
            'death_year' => 1100,
            'mother_relative_id' => 2,
            'father_relative_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #5
            'user_id' => 1,
            'name' => 'Henry I',
            'birth_year' => 1068,
            'death_year' => 1135,
            'mother_relative_id' => 2,
            'father_relative_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #6
            'user_id' => 1,
            'name' => 'Matilda of Scotland',
            'birth_year' => 1080,
            'death_year' => 1118,
            'husband_relative_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #7
            'user_id' => 1,
            'name' => 'Adelicia of Louvain',
            'birth_year' => 1103,
            'death_year' => 1151,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #8
            'user_id' => 1,
            'name' => 'Adela',
            'birth_year' => 1062,
            'death_year' => 1137,
            'mother_relative_id' => 2,
            'father_relative_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #9
            'user_id' => 1,
            'name' => 'Stephen Count of Blois',
            'birth_year' => 1045,
            'death_year' => 1112,
            'wife_relative_id' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #10
            'user_id' => 1,
            'name' => 'Geoffrey Plantagenet of Anjou',
            'birth_year' => 1113,
            'death_year' => 1151,
            'mother_relative_id' => 6,
            'father_relative_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #11
            'user_id' => 1,
            'name' => 'Henry V',
            'birth_year' => 1086,
            'death_year' => 1125,
            'mother_relative_id' => 5,
            'father_relative_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #12
            'user_id' => 1,
            'name' => 'Empress Matilda',
            'birth_year' => 1102,
            'death_year' => 1167,
            'mother_relative_id' => 5,
            'father_relative_id' => 6,
            'husband_relative_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #13
            'user_id' => 1,
            'name' => 'Henry II',
            'birth_year' => 1133,
            'death_year' => 1189,
            'mother_relative_id' => 12,
            'father_relative_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #14
            'user_id' => 1,
            'name' => 'Eleanor of Aquitaine',
            'birth_year' => 1122,
            'death_year' => 1204,
            'husband_relative_id' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #15
            'user_id' => 1,
            'name' => 'Richard I, Lionheart',
            'birth_year' => 1157,
            'death_year' => 1199,
            'mother_relative_id' => 14,
            'father_relative_id' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #16
            'user_id' => 1,
            'name' => 'Berengaria of Navarre',
            'birth_year' => 1165,
            'death_year' => 1230,
            'husband_relative_id' => 15,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #17
            'user_id' => 1,
            'name' => 'John',
            'birth_year' => 1166,
            'death_year' => 1216,
            'mother_relative_id' => 14,
            'father_relative_id' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #18
            'user_id' => 1,
            'name' => 'Isabella of Angouleme',
            'birth_year' => 1188,
            'death_year' => 1246,
            'husband_relative_id' => 17,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relatives')->insert([ #19
            'user_id' => 1,
            'name' => 'Henry III',
            'birth_year' => 1207,
            'death_year' => 1272,
            'mother_relative_id' => 18,
            'father_relative_id' => 17,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
