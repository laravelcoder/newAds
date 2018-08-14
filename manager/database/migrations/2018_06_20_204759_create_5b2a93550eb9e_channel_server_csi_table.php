<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b2a93550eb9eChannelServerCsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('channel_server_csi')) {
            Schema::create('channel_server_csi', function (Blueprint $table) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', 'fk_p_174738_174671_csi_ch_5b2a93550ed3b')->references('id')->on('channel_servers')->onDelete('cascade');
                $table->integer('csi_id')->unsigned()->nullable();
                $table->foreign('csi_id', 'fk_p_174671_174738_channe_5b2a93550ee28')->references('id')->on('csis')->onDelete('cascade');
                
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
        Schema::dropIfExists('channel_server_csi');
    }
}
