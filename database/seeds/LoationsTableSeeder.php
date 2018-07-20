<?php

use Illuminate\Database\Seeder;

class LoationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert(
        array (

            [
                'event_id' => '1',
                'formatted_address' => 'Turkey',
                'lat' => '41.5830591',
                'lng' => '28.1409683'                 
            ]

			)
		);
    }
}
