<?php

use Illuminate\Database\Seeder;

class CsoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'channel_server_id' => 1, 'cid_id' => 2, 'ocloud_a' => '127.0.0.1', 'ocp_a' => 8077, 'ocloud_b' => null, 'ocp_b' => null,],
            ['id' => 2, 'channel_server_id' => 1, 'cid_id' => 3, 'ocloud_a' => null, 'ocp_a' => null, 'ocloud_b' => '127.0.0.1', 'ocp_b' => '5664',],

        ];

        foreach ($items as $item) {
            \App\Cso::create($item);
        }
    }
}
