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
            'username' => 'admin',
            'prefix' => '',
            'firstname' => '',
            'middlename' => '',
            'lastname' => '',
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
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1
        ]);

        DB::table('contacts')->insert([
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23A',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'admin.some.one@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('contact_user')->insert([
            'contact_id' => 1,
            'user_id' => 1,
            'role_id' => '1'
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
            'password' => '$2y$10$A7eTx6aMXVax0i76epbW4eOozLs6Gr2ij6ZZuLa90PVk.WTv/J7lO',
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 2
        ]);

       DB::table('contacts')->insert([
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23B',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'pscheid.some.one@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('contact_user')->insert([
            'contact_id' => 2,
            'user_id' => 2,
            'role_id' => '1'
        ]);
        
        DB::table('users')->insert([
            'username' => 'gjetson',
            'prefix' => '',
            'firstname' => 'George',
            'middlename' => '',
            'lastname' => 'Jetson',
            'suffix' => '',
            'currentRole' => 4,
            'company' => '',
            'title' => '',
            'note' => '',
            'location' => '',
            'activated' => '',
            'terminated' => '',
            'loginpermitted' => 1,
            'forcepwchange' => 1,
            'password' => '$2y$10$3IlSeWxAnNVQ102RM7uK8u9266DVj7sBH0tsHofKLbgWWDN0WCxSC',
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => 3,
            'user_id' => 3
        ]);

       DB::table('contacts')->insert([
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23C',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'pscheid.some.one@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('contact_user')->insert([
            'contact_id' => 3,
            'user_id' => 3,
            'role_id' => '3'
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
            'password' => '',
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => 12,
            'user_id' => 4
        ]);

       DB::table('contacts')->insert([
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23D',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'pscheid.some.one@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('contact_user')->insert([
            'contact_id' => 4,
            'user_id' => 4,
            'role_id' => '12'
        ]);
       
    }

}
