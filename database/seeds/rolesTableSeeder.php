<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class rolesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            'name' => 'admin',
            'displayname' => 'Admin',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'manager',
            'displayname' => 'Band Manager',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'alumnus',
            'displayname' => 'Alumnus Musician',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'composer',
            'displayname' => 'Composer',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'eventcontact',
            'displayname' => 'Event Contact',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'groupie',
            'displayname' => 'Groupie',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'musician',
            'displayname' => 'Musician',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'publisher',
            'displayname' => 'Publisher',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'sub',
            'displayname' => 'Substitute Musician',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'supplier',
            'displayname' => 'Supplier',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'venuecontact',
            'displayname' => 'Venue Contact',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'guest',
            'displayname' => 'Guest',
            'updateuserid' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

}
