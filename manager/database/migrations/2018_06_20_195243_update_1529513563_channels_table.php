<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1529513563ChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channels', function (Blueprint $table) {
            if(Schema::hasColumn('channels', 'cid_id')) {
                $table->dropForeign('174144_5b2948c60bc3f');
                $table->dropIndex('174144_5b2948c60bc3f');
                $table->dropColumn('cid_id');
            }
            
        });
Schema::table('channels', function (Blueprint $table) {
            
if (!Schema::hasColumn('channels', 'type')) {
                $table->enum('type', array('prod', 'dev'))->nullable();
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
        Schema::table('channels', function (Blueprint $table) {
            $table->dropColumn('type');
            
        });
Schema::table('channels', function (Blueprint $table) {
                        
        });

    }
}
