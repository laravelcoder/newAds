<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class AlertTest extends DuskTestCase
{

    public function testCreateAlert()
    {
        $admin = \App\User::find(1);
        $alert = factory('App\Alert')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $alert) {
            $browser->loginAs($admin)
                ->visit(route('admin.alerts.index'))
                ->clickLink('Add new')
                ->type("title", $alert->title)
                ->type("content", $alert->content)
                ->select("alert_type", $alert->alert_type)
                ->select("contact_id", $alert->contact_id)
                ->select("user_id", $alert->user_id)
                ->press('Save')
                ->assertRouteIs('admin.alerts.index')
                ->assertSeeIn("tr:last-child td[field-key='title']", $alert->title)
                ->assertSeeIn("tr:last-child td[field-key='alert_type']", $alert->alert_type)
                ->assertSeeIn("tr:last-child td[field-key='contact']", $alert->contact->first_name)
                ->assertSeeIn("tr:last-child td[field-key='user']", $alert->user->name)
                ->logout();
        });
    }

    public function testEditAlert()
    {
        $admin = \App\User::find(1);
        $alert = factory('App\Alert')->create();
        $alert2 = factory('App\Alert')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $alert, $alert2) {
            $browser->loginAs($admin)
                ->visit(route('admin.alerts.index'))
                ->click('tr[data-entry-id="' . $alert->id . '"] .btn-info')
                ->type("title", $alert2->title)
                ->type("content", $alert2->content)
                ->select("alert_type", $alert2->alert_type)
                ->select("contact_id", $alert2->contact_id)
                ->select("user_id", $alert2->user_id)
                ->press('Update')
                ->assertRouteIs('admin.alerts.index')
                ->assertSeeIn("tr:last-child td[field-key='title']", $alert2->title)
                ->assertSeeIn("tr:last-child td[field-key='alert_type']", $alert2->alert_type)
                ->assertSeeIn("tr:last-child td[field-key='contact']", $alert2->contact->first_name)
                ->assertSeeIn("tr:last-child td[field-key='user']", $alert2->user->name)
                ->logout();
        });
    }

    public function testShowAlert()
    {
        $admin = \App\User::find(1);
        $alert = factory('App\Alert')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $alert) {
            $browser->loginAs($admin)
                ->visit(route('admin.alerts.index'))
                ->click('tr[data-entry-id="' . $alert->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='title']", $alert->title)
                ->assertSeeIn("td[field-key='content']", $alert->content)
                ->assertSeeIn("td[field-key='alert_type']", $alert->alert_type)
                ->assertSeeIn("td[field-key='contact']", $alert->contact->first_name)
                ->assertSeeIn("td[field-key='user']", $alert->user->name)
                ->logout();
        });
    }

}
