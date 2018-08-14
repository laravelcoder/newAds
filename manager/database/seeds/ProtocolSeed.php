<?php

use Illuminate\Database\Seeder;

class ProtocolSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'protocol' => 'UDP', 'real_name' => 'User Datagram Protocol',],
            ['id' => 2, 'protocol' => 'RTP', 'real_name' => 'Real-time Transport Protocol',],
            ['id' => 3, 'protocol' => 'HLS', 'real_name' => 'HTTP Live Streaming',],
            ['id' => 4, 'protocol' => 'MOVE', 'real_name' => null,],

        ];

        foreach ($items as $item) {
            \App\Protocol::create($item);
        }
    }
}
