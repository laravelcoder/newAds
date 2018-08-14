<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ReportSettingTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateReportSetting()
    {
        $admin = \App\User::find(1);
        $report_setting = factory('App\ReportSetting')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $report_setting) {
            $browser->loginAs($admin)
                ->visit(route('admin.report_settings.index'))
                ->clickLink('Add new')
                ->uncheck("millisecond_precision")
                ->uncheck("show_channel_button")
                ->uncheck("show_clip_button")
                ->uncheck("show_group_button")
                ->uncheck("show_live_button")
                ->check("enable_evt")
                ->check("enable_excel")
                ->check("enable_evt_timing")
                ->type("timezone", $report_setting->timezone)
                ->select("country_id", $report_setting->country_id)
                ->select("synce_server_id", $report_setting->synce_server_id)
                ->select("filters_id", $report_setting->filters_id)
                ->press('Save')
                ->assertRouteIs('admin.report_settings.index')
                ->assertNotChecked("millisecond_precision")
                ->assertNotChecked("show_channel_button")
                ->assertNotChecked("show_clip_button")
                ->assertNotChecked("show_group_button")
                ->assertNotChecked("show_live_button")
                ->assertChecked("enable_evt")
                ->assertChecked("enable_excel")
                ->assertChecked("enable_evt_timing")
                ->assertSeeIn("tr:last-child td[field-key='timezone']", $report_setting->timezone);
        });
    }

    public function testEditReportSetting()
    {
        $admin = \App\User::find(1);
        $report_setting = factory('App\ReportSetting')->create();
        $report_setting2 = factory('App\ReportSetting')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $report_setting, $report_setting2) {
            $browser->loginAs($admin)
                ->visit(route('admin.report_settings.index'))
                ->click('tr[data-entry-id="' . $report_setting->id . '"] .btn-info')
                ->uncheck("millisecond_precision")
                ->uncheck("show_channel_button")
                ->uncheck("show_clip_button")
                ->uncheck("show_group_button")
                ->uncheck("show_live_button")
                ->check("enable_evt")
                ->check("enable_excel")
                ->check("enable_evt_timing")
                ->type("timezone", $report_setting2->timezone)
                ->select("country_id", $report_setting2->country_id)
                ->select("synce_server_id", $report_setting2->synce_server_id)
                ->select("filters_id", $report_setting2->filters_id)
                ->press('Update')
                ->assertRouteIs('admin.report_settings.index')
                ->assertNotChecked("millisecond_precision")
                ->assertNotChecked("show_channel_button")
                ->assertNotChecked("show_clip_button")
                ->assertNotChecked("show_group_button")
                ->assertNotChecked("show_live_button")
                ->assertChecked("enable_evt")
                ->assertChecked("enable_excel")
                ->assertChecked("enable_evt_timing")
                ->assertSeeIn("tr:last-child td[field-key='timezone']", $report_setting2->timezone);
        });
    }

    public function testShowReportSetting()
    {
        $admin = \App\User::find(1);
        $report_setting = factory('App\ReportSetting')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $report_setting) {
            $browser->loginAs($admin)
                ->visit(route('admin.report_settings.index'))
                ->click('tr[data-entry-id="' . $report_setting->id . '"] .btn-primary')
                ->assertChecked("millisecond_precision")
                ->assertChecked("show_channel_button")
                ->assertChecked("show_clip_button")
                ->assertChecked("show_group_button")
                ->assertChecked("show_live_button")
                ->assertNotChecked("enable_evt")
                ->assertNotChecked("enable_excel")
                ->assertNotChecked("enable_evt_timing")
                ->assertSeeIn("td[field-key='timezone']", $report_setting->timezone)
                ->assertSeeIn("td[field-key='country']", $report_setting->country->title)
                ->assertSeeIn("td[field-key='synce_server']", $report_setting->synce_server->name)
                ->assertSeeIn("td[field-key='filters']", $report_setting->filters->name);
        });
    }

}
