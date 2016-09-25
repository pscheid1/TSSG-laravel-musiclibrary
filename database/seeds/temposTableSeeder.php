<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class temposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tempos')->insert([
            'DESCRIPTION' => 'Slow',
            'UPDATEUSERID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tempos')->insert([
            'DESCRIPTION' => 'Glacial',
            'UPDATEUSERID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tempos')->insert([
            'DESCRIPTION' => 'Supersonic',
            'UPDATEUSERID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tempos')->insert([
            'DESCRIPTION' => 'Fast',
            'UPDATEUSERID' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    }
}
