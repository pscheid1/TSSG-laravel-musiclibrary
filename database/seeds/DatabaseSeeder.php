<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(rolesTableSeeder::class);
        $this->call(rightsTableSeeder::class);
        $this->call(usersTableSeeder::class);
        $this->call(stylesTableSeeder::class);
        $this->call(temposTableSeeder::class);
        $this->call(musiclibrariesTableSeeder::class);
        $this->call(skillsTableSeeder::class);
        $this->call(instrumentsTableSeeder::class);
        $this->call(resourcesTableSeeder::class);        
    }

}
