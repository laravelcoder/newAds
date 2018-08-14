<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class SyncServerTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateSyncServer()
    {
        $admin = \App\User::find(1);
        $sync_server = factory('App\SyncServer')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $sync_server) {
            $browser->loginAs($admin)
                ->visit(route('admin.sync_servers.index'))
                ->clickLink('Add new')
                ->type("name", $sync_server->name)
                ->press('Save')
                ->assertRouteIs('admin.sync_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $sync_server->name);
        });
    }

    public function testEditSyncServer()
    {
        $admin = \App\User::find(1);
        $sync_server = factory('App\SyncServer')->create();
        $sync_server2 = factory('App\SyncServer')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $sync_server, $sync_server2) {
            $browser->loginAs($admin)
                ->visit(route('admin.sync_servers.index'))
                ->click('tr[data-entry-id="' . $sync_server->id . '"] .btn-info')
                ->type("name", $sync_server2->name)
                ->press('Update')
                ->assertRouteIs('admin.sync_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $sync_server2->name);
        });
    }

    public function testShowSyncServer()
    {
        $admin = \App\User::find(1);
        $sync_server = factory('App\SyncServer')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $sync_server) {
            $browser->loginAs($admin)
                ->visit(route('admin.sync_servers.index'))
                ->click('tr[data-entry-id="' . $sync_server->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $sync_server->name);
        });
    }

}
