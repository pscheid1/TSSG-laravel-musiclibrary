<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class instrumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instruments')->insert([
            'name' => 'Alto Saxaphone',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Tenor Saxaphone',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Baritone Saxaphone',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Flute',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Piccolo',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Trumpet',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Flugelhorn',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Trombone',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Bass Trombone',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Piano',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Electric Base',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Acoustic Bass',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Acoustic Guitar',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Electric Guitar',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Drum Kit',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('instruments')->insert([
            'name' => 'Vocals',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    }
}
