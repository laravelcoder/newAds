<?php

use Illuminate\Database\Seeder;

class CsiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'channel_server_id' => 1, 'channel_id' => 5, 'protocol_id' => 1, 'ssm' => null, 'imc' => '127.0.0.1', 'ip' => '8080', 'pid' => null,],
            ['id' => 2, 'channel_server_id' => 1, 'channel_id' => 16, 'protocol_id' => 1, 'ssm' => '127.0.0.1', 'imc' => null, 'ip' => '80', 'pid' => null,],
            ['id' => 3, 'channel_server_id' => 1, 'channel_id' => 1, 'protocol_id' => 1, 'ssm' => '127.0.0.1', 'imc' => '127.0.0.1', 'ip' => '12345', 'pid' => null,],
            ['id' => 4, 'channel_server_id' => 1, 'channel_id' => 3, 'protocol_id' => 2, 'ssm' => '127.0.0.1', 'imc' => null, 'ip' => '555', 'pid' => null,],

        ];

        foreach ($items as $item) {
            \App\Csi::create($item);
        }
    }
}
