<?php

use Illuminate\Database\Seeder;

class AgentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'advertiser_id' => null, 'first_name' => 'first_name', 'last_name' => 'last_name', 'email' => 'example@example.com', 'skype' => 'skype', 'address' => 'address', 'photo' => null, 'about' => null, 'created_by_id' => 2, 'created_by_team_id' => null, 'notes' => null],
            ['id' => 2, 'advertiser_id' => null, 'first_name' => 'Cordelia', 'last_name' => 'Manning', 'email' => 'fokcewo@host.test', 'skype' => 'liwwave', 'address' => '886 Amcur View', 'photo' => null, 'about' => null, 'created_by_id' => 2, 'created_by_team_id' => null, 'notes' => null],

        ];

        foreach ($items as $item) {
            \App\Agent::create($item);
        }
    }
}
