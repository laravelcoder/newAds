<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b2c050379cf6RelationshipsToOutputSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('output_settings', function(Blueprint $table) {
            if (!Schema::hasColumn('output_settings', 'email_id')) {
                $table->integer('email_id')->unsigned()->nullable();
                $table->foreign('email_id', '175204_5b2c04fe5d7d2')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('output_settings', function(Blueprint $table) {
            
        });
    }
}
