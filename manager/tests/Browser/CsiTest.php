<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CsiTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateCsi()
    {
        $admin = \App\User::find(1);
        $csi = factory('App\Csi')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $csi) {
            $browser->loginAs($admin)
                ->visit(route('admin.csis.index'))
                ->clickLink('Add new')
                ->select("channel_server_id", $csi->channel_server_id)
                ->select("channel_id", $csi->channel_id)
                ->select("protocol_id", $csi->protocol_id)
                ->type("ssm", $csi->ssm)
                ->type("imc", $csi->imc)
                ->type("ip", $csi->ip)
                ->type("pid", $csi->pid)
                ->press('Save')
                ->assertRouteIs('admin.csis.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $csi->channel_server->name)
                ->assertSeeIn("tr:last-child td[field-key='channel']", $csi->channel->channelid)
                ->assertSeeIn("tr:last-child td[field-key='protocol']", $csi->protocol->protocol)
                ->assertSeeIn("tr:last-child td[field-key='ssm']", $csi->ssm)
                ->assertSeeIn("tr:last-child td[field-key='imc']", $csi->imc)
                ->assertSeeIn("tr:last-child td[field-key='ip']", $csi->ip)
                ->assertSeeIn("tr:last-child td[field-key='pid']", $csi->pid);
        });
    }

    public function testEditCsi()
    {
        $admin = \App\User::find(1);
        $csi = factory('App\Csi')->create();
        $csi2 = factory('App\Csi')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $csi, $csi2) {
            $browser->loginAs($admin)
                ->visit(route('admin.csis.index'))
                ->click('tr[data-entry-id="' . $csi->id . '"] .btn-info')
                ->select("channel_server_id", $csi2->channel_server_id)
                ->select("channel_id", $csi2->channel_id)
                ->select("protocol_id", $csi2->protocol_id)
                ->type("ssm", $csi2->ssm)
                ->type("imc", $csi2->imc)
                ->type("ip", $csi2->ip)
                ->type("pid", $csi2->pid)
                ->press('Update')
                ->assertRouteIs('admin.csis.index')
                ->assertSeeIn("tr:last-child td[field-key='channel_server']", $csi2->channel_server->name)
                ->assertSeeIn("tr:last-child td[field-key='channel']", $csi2->channel->channelid)
                ->assertSeeIn("tr:last-child td[field-key='protocol']", $csi2->protocol->protocol)
                ->assertSeeIn("tr:last-child td[field-key='ssm']", $csi2->ssm)
                ->assertSeeIn("tr:last-child td[field-key='imc']", $csi2->imc)
                ->assertSeeIn("tr:last-child td[field-key='ip']", $csi2->ip)
                ->assertSeeIn("tr:last-child td[field-key='pid']", $csi2->pid);
        });
    }

    public function testShowCsi()
    {
        $admin = \App\User::find(1);
        $csi = factory('App\Csi')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $csi) {
            $browser->loginAs($admin)
                ->visit(route('admin.csis.index'))
                ->click('tr[data-entry-id="' . $csi->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='channel_server']", $csi->channel_server->name)
                ->assertSeeIn("td[field-key='channel']", $csi->channel->channelid)
                ->assertSeeIn("td[field-key='protocol']", $csi->protocol->protocol)
                ->assertSeeIn("td[field-key='ssm']", $csi->ssm)
                ->assertSeeIn("td[field-key='imc']", $csi->imc)
                ->assertSeeIn("td[field-key='ip']", $csi->ip)
                ->assertSeeIn("td[field-key='pid']", $csi->pid);
        });
    }

}
