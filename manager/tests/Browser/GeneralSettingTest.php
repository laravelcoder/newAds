<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class GeneralSettingTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateGeneralSetting()
    {
        $admin = \App\User::find(1);
        $general_setting = factory('App\GeneralSetting')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $general_setting) {
            $browser->loginAs($admin)
                ->visit(route('admin.general_settings.index'))
                ->clickLink('Add new')
                ->type("transcoding_server", $general_setting->transcoding_server)
                ->select("sync_server_id", $general_setting->sync_server_id)
                ->press('Save')
                ->assertRouteIs('admin.general_settings.index')
                ->assertSeeIn("tr:last-child td[field-key='transcoding_server']", $general_setting->transcoding_server);
        });
    }

    public function testEditGeneralSetting()
    {
        $admin = \App\User::find(1);
        $general_setting = factory('App\GeneralSetting')->create();
        $general_setting2 = factory('App\GeneralSetting')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $general_setting, $general_setting2) {
            $browser->loginAs($admin)
                ->visit(route('admin.general_settings.index'))
                ->click('tr[data-entry-id="' . $general_setting->id . '"] .btn-info')
                ->type("transcoding_server", $general_setting2->transcoding_server)
                ->select("sync_server_id", $general_setting2->sync_server_id)
                ->press('Update')
                ->assertRouteIs('admin.general_settings.index')
                ->assertSeeIn("tr:last-child td[field-key='transcoding_server']", $general_setting2->transcoding_server);
        });
    }

    public function testShowGeneralSetting()
    {
        $admin = \App\User::find(1);
        $general_setting = factory('App\GeneralSetting')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $general_setting) {
            $browser->loginAs($admin)
                ->visit(route('admin.general_settings.index'))
                ->click('tr[data-entry-id="' . $general_setting->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='transcoding_server']", $general_setting->transcoding_server)
                ->assertSeeIn("td[field-key='sync_server']", $general_setting->sync_server->name);
        });
    }

}
