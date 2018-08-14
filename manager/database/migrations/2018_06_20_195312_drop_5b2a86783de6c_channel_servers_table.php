<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b2a86783de6cChannelServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('channel_servers');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('channel_servers')) {
            Schema::create('channel_servers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('ip')->nullable();
                $table->string('url')->nullable();
                $table->integer('port')->nullable()->unsigned();
                $table->string('pid')->nullable();
                $table->string('ssm')->nullable();
                $table->enum('prot', array('HLS', 'UDP', 'RTP', 'MOVE'))->nullable();
                
                $table->timestamps();
                $table->softDeletes();

            $table->index(['deleted_at']);
            });
        }
    }
}
