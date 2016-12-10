<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class rightsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rights')->insert([
            'name' => 'create-user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'read-user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'update-user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'delete-user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('rights')->insert([
            'name' => 'create-song',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'read-song',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'update-song',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'delete-song',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('rights')->insert([
            'name' => 'create-role',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'read-role',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'update-role',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'delete-role',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('rights')->insert([
            'name' => 'create-style',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'read-style',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'update-style',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'delete-style',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('rights')->insert([
            'name' => 'create-tempo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'read-tempo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'update-tempo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'delete-tempo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
       DB::table('rights')->insert([
            'name' => 'create-contact',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'read-contact',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'update-contact',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'delete-contact',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
           
       DB::table('rights')->insert([
            'name' => 'create-group',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'read-group',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'update-group',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'delete-group',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
     
       DB::table('rights')->insert([
            'name' => 'create-instrument',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'read-instrument',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'update-instrument',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'delete-instrument',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
     
      DB::table('rights')->insert([
            'name' => 'create-skill',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'read-skill',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'update-skill',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'delete-skill',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
     
      DB::table('rights')->insert([
            'name' => 'create-settings',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'read-settings',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'update-settings',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('rights')->insert([
            'name' => 'delete-settings',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
   }

}
