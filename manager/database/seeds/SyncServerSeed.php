<?php

use Illuminate\Database\Seeder;

class SyncServerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'SS0-1',],

        ];

        foreach ($items as $item) {
            \App\SyncServer::create($item);
        }
    }
}
