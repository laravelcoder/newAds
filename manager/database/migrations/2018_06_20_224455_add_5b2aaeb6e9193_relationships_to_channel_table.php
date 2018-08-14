<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b2aaeb6e9193RelationshipsToChannelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channels', function(Blueprint $table) {
            if (!Schema::hasColumn('channels', 'csi_id')) {
                $table->integer('csi_id')->unsigned()->nullable();
                $table->foreign('csi_id', '174144_5b2aaeb07bd2f')->references('id')->on('csis')->onDelete('cascade');
                }
                if (!Schema::hasColumn('channels', 'cso_id')) {
                $table->integer('cso_id')->unsigned()->nullable();
                $table->foreign('cso_id', '174144_5b2aaeb08c276')->references('id')->on('csos')->onDelete('cascade');
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
        Schema::table('channels', function(Blueprint $table) {
            
        });
    }
}
