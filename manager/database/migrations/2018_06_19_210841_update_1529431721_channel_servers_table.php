<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1529431721ChannelServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channel_servers', function (Blueprint $table) {
            
if (!Schema::hasColumn('channel_servers', 'ssm')) {
                $table->string('ssm')->nullable();
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
            $table->dropColumn('ssm');
            
        });

    }
}
