<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b2ab31376739RelationshipsToCsoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('csos', function(Blueprint $table) {
            if (!Schema::hasColumn('csos', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '174743_5b2a97a71c2dd')->references('id')->on('channel_servers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('csos', 'cid_id')) {
                $table->integer('cid_id')->unsigned()->nullable();
                $table->foreign('cid_id', '174743_5b2a973fc8347')->references('id')->on('channels')->onDelete('cascade');
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
        Schema::table('csos', function(Blueprint $table) {
            
        });
    }
}
