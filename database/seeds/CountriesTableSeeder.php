<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert(
        array (
        	[
        		'name' => 'Italy'
                
			],

			[
        		'name' => 'Russia'

			],

            [
                'name' => 'Spain'
            ]

			)
		);
    }
}
