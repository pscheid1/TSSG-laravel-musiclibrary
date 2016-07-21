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
            'UPDATEUSERID' => 2003431,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('styles')->insert([
            'DESCRIPTION' => 'Swing',
            'UPDATEUSERID' => 2003431,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('styles')->insert([
            'DESCRIPTION' => 'Scottish traditionai',
            'UPDATEUSERID' => 2003431,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('styles')->insert([
            'DESCRIPTION' => 'Rock',
            'UPDATEUSERID' => 2003431,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

}
