<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b2c07c96ca44RelationshipsToPerChannelConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('per_channel_configurations', function(Blueprint $table) {
            if (!Schema::hasColumn('per_channel_configurations', 'rtn_id')) {
                $table->integer('rtn_id')->unsigned()->nullable();
                $table->foreign('rtn_id', '175206_5b2c07c3b147d')->references('id')->on('realtime_notifications')->onDelete('cascade');
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
        Schema::table('per_channel_configurations', function(Blueprint $table) {
            
        });
    }
}
