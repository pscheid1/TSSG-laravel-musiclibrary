<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class stylesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('styles')->insert([
            'DESCRIPTION' => 'Classical',
            'UPDATEUSERID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('styles')->insert([
            'DESCRIPTION' => 'Swing',
            'UPDATEUSERID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('styles')->insert([
            'DESCRIPTION' => 'Scottish traditional',
            'UPDATEUSERID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('styles')->insert([
            'DESCRIPTION' => 'Rock',
            'UPDATEUSERID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

}
