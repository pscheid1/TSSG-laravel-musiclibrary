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
            'instrument' => 10,
            'mgrskill'  => 5,
            'skill' => 1,
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


    }
}
