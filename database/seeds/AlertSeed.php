<?php

use Illuminate\Database\Seeder;

class AlertSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'title' => 'Test Alert', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
', 'alert_type'   => 'alert-danger'],

        ];

        foreach ($items as $item) {
            \App\Alert::create($item);
        }
    }
}
