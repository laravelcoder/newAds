<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class FtpTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateFtp()
    {
        $admin = \App\User::find(1);
        $ftp = factory('App\Ftp')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $ftp) {
            $browser->loginAs($admin)
                ->visit(route('admin.ftps.index'))
                ->clickLink('Add new')
                ->type("ftp_server", $ftp->ftp_server)
                ->type("ftp_directory", $ftp->ftp_directory)
                ->type("ftp_username", $ftp->ftp_username)
                ->type("ftp_password", $ftp->ftp_password)
                ->type("grab_time", $ftp->grab_time)
                ->select("sync_server_id", $ftp->sync_server_id)
                ->press('Save')
                ->assertRouteIs('admin.ftps.index')
                ->assertSeeIn("tr:last-child td[field-key='ftp_server']", $ftp->ftp_server)
                ->assertSeeIn("tr:last-child td[field-key='ftp_directory']", $ftp->ftp_directory)
                ->assertSeeIn("tr:last-child td[field-key='ftp_username']", $ftp->ftp_username)
                ->assertSeeIn("tr:last-child td[field-key='grab_time']", $ftp->grab_time);
        });
    }

    public function testEditFtp()
    {
        $admin = \App\User::find(1);
        $ftp = factory('App\Ftp')->create();
        $ftp2 = factory('App\Ftp')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $ftp, $ftp2) {
            $browser->loginAs($admin)
                ->visit(route('admin.ftps.index'))
                ->click('tr[data-entry-id="' . $ftp->id . '"] .btn-info')
                ->type("ftp_server", $ftp2->ftp_server)
                ->type("ftp_directory", $ftp2->ftp_directory)
                ->type("ftp_username", $ftp2->ftp_username)
                ->type("ftp_password", $ftp2->ftp_password)
                ->type("grab_time", $ftp2->grab_time)
                ->select("sync_server_id", $ftp2->sync_server_id)
                ->press('Update')
                ->assertRouteIs('admin.ftps.index')
                ->assertSeeIn("tr:last-child td[field-key='ftp_server']", $ftp2->ftp_server)
                ->assertSeeIn("tr:last-child td[field-key='ftp_directory']", $ftp2->ftp_directory)
                ->assertSeeIn("tr:last-child td[field-key='ftp_username']", $ftp2->ftp_username)
                ->assertSeeIn("tr:last-child td[field-key='grab_time']", $ftp2->grab_time);
        });
    }

    public function testShowFtp()
    {
        $admin = \App\User::find(1);
        $ftp = factory('App\Ftp')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $ftp) {
            $browser->loginAs($admin)
                ->visit(route('admin.ftps.index'))
                ->click('tr[data-entry-id="' . $ftp->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='ftp_server']", $ftp->ftp_server)
                ->assertSeeIn("td[field-key='ftp_directory']", $ftp->ftp_directory)
                ->assertSeeIn("td[field-key='ftp_username']", $ftp->ftp_username)
                ->assertSeeIn("td[field-key='grab_time']", $ftp->grab_time)
                ->assertSeeIn("td[field-key='sync_server']", $ftp->sync_server->name);
        });
    }

}
