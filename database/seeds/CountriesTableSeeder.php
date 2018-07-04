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
                'name' => 'Austria'
                
            ],

            [
                'name' => 'Belgium'
                
            ],

            [
                'name' => 'Bulgaria'
                
            ],

            [
                'name' => 'Croatia'
                
            ],

            [
                'name' => 'Cyprus'
                
            ],

        	[
        		'name' => 'Czech Republic'
                
			],

			[
        		'name' => 'Denmark'

			],

            [
                'name' => 'Finland'
            ],

            [
                'name' => 'France'
            ],

            [
                'name' => 'Georgia'
            ],

            [
                'name' => 'Germany'
            ],

            [
                'name' => 'Greece'
            ],

            [
                'name' => 'Hungary'
            ]


			)
		);
    }
}
