<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class resourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert([
            'user_id' => 1,
            'instrument_id' => 10,
            'mgrskill'  => 5,
            'skill' => 1,
            'solo' => 0,
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('resources')->insert([
            'user_id' => 2,
            'instrument_id' => 10,
            'mgrskill'  => 5,
            'skill' => 2,
            'solo' => 1,
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

       DB::table('resources')->insert([
            'user_id' => 2,
            'instrument_id' => 5,
            'mgrskill'  => 3,
            'skill' => 5,
           'solo' => 0,
            'updateuserid' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         DB::table('resources')->insert([
            'user_id' => 2,
            'instrument_id' => 6,
            'mgrskill'  => 5,
            'skill' => 2,
           'solo' => 1,
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('resources')->insert([
            'user_id' => 3,
            'instrument_id' => 7,
            'mgrskill'  => 4,
            'skill' => 3,
           'solo' => 0,
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

     }
}
