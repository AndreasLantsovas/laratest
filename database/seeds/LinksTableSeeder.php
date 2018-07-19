<?php

use Illuminate\Database\Seeder;
use App\Link;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->insert(
        array (

            [
                'event_id' => '1',
                'link' => 'https://www.facebook.com/events/1435042793273119',
                'description' => 'facebook'
                
            ],

            [
                'event_id' => '1',
                'link' => 'https://www.youtube.com/embed/27MVPoMNK5c',
                'description' => 'video'
                
            ],

            
            [
                'event_id' => '2',
                'link' => 'https://www.facebook.com/events/265508263941787',
                'description' => 'facebook'
                
            ],

            [
                'event_id' => '2',
                'link' => 'https://www.youtube.com/embed/3amdd0gRMRk',
                'description' => 'video'
                
            ],

            [
                'event_id' => '2',
                'link' => 'https://shop3.ticketscript.com/channel/html/get-products/rid/3UB5UBX3/eid/360878/all-products/language/en',
                'description' => 'tickets'
                
            ],

            [
                'event_id' => '3',
                'link' => 'https://www.facebook.com/SpiritBaseFestival',
                'description' => 'facebook'
                
            ],

            [
                'event_id' => '3',
                'link' => 'https://www.facebook.com/SpiritBaseFestival',
                'description' => 'video'
                
            ],


			)
		);
    }
}

