<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ProtocolTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateProtocol()
    {
        $admin = \App\User::find(1);
        $protocol = factory('App\Protocol')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $protocol) {
            $browser->loginAs($admin)
                ->visit(route('admin.protocols.index'))
                ->clickLink('Add new')
                ->type("protocol", $protocol->protocol)
                ->type("real_name", $protocol->real_name)
                ->press('Save')
                ->assertRouteIs('admin.protocols.index')
                ->assertSeeIn("tr:last-child td[field-key='protocol']", $protocol->protocol)
                ->assertSeeIn("tr:last-child td[field-key='real_name']", $protocol->real_name);
        });
    }

    public function testEditProtocol()
    {
        $admin = \App\User::find(1);
        $protocol = factory('App\Protocol')->create();
        $protocol2 = factory('App\Protocol')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $protocol, $protocol2) {
            $browser->loginAs($admin)
                ->visit(route('admin.protocols.index'))
                ->click('tr[data-entry-id="' . $protocol->id . '"] .btn-info')
                ->type("protocol", $protocol2->protocol)
                ->type("real_name", $protocol2->real_name)
                ->press('Update')
                ->assertRouteIs('admin.protocols.index')
                ->assertSeeIn("tr:last-child td[field-key='protocol']", $protocol2->protocol)
                ->assertSeeIn("tr:last-child td[field-key='real_name']", $protocol2->real_name);
        });
    }

    public function testShowProtocol()
    {
        $admin = \App\User::find(1);
        $protocol = factory('App\Protocol')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $protocol) {
            $browser->loginAs($admin)
                ->visit(route('admin.protocols.index'))
                ->click('tr[data-entry-id="' . $protocol->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='protocol']", $protocol->protocol)
                ->assertSeeIn("td[field-key='real_name']", $protocol->real_name);
        });
    }

}
