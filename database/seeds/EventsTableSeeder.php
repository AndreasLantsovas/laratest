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
                'country_id' => '1',
        		'name' => 'FREQS OF NATURE',
                'alias' => 'freqs-of-nature',
				'details' => 'Formed by ex-Full Moon crew, Freqs has billed themselves a experimental arts and music festival. Although not strictly a psytrance festival, this will definitely provide a different experience from the other German festivals encouraging artists of all mediums in exploring the depths of their imagination, to boldly produce work that is beautiful, peculiar and thought-provoking.',
                'start_date' => '04-07-2018',
				'end_date' => '09-07-2018'
                
			],

			[
                'country_id' => '2',
        		'name' => 'VOOV EXPERIENCE',
                'alias' => 'voov-experience',
				'details' => 'VooV is one of the oldest and biggest of the German parties dating back to 1992, with attendance numbers ranging from 10 to 20 thousand. After a slight break from the scene, the annual festival returned in 2014.',
				'start_date' => '20-07-2018',
				'end_date' => '23-07-2018'
			],

            [
                
                'country_id' => '3',
                'name' => 'SPIRIT BASE FESTIVAL',
                'alias' => 'spirit-base-festival',
                'details' => 'We would like to welcome you back to the 2nd edition of Revision Festival. We can assume that if you re already here, is probably because you are as excited as we are about the next edition! Your comments, and suggestions from the past year edition have been taken into consideration and we have put our effort into improving even more for Revision 2018, so you can expect additional changes and surprises in order to present you something even more special than last year.',
                'start_date' => '14-07-2018',
                'end_date' => '17-07-2018'
            ]

			)
		);
    }
}
