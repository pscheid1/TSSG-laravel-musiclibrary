<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class usersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'administrator',
            'prefix' => '',
            'firstname' => 'Author',
            'middlename' => 'Adam',
            'lastname' => 'Admin',
            'suffix' => '',
            'currentRole' => 1,
            'company' => '',
            'title' => '',
            'note' => '',
            'location' => '',
            'activated' => '',
            'terminated' => '',
            'loginpermitted' => 1,
            'forcepwchange' => 0,
            'password' => '$2y$10$pFN6emBmHzqtXX8.4rCbR.tmqdluHYyX/RVwNk6afWh9dkGHz/8zK',
            'remember_token' => '',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('contacts')->insert([
            'role_id' => 1,
            'user_id' => 1,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23A',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'admin.some.one@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
            'contact_id' => 1
        ]);

        DB::table('users')->insert([
            'username' => 'pscheid',
            'prefix' => '',
            'firstname' => 'Paul',
            'middlename' => '',
            'lastname' => 'Scheidemantel',
            'suffix' => '',
            'currentRole' => 2,
            'company' => '',
            'title' => '',
            'note' => '',
            'location' => '',
            'activated' => '',
            'terminated' => '',
            'loginpermitted' => 1,
            'forcepwchange' => 1,
            'password' => '$10$bPFMI3R23Mtc4AR/ocdWu.o6cNmIJjFVEgC1k54PsLb18MvKzcRyu',
            'remember_token' => '',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('contacts')->insert([
            'role_id' => 2,
            'user_id' => 2,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23B',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'pscheid.some.one@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 2,
            'contact_id' => 2
        ]);

        DB::table('users')->insert([
            'username' => 'gjetson',
            'prefix' => '',
            'firstname' => 'George',
            'middlename' => '',
            'lastname' => 'Jetson',
            'suffix' => '',
            'currentRole' => 7,
            'company' => '',
            'title' => '',
            'note' => '',
            'location' => '',
            'activated' => '',
            'terminated' => '',
            'loginpermitted' => 1,
            'forcepwchange' => 1,
            'password' => '$2y$10$sgteGqEh.32KCI8T6lJwS.Z.F3U0Cb/fSGbfj8mFTpMYcbYQDyEf.',
            'remember_token' => '',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('contacts')->insert([
            'role_id' => 7,
            'user_id' => 3,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23C',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'pscheid.some.one@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => 7,
            'user_id' => 3,
            'contact_id' => 3
        ]);

        DB::table('users')->insert([
            'username' => 'casper',
            'prefix' => '',
            'firstname' => 'Casper',
            'middlename' => '',
            'lastname' => 'Ghost',
            'suffix' => '',
            'currentRole' => 12,
            'company' => '',
            'title' => '',
            'note' => '',
            'location' => '',
            'activated' => '',
            'terminated' => '',
            'loginpermitted' => 1,
            'forcepwchange' => 0,
            'password' => '$2y$10$640JSnyZYUEi9fws7uen/e1JsZzEVuVaSRLk.c5nxaRmKJvleXsmu',
            'remember_token' => '',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('contacts')->insert([
            'role_id' => 12,
            'user_id' => 4,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23D',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'pscheid.some.one@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => '12',
            'user_id' => 4,
            'contact_id' => 4,
        ]);
    }

}
