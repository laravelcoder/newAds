<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1529432215ChannelServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channel_servers', function (Blueprint $table) {
            
if (!Schema::hasColumn('channel_servers', 'prot')) {
                $table->enum('prot', array('HLS', 'UDP', 'RTP', 'MOVE'))->nullable();
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('channel_servers', function (Blueprint $table) {
            $table->dropColumn('prot');
            
        });

    }
}
