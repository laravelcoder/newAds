<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class RealtimeNotificationTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateRealtimeNotification()
    {
        $admin = \App\User::find(1);
        $realtime_notification = factory('App\RealtimeNotification')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $realtime_notification) {
            $browser->loginAs($admin)
                ->visit(route('admin.realtime_notifications.index'))
                ->clickLink('Add new')
                ->select("server_type", $realtime_notification->server_type)
                ->type("r_urltn", $realtime_notification->r_urltn)
                ->select("sync_server_id", $realtime_notification->sync_server_id)
                ->press('Save')
                ->assertRouteIs('admin.realtime_notifications.index')
                ->assertSeeIn("tr:last-child td[field-key='server_type']", $realtime_notification->server_type)
                ->assertSeeIn("tr:last-child td[field-key='r_urltn']", $realtime_notification->r_urltn);
        });
    }

    public function testEditRealtimeNotification()
    {
        $admin = \App\User::find(1);
        $realtime_notification = factory('App\RealtimeNotification')->create();
        $realtime_notification2 = factory('App\RealtimeNotification')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $realtime_notification, $realtime_notification2) {
            $browser->loginAs($admin)
                ->visit(route('admin.realtime_notifications.index'))
                ->click('tr[data-entry-id="' . $realtime_notification->id . '"] .btn-info')
                ->select("server_type", $realtime_notification2->server_type)
                ->type("r_urltn", $realtime_notification2->r_urltn)
                ->select("sync_server_id", $realtime_notification2->sync_server_id)
                ->press('Update')
                ->assertRouteIs('admin.realtime_notifications.index')
                ->assertSeeIn("tr:last-child td[field-key='server_type']", $realtime_notification2->server_type)
                ->assertSeeIn("tr:last-child td[field-key='r_urltn']", $realtime_notification2->r_urltn);
        });
    }

    public function testShowRealtimeNotification()
    {
        $admin = \App\User::find(1);
        $realtime_notification = factory('App\RealtimeNotification')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $realtime_notification) {
            $browser->loginAs($admin)
                ->visit(route('admin.realtime_notifications.index'))
                ->click('tr[data-entry-id="' . $realtime_notification->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='server_type']", $realtime_notification->server_type)
                ->assertSeeIn("td[field-key='r_urltn']", $realtime_notification->r_urltn)
                ->assertSeeIn("td[field-key='sync_server']", $realtime_notification->sync_server->name);
        });
    }

}
