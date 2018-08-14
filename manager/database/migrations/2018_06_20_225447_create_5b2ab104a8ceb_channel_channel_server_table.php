<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b2ab104a8cebChannelChannelServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('channel_channel_server')) {
            Schema::create('channel_channel_server', function (Blueprint $table) {
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', 'fk_p_174144_174738_channe_5b2ab104a8ea0')->references('id')->on('channels')->onDelete('cascade');
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', 'fk_p_174738_174144_channe_5b2ab104a8f77')->references('id')->on('channel_servers')->onDelete('cascade');
                
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
        Schema::dropIfExists('channel_channel_server');
    }
}
