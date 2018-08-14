<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b2a94e9082c25b2a94e904fbdChannelServerCsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('channel_server_csi');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('channel_server_csi')) {
            Schema::create('channel_server_csi', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('channel_server_id')->unsigned()->nullable();
            $table->foreign('channel_server_id', 'fk_p_174738_174671_csi_ch_5b2a935506cc1')->references('id')->on('channel_servers');
                $table->integer('csi_id')->unsigned()->nullable();
            $table->foreign('csi_id', 'fk_p_174671_174738_channe_5b2a93550537e')->references('id')->on('csis');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
