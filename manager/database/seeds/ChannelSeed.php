<?php

use Illuminate\Database\Seeder;

class ChannelSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'channelid' => 'HGTVD_caipy', 'type' => 'dev',],
            ['id' => 2, 'channelid' => 'SETHHD', 'type' => 'prod',],
            ['id' => 3, 'channelid' => 'CLRS', 'type' => 'prod',],
            ['id' => 4, 'channelid' => 'SPLUS', 'type' => 'prod',],
            ['id' => 5, 'channelid' => 'WLLOHD', 'type' => 'prod',],
            ['id' => 6, 'channelid' => 'ZEETVH', 'type' => 'prod',],
            ['id' => 7, 'channelid' => 'AAJTK', 'type' => 'prod',],
            ['id' => 8, 'channelid' => 'SAB', 'type' => 'prod',],
            ['id' => 9, 'channelid' => 'BEIN2', 'type' => 'prod',],
            ['id' => 10, 'channelid' => 'tsCLRS', 'type' => 'prod',],
            ['id' => 11, 'channelid' => 'WILXTRA', 'type' => 'prod',],
            ['id' => 12, 'channelid' => 'SETMX', 'type' => 'prod',],
            ['id' => 13, 'channelid' => 'ESTRELLA', 'type' => 'prod',],
            ['id' => 14, 'channelid' => 'PTC', 'type' => 'prod',],
            ['id' => 15, 'channelid' => 'TV9', 'type' => 'prod',],
            ['id' => 16, 'channelid' => 'ZNEWS', 'type' => 'prod',],
            ['id' => 17, 'channelid' => 'CINEL', 'type' => 'prod',],
            ['id' => 18, 'channelid' => 'ZEECINH', 'type' => 'prod',],
            ['id' => 19, 'channelid' => 'TVASA', 'type' => 'prod',],
            ['id' => 20, 'channelid' => 'SVJAY', 'type' => 'prod',],

        ];

        foreach ($items as $item) {
            \App\Channel::create($item);
        }
    }
}
