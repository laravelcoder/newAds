<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b6dfa0fa0f04RelationshipsToAlertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alerts', function(Blueprint $table) {
            if (!Schema::hasColumn('alerts', 'contact_id')) {
                $table->integer('contact_id')->unsigned()->nullable();
                $table->foreign('contact_id', '194630_5b6dde4545f5b')->references('id')->on('contacts')->onDelete('cascade');
                }
                if (!Schema::hasColumn('alerts', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '194630_5b6dde4555c66')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('alerts', function(Blueprint $table) {
            if(Schema::hasColumn('alerts', 'contact_id')) {
                $table->dropForeign('194630_5b6dde4545f5b');
                $table->dropIndex('194630_5b6dde4545f5b');
                $table->dropColumn('contact_id');
            }
            if(Schema::hasColumn('alerts', 'user_id')) {
                $table->dropForeign('194630_5b6dde4555c66');
                $table->dropIndex('194630_5b6dde4555c66');
                $table->dropColumn('user_id');
            }
            
        });
    }
}
