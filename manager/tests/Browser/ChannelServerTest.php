<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ChannelServerTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateChannelServer()
    {
        $admin = \App\User::find(1);
        $channel_server = factory('App\ChannelServer')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $channel_server) {
            $browser->loginAs($admin)
                ->visit(route('admin.channel_servers.index'))
                ->clickLink('Add new')
                ->type("name", $channel_server->name)
                ->press('Save')
                ->assertRouteIs('admin.channel_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $channel_server->name);
        });
    }

    public function testEditChannelServer()
    {
        $admin = \App\User::find(1);
        $channel_server = factory('App\ChannelServer')->create();
        $channel_server2 = factory('App\ChannelServer')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $channel_server, $channel_server2) {
            $browser->loginAs($admin)
                ->visit(route('admin.channel_servers.index'))
                ->click('tr[data-entry-id="' . $channel_server->id . '"] .btn-info')
                ->type("name", $channel_server2->name)
                ->press('Update')
                ->assertRouteIs('admin.channel_servers.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $channel_server2->name);
        });
    }

    public function testShowChannelServer()
    {
        $admin = \App\User::find(1);
        $channel_server = factory('App\ChannelServer')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $channel_server) {
            $browser->loginAs($admin)
                ->visit(route('admin.channel_servers.index'))
                ->click('tr[data-entry-id="' . $channel_server->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $channel_server->name);
        });
    }

}
