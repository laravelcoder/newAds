<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b27f6e3d7506RelationshipsToStationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stations', function(Blueprint $table) {
            if (!Schema::hasColumn('stations', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '173675_5b27f04181c0d')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('stations', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '173675_5b27f0419bb2a')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('stations', function(Blueprint $table) {
            if(Schema::hasColumn('stations', 'created_by_id')) {
                $table->dropForeign('173675_5b27f04181c0d');
                $table->dropIndex('173675_5b27f04181c0d');
                $table->dropColumn('created_by_id');
            }
            if(Schema::hasColumn('stations', 'created_by_team_id')) {
                $table->dropForeign('173675_5b27f0419bb2a');
                $table->dropIndex('173675_5b27f0419bb2a');
                $table->dropColumn('created_by_team_id');
            }
            
        });
    }
}
