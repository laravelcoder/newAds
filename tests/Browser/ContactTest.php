<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ContactTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateContact()
    {
        $admin = \App\User::find(1);
        $contact = factory('App\Contact')->make();

        $relations = [
            factory('App\Contactcompany')->create(),
            factory('App\Contactcompany')->create(),
        ];

        $this->browse(function (Browser $browser) use ($admin, $contact, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.contacts.index'))
                ->clickLink('Add new')
                ->select('company_id', $contact->company_id)
                ->type('first_name', $contact->first_name)
                ->type('last_name', $contact->last_name)
                ->type('email', $contact->email)
                ->type('skype', $contact->skype)
                ->type('address', $contact->address)
                ->select('select[name="adverstiser_id[]"]', $relations[0]->id)
                ->select('select[name="adverstiser_id[]"]', $relations[1]->id)
                ->press('Save')
                ->assertRouteIs('admin.contacts.index')
                ->assertSeeIn("tr:last-child td[field-key='company']", $contact->company->name)
                ->assertSeeIn("tr:last-child td[field-key='first_name']", $contact->first_name)
                ->assertSeeIn("tr:last-child td[field-key='last_name']", $contact->last_name)
                ->assertSeeIn("tr:last-child td[field-key='email']", $contact->email)
                ->assertSeeIn("tr:last-child td[field-key='adverstiser_id'] span:first-child", $relations[0]->name)
                ->assertSeeIn("tr:last-child td[field-key='adverstiser_id'] span:last-child", $relations[1]->name);
        });
    }

    public function testEditContact()
    {
        $admin = \App\User::find(1);
        $contact = factory('App\Contact')->create();
        $contact2 = factory('App\Contact')->make();

        $relations = [
            factory('App\Contactcompany')->create(),
            factory('App\Contactcompany')->create(),
        ];

        $this->browse(function (Browser $browser) use ($admin, $contact, $contact2, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.contacts.index'))
                ->click('tr[data-entry-id="'.$contact->id.'"] .btn-info')
                ->select('company_id', $contact2->company_id)
                ->type('first_name', $contact2->first_name)
                ->type('last_name', $contact2->last_name)
                ->type('email', $contact2->email)
                ->type('skype', $contact2->skype)
                ->type('address', $contact2->address)
                ->select('select[name="adverstiser_id[]"]', $relations[0]->id)
                ->select('select[name="adverstiser_id[]"]', $relations[1]->id)
                ->press('Update')
                ->assertRouteIs('admin.contacts.index')
                ->assertSeeIn("tr:last-child td[field-key='company']", $contact2->company->name)
                ->assertSeeIn("tr:last-child td[field-key='first_name']", $contact2->first_name)
                ->assertSeeIn("tr:last-child td[field-key='last_name']", $contact2->last_name)
                ->assertSeeIn("tr:last-child td[field-key='email']", $contact2->email)
                ->assertSeeIn("tr:last-child td[field-key='adverstiser_id'] span:first-child", $relations[0]->name)
                ->assertSeeIn("tr:last-child td[field-key='adverstiser_id'] span:last-child", $relations[1]->name);
        });
    }

    public function testShowContact()
    {
        $admin = \App\User::find(1);
        $contact = factory('App\Contact')->create();

        $relations = [
            factory('App\Contactcompany')->create(),
            factory('App\Contactcompany')->create(),
        ];

        $contact->adverstiser_id()->attach([$relations[0]->id, $relations[1]->id]);

        $this->browse(function (Browser $browser) use ($admin, $contact, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.contacts.index'))
                ->click('tr[data-entry-id="'.$contact->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='company']", $contact->company->name)
                ->assertSeeIn("td[field-key='first_name']", $contact->first_name)
                ->assertSeeIn("td[field-key='last_name']", $contact->last_name)
                ->assertSeeIn("td[field-key='email']", $contact->email)
                ->assertSeeIn("td[field-key='skype']", $contact->skype)
                ->assertSeeIn("td[field-key='address']", $contact->address)
                ->assertSeeIn("td[field-key='created_by']", $contact->created_by->name)
                ->assertSeeIn("td[field-key='created_by_team']", $contact->created_by_team->name)
                ->assertSeeIn("tr:last-child td[field-key='adverstiser_id'] span:first-child", $relations[0]->name)
                ->assertSeeIn("tr:last-child td[field-key='adverstiser_id'] span:last-child", $relations[1]->name);
        });
    }
}
