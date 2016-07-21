<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'pscheid',
            'firstname' => 'Paul',
            'lastname' => 'Scheidemantel',
            'email' => 'paul.scheidemantel@gmail.com',
            'location' => 'Boxborough',
            'password' => '$2y$10$A7eTx6aMXVax0i76epbW4eOozLs6Gr2ij6ZZuLa90PVk.WTv/J7lO',
            'remember_token' => 'sjqX4nCCVsEQuRVCTcHGtmv0p5L9CZi76KzCWaFp3rSWDlSBRJo3Nb7mTRFV',
            'created_at' => '2016-05-16 21:20:23', 'updated_at' => '2016-05-16 21:20:37'
            ]);
    }

}
