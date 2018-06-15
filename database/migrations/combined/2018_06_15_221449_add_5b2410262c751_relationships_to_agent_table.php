<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Add5b2410262c751RelationshipsToAgentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agents', function (Blueprint $table) {
            if (!Schema::hasColumn('agents', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '171264_5b2045fa58776')->references('id')->on('users')->onDelete('cascade');
            }
            if (!Schema::hasColumn('agents', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '171264_5b2045fa6e319')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('agents', function (Blueprint $table) {
            if (Schema::hasColumn('agents', 'created_by_id')) {
                $table->dropForeign('171264_5b2045fa58776');
                $table->dropIndex('171264_5b2045fa58776');
                $table->dropColumn('created_by_id');
            }
            if (Schema::hasColumn('agents', 'created_by_team_id')) {
                $table->dropForeign('171264_5b2045fa6e319');
                $table->dropIndex('171264_5b2045fa6e319');
                $table->dropColumn('created_by_team_id');
            }
        });
    }
}