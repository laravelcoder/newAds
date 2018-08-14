<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class PerChannelConfigurationTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreatePerChannelConfiguration()
    {
        $admin = \App\User::find(1);
        $per_channel_configuration = factory('App\PerChannelConfiguration')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $per_channel_configuration) {
            $browser->loginAs($admin)
                ->visit(route('admin.per_channel_configurations.index'))
                ->clickLink('Add new')
                ->type("cid", $per_channel_configuration->cid)
                ->uncheck("active")
                ->type("notify_channel_id", $per_channel_configuration->notify_channel_id)
                ->type("offset", $per_channel_configuration->offset)
                ->type("ad_lengths", $per_channel_configuration->ad_lengths)
                ->type("ad_spacing", $per_channel_configuration->ad_spacing)
                ->select("rtn_id", $per_channel_configuration->rtn_id)
                ->select("sync_server_id", $per_channel_configuration->sync_server_id)
                ->press('Save')
                ->assertRouteIs('admin.per_channel_configurations.index')
                ->assertSeeIn("tr:last-child td[field-key='cid']", $per_channel_configuration->cid)
                ->assertNotChecked("active")
                ->assertSeeIn("tr:last-child td[field-key='notify_channel_id']", $per_channel_configuration->notify_channel_id)
                ->assertSeeIn("tr:last-child td[field-key='offset']", $per_channel_configuration->offset)
                ->assertSeeIn("tr:last-child td[field-key='ad_lengths']", $per_channel_configuration->ad_lengths)
                ->assertSeeIn("tr:last-child td[field-key='ad_spacing']", $per_channel_configuration->ad_spacing)
                ->assertSeeIn("tr:last-child td[field-key='rtn']", $per_channel_configuration->rtn->server_type);
        });
    }

    public function testEditPerChannelConfiguration()
    {
        $admin = \App\User::find(1);
        $per_channel_configuration = factory('App\PerChannelConfiguration')->create();
        $per_channel_configuration2 = factory('App\PerChannelConfiguration')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $per_channel_configuration, $per_channel_configuration2) {
            $browser->loginAs($admin)
                ->visit(route('admin.per_channel_configurations.index'))
                ->click('tr[data-entry-id="' . $per_channel_configuration->id . '"] .btn-info')
                ->type("cid", $per_channel_configuration2->cid)
                ->uncheck("active")
                ->type("notify_channel_id", $per_channel_configuration2->notify_channel_id)
                ->type("offset", $per_channel_configuration2->offset)
                ->type("ad_lengths", $per_channel_configuration2->ad_lengths)
                ->type("ad_spacing", $per_channel_configuration2->ad_spacing)
                ->select("rtn_id", $per_channel_configuration2->rtn_id)
                ->select("sync_server_id", $per_channel_configuration2->sync_server_id)
                ->press('Update')
                ->assertRouteIs('admin.per_channel_configurations.index')
                ->assertSeeIn("tr:last-child td[field-key='cid']", $per_channel_configuration2->cid)
                ->assertNotChecked("active")
                ->assertSeeIn("tr:last-child td[field-key='notify_channel_id']", $per_channel_configuration2->notify_channel_id)
                ->assertSeeIn("tr:last-child td[field-key='offset']", $per_channel_configuration2->offset)
                ->assertSeeIn("tr:last-child td[field-key='ad_lengths']", $per_channel_configuration2->ad_lengths)
                ->assertSeeIn("tr:last-child td[field-key='ad_spacing']", $per_channel_configuration2->ad_spacing)
                ->assertSeeIn("tr:last-child td[field-key='rtn']", $per_channel_configuration2->rtn->server_type);
        });
    }

    public function testShowPerChannelConfiguration()
    {
        $admin = \App\User::find(1);
        $per_channel_configuration = factory('App\PerChannelConfiguration')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $per_channel_configuration) {
            $browser->loginAs($admin)
                ->visit(route('admin.per_channel_configurations.index'))
                ->click('tr[data-entry-id="' . $per_channel_configuration->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='cid']", $per_channel_configuration->cid)
                ->assertChecked("active")
                ->assertSeeIn("td[field-key='notify_channel_id']", $per_channel_configuration->notify_channel_id)
                ->assertSeeIn("td[field-key='offset']", $per_channel_configuration->offset)
                ->assertSeeIn("td[field-key='ad_lengths']", $per_channel_configuration->ad_lengths)
                ->assertSeeIn("td[field-key='ad_spacing']", $per_channel_configuration->ad_spacing)
                ->assertSeeIn("td[field-key='rtn']", $per_channel_configuration->rtn->server_type)
                ->assertSeeIn("td[field-key='sync_server']", $per_channel_configuration->sync_server->name);
        });
    }

}
