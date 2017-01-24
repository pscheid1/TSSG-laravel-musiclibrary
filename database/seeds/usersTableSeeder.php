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
            'firstname' => 'Adam',
            'middlename' => '',
            'lastname' => 'Ant',
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
            'username' => 'billygoat',
            'prefix' => '',
            'firstname' => 'Billy',
            'middlename' => '',
            'lastname' => 'Goat',
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
            'phone1' => '777-888-1234',
            'phone2' => '',
            'email' => 'bgoat.some.one@someplace.org',
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
            'email' => 'gghost@someplace.org',
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

        DB::table('users')->insert([
            'username' => 'daffyduck',
            'prefix' => '',
            'firstname' => 'Daffy',
            'middlename' => '',
            'lastname' => 'Duck',
            'suffix' => '',
            'currentRole' => 7,
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
            'role_id' => 7,
            'user_id' => 5,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23D',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'dduck@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => '7',
            'user_id' => 5,
            'contact_id' => 5,
        ]);

        DB::table('users')->insert([
            'username' => 'testuser1',
            'prefix' => '',
            'firstname' => 'Test1',
            'middlename' => '',
            'lastname' => 'User1',
            'suffix' => '',
            'currentRole' => 7,
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
            'role_id' => 7,
            'user_id' => 6,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23D',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'tuser1@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => '7',
            'user_id' => 6,
            'contact_id' => 6,
        ]);
 
        DB::table('users')->insert([
            'username' => 'testuser2',
            'prefix' => '',
            'firstname' => 'Test2',
            'middlename' => '',
            'lastname' => 'User2',
            'suffix' => '',
            'currentRole' => 7,
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
            'role_id' => 7,
            'user_id' => 7,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23D',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'tuser2@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => '7',
            'user_id' => 7,
            'contact_id' => 7,
        ]);

        DB::table('users')->insert([
            'username' => 'testuser3',
            'prefix' => '',
            'firstname' => 'Test3',
            'middlename' => '',
            'lastname' => 'User3',
            'suffix' => '',
            'currentRole' => 7,
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
            'role_id' => 7,
            'user_id' => 8,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23D',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'tuser3@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => '7',
            'user_id' => 8,
            'contact_id' => 8,
        ]);

        DB::table('users')->insert([
            'username' => 'testuser4',
            'prefix' => '',
            'firstname' => 'Test4',
            'middlename' => '',
            'lastname' => 'User4',
            'suffix' => '',
            'currentRole' => 7,
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
            'role_id' => 7,
            'user_id' => 9,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23D',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'tuser4@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => '7',
            'user_id' => 9,
            'contact_id' => 9,
        ]);

        DB::table('users')->insert([
            'username' => 'testuser5',
            'prefix' => '',
            'firstname' => 'Test5',
            'middlename' => '',
            'lastname' => 'User5',
            'suffix' => '',
            'currentRole' => 7,
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
            'role_id' => 7,
            'user_id' => 10,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23D',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'tuser5@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => '7',
            'user_id' => 10,
            'contact_id' => 10,
        ]);

        DB::table('users')->insert([
            'username' => 'testuser6',
            'prefix' => '',
            'firstname' => 'Test6',
            'middlename' => '',
            'lastname' => 'User6',
            'suffix' => '',
            'currentRole' => 7,
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
            'role_id' => 7,
            'user_id' => 11,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23D',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'tuser6@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => '7',
            'user_id' => 11,
            'contact_id' => 11,
        ]);

        DB::table('users')->insert([
            'username' => 'testuser7',
            'prefix' => '',
            'firstname' => 'Test7',
            'middlename' => '',
            'lastname' => 'User7',
            'suffix' => '',
            'currentRole' => 7,
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
            'role_id' => 7,
            'user_id' => 12,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23D',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'tuser7@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => '7',
            'user_id' => 12,
            'contact_id' => 12,
        ]);

        DB::table('users')->insert([
            'username' => 'testuser8',
            'prefix' => '',
            'firstname' => 'Test8',
            'middlename' => '',
            'lastname' => 'User8',
            'suffix' => '',
            'currentRole' => 7,
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
            'role_id' => 7,
            'user_id' => 13,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23D',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'tuser8@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => '7',
            'user_id' => 13,
            'contact_id' => 13,
        ]);

        DB::table('users')->insert([
            'username' => 'testuser9',
            'prefix' => '',
            'firstname' => 'Test9',
            'middlename' => '',
            'lastname' => 'User9',
            'suffix' => '',
            'currentRole' => 7,
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
            'role_id' => 7,
            'user_id' => 14,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23D',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'tuser9@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => '7',
            'user_id' => 14,
            'contact_id' => 14,
        ]);

        DB::table('users')->insert([
            'username' => 'testuser10',
            'prefix' => '',
            'firstname' => 'Test10',
            'middlename' => '',
            'lastname' => 'User10',
            'suffix' => '',
            'currentRole' => 7,
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
            'role_id' => 7,
            'user_id' => 15,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23D',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'tuser10@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => '7',
            'user_id' => 15,
            'contact_id' => 15
        ]);

        DB::table('users')->insert([
            'username' => 'testuser11',
            'prefix' => '',
            'firstname' => 'Test11',
            'middlename' => '',
            'lastname' => 'User11',
            'suffix' => '',
            'currentRole' => 7,
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
            'role_id' => 7,
            'user_id' => 16,
            'address1' => '123 Filler street',
            'address2' => 'Apt. 23D',
            'city' => 'Timbuktu',
            'state' => 'ME',
            'zipcode' => '12345-1934',
            'phone1' => '999-888-1234',
            'phone2' => '',
            'email' => 'tuser11@someplace.org',
            'weburl' => 'whc.unesco.org/en/list/119',
            'updateuserid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => '7',
            'user_id' => 16,
            'contact_id' => 16,
        ]);
   }

}
