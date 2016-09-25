<?php

use Illuminate\Database\Seeder;

class musiclibrariesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('musiclibraries')->insert([
            'CATALOGNUM' => '1944',
            'TITLE' => 'Nice N\' Easy',
            'DESCRIPTION' => 'nothing of interest',
            'STYLEID' => 1,
            'COPYRIGHT' => NULL,
            'COMPOSER' => 'Sondhiem',
            'ARRANGER' => 'Martha Stewart',
            'LYRICIST' => 'Bob Dylan',
            'PUBLISHER' => 'Penguin',
            'PUBYEAR' => '1976-01-01',
            'PERFGRADE' => 2,
            'TRANSCRIPTION' => 0,
            'TEMPOID' => 1,
            'STDPLAYTIME' => '03:10:00',
            'EXTPLAYTIME' => NULL,
            'VOCAL' => NULL,
            'VOCALISTS' => 1,
            'VOICES' => 'voices_2',
            'INSTRUMENTATION' => 'Drums',
            'VCFI' => 0,
            'COMMARRANGEMENT' => 1,
            'PERFCOMMENTS' => 'stunk up the hall',
            'UPDATEUSERID' => 2,
            'created_at' => '2012-06-25 15:55:40',
            'updated_at' => '2012-06-25 15:55:40'
        ]);

        DB::table('musiclibraries')->insert([
            'CATALOGNUM' => '1723',
            'TITLE' => '720 in the Books',
            'DESCRIPTION' => 'This was my Mom\'s favorite song',
            'STYLEID' => 2,
            'COPYRIGHT' => NULL,
            'COMPOSER' => 'Woody Guthrie',
            'ARRANGER' => 'Fung Schwayt',
            'LYRICIST' => 'Gilbert',
            'PUBLISHER' => 'RCA',
            'PUBYEAR' => '2012-01-01',
            'PERFGRADE' => NULL,
            'TRANSCRIPTION' => 1,
            'TEMPOID' => 2,
            'STDPLAYTIME' => '03:33:00',
            'EXTPLAYTIME' => NULL,
            'VOCAL' => NULL,
            'VOCALISTS' => 0,
            'VOICES' => 'voices_3',
            'INSTRUMENTATION' => 'Digerydo',
            'VCFI' => NULL,
            'COMMARRANGEMENT' => 1,
            'PERFCOMMENTS' => 'Great rehearsal',
            'UPDATEUSERID' => 2,
            'created_at' => '2012-06-25 15:55:40',
            'updated_at' => '2012-06-25 15:55:40'
        ]);

        DB::table('musiclibraries')->insert([
            'CATALOGNUM' => '1282',
            'TITLE' => 'A Foggy Day',
            'DESCRIPTION' => 'Nothing of interest',
            'STYLEID' => 3,
            'COPYRIGHT' => 'Freestone Partners, LLC',
            'COMPOSER' => 'Arlo Guthrie',
            'ARRANGER' => 'Martha Stewart',
            'LYRICIST' => 'Bob Dylan',
            'PUBLISHER' => 'Apple',
            'PUBYEAR' => '2002-01-01',
            'PERFGRADE' => 4,
            'TRANSCRIPTION' => NULL,
            'TEMPOID' => 3,
            'STDPLAYTIME' => '07:52:00',
            'EXTPLAYTIME' => '01:41:52',
            'VOCAL' => NULL,
            'VOCALISTS' => 9,
            'VOICES' => 'voices_1',
            'INSTRUMENTATION' => 'recorder',
            'VCFI' => '1',
            'COMMARRANGEMENT' => NULL,
            'PERFCOMMENTS' => 'So, so',
            'UPDATEUSERID' => 2,
            'created_at' => '2012-07-10 19:46:49',
            'updated_at' => '2012-07-10 19:46:49'
        ]);

        DB::table('musiclibraries')->insert([
            'CATALOGNUM' => '1977',
            'TITLE' => 'A String of Pearls',
            'DESCRIPTION' => 'Only good thing out of WW II',
            'STYLEID' => 4,
            'COPYRIGHT' => NULL,
            'COMPOSER' => 'Lerner&Lowe',
            'ARRANGER' => 'Gilbert',
            'LYRICIST' => 'Gilbert',
            'PUBLISHER' => 'Gutenberg',
            'PUBYEAR' => '2015-01-01',
            'PERFGRADE' => 3,
            'TRANSCRIPTION' => 1,
            'TEMPOID' => 4,
            'STDPLAYTIME' => '2:22:00',
            'EXTPLAYTIME' => NULL,
            'VOCAL' => 0,
            'VOCALISTS' => 33,
            'VOICES' => 'voices_2',
            'INSTRUMENTATION' => 'Carrilon',
            'VCFI' => '-99',
            'COMMARRANGEMENT' => 1,
            'PERFCOMMENTS' => 'Great rehearsal',
            'UPDATEUSERID' => 2,
            'created_at' => '2012-07-11 13:30:45',
            'updated_at' => '2012-07-11 13:30:45'
        ]);
    }

}
