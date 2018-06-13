<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert(
        array (
        	[
        		'name' => 'FREQS OF NATURE',
				'details' => 'Formed by ex-Full Moon crew, Freqs has billed themselves a experimental arts and music festival. Although not strictly a psytrance festival, this will definitely provide a different experience from the other German festivals encouraging artists of all mediums in exploring the depths of their imagination, to boldly produce work that is beautiful, peculiar and thought-provoking.',
				'start_date' => '04-07-2018',
				'end_date' => '09-07-2018'
			],

			[
        		'name' => 'VOOV EXPERIENCE',
				'details' => 'VooV is one of the oldest and biggest of the German parties dating back to 1992, with attendance numbers ranging from 10 to 20 thousand. After a slight break from the scene, the annual festival returned in 2014. ',
				'start_date' => '20-07-2018',
				'end_date' => '23-07-2018'
			]

			)
		);
    }
}
