<?php

use Illuminate\Database\Seeder;

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
            'sufix' => '',
            'userType' => 2,
            'email' => 'some.one@someplace.org',
            'url' => '',
            'addres1' => '',
            'addres2' => '',
            'city' => '',
            'state' => '',
            'zipcode' => '',
            'phone1' => '',
            'phone2' => '',
            'companyname' => '',
            'title' => '',
            'note' => '',
            'location' => '',
            'activated' => '',
            'terminated' => '',
            'forcepwchange' => 0,
            'password' => '$2y$10$pFN6emBmHzqtXX8.4rCbR.tmqdluHYyX/RVwNk6afWh9dkGHz/8zK',
            'remember_token' => 'GBo3QWhXfLQutOPBdPqPdHGJPAYz9PVAofxTadLUcF4PkjjokVLDcAYJSQbf',
            'created_at' => '2016-05-16 21:20:23', 'updated_at' => '2016-05-16 21:20:37'
        ]);
        DB::table('users')->insert([
            'username' => 'pscheid',
            'prefix' => '',
            'firstname' => 'Paul',
            'middlename' => 'Scheidemantel',
            'lastname' => '',
            'sufix' => '',
            'userType' => 2,
            'email' => 'paul.scheidemantel@gmail.com',
            'url' => '',
            'addres1' => '121 Hager Lane',
            'addres2' => '',
            'city' => 'Boxborough',
            'state' => 'MA',
            'zipcode' => '01719-1833',
            'phone1' => '',
            'phone2' => '',
            'companyname' => '',
            'title' => '',
            'note' => '',
            'location' => 'Boxborough',
            'activated' => '',
            'terminated' => '',
            'forcepwchange' => 0,
            'password' => '$2y$10$A7eTx6aMXVax0i76epbW4eOozLs6Gr2ij6ZZuLa90PVk.WTv/J7lO',
            'remember_token' => 'sjqX4nCCVsEQuRVCTcHGtmv0p5L9CZi76KzCWaFp3rSWDlSBRJo3Nb7mTRFV',
            'created_at' => '2016-05-16 21:20:23', 'updated_at' => '2016-05-16 21:20:37'
        ]);
    }

}
