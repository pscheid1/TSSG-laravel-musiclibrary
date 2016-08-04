<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class userTypesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userTypes')->insert([
            'name' => 'superadmin',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('userTypes')->insert([
            'name' => 'admin',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('userTypes')->insert([
            'name' => 'manager',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('userTypes')->insert([
            'name' => 'user',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('userTypes')->insert([
            'name' => 'viewer',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
    }

}
