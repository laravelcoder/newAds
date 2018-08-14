<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1529612584ReportSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('report_settings')) {
            Schema::create('report_settings', function (Blueprint $table) {
                $table->increments('id');
                $table->tinyInteger('millisecond_precision')->nullable()->default('1');
                $table->tinyInteger('show_channel_button')->nullable()->default('1');
                $table->tinyInteger('show_clip_button')->nullable()->default('1');
                $table->tinyInteger('show_group_button')->nullable()->default('1');
                $table->tinyInteger('show_live_button')->nullable()->default('1');
                $table->tinyInteger('enable_evt')->nullable()->default('0');
                $table->tinyInteger('enable_excel')->nullable()->default('0');
                $table->tinyInteger('enable_evt_timing')->nullable()->default('0');
                $table->string('timezone')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_settings');
    }
}
