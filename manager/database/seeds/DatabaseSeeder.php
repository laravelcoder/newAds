<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(ChannelSeed::class);
        $this->call(ChannelServerSeed::class);
        $this->call(CountrySeed::class);
        $this->call(ProtocolSeed::class);
        $this->call(CsiSeed::class);
        $this->call(CsoSeed::class);
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(SyncServerSeed::class);
        $this->call(UserSeed::class);
        $this->call(RoleSeedPivot::class);
        $this->call(UserSeedPivot::class);

    }
}
