<?php

use Illuminate\Database\Seeder;

class PhoneSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'phone_number' => '  555 555 5555', 'advertiser_id' => null, 'agent_id' => null, 'advertisers_id' => 1],

        ];

        foreach ($items as $item) {
            \App\Phone::create($item);
        }
    }
}
