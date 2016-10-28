<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class skillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert([
            'name' => 'Superior',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('skills')->insert([
            'name' => 'Good',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('skills')->insert([
            'name' => 'Average',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('skills')->insert([
            'name' => 'Fair',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('skills')->insert([
            'name' => 'Beginner',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    }
}
