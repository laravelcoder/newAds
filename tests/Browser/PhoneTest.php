<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class PhoneTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreatePhone()
    {
        $admin = \App\User::find(1);
        $phone = factory('App\Phone')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $phone) {
            $browser->loginAs($admin)
                ->visit(route('admin.phones.index'))
                ->clickLink('Add new')
                ->type("phone_number", $phone->phone_number)
                ->select("advertiser_id", $phone->advertiser_id)
                ->select("agent_id", $phone->agent_id)
                ->select("advertisers_id", $phone->advertisers_id)
                ->press('Save')
                ->assertRouteIs('admin.phones.index')
                ->assertSeeIn("tr:last-child td[field-key='phone_number']", $phone->phone_number)
                ->assertSeeIn("tr:last-child td[field-key='advertiser']", $phone->advertiser->first_name)
                ->assertSeeIn("tr:last-child td[field-key='agent']", $phone->agent->first_name)
                ->assertSeeIn("tr:last-child td[field-key='advertisers']", $phone->advertisers->name);
        });
    }

    public function testEditPhone()
    {
        $admin = \App\User::find(1);
        $phone = factory('App\Phone')->create();
        $phone2 = factory('App\Phone')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $phone, $phone2) {
            $browser->loginAs($admin)
                ->visit(route('admin.phones.index'))
                ->click('tr[data-entry-id="' . $phone->id . '"] .btn-info')
                ->type("phone_number", $phone2->phone_number)
                ->select("advertiser_id", $phone2->advertiser_id)
                ->select("agent_id", $phone2->agent_id)
                ->select("advertisers_id", $phone2->advertisers_id)
                ->press('Update')
                ->assertRouteIs('admin.phones.index')
                ->assertSeeIn("tr:last-child td[field-key='phone_number']", $phone2->phone_number)
                ->assertSeeIn("tr:last-child td[field-key='advertiser']", $phone2->advertiser->first_name)
                ->assertSeeIn("tr:last-child td[field-key='agent']", $phone2->agent->first_name)
                ->assertSeeIn("tr:last-child td[field-key='advertisers']", $phone2->advertisers->name);
        });
    }

    public function testShowPhone()
    {
        $admin = \App\User::find(1);
        $phone = factory('App\Phone')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $phone) {
            $browser->loginAs($admin)
                ->visit(route('admin.phones.index'))
                ->click('tr[data-entry-id="' . $phone->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='phone_number']", $phone->phone_number)
                ->assertSeeIn("td[field-key='advertiser']", $phone->advertiser->first_name)
                ->assertSeeIn("td[field-key='agent']", $phone->agent->first_name)
                ->assertSeeIn("td[field-key='advertisers']", $phone->advertisers->name);
        });
    }

}
