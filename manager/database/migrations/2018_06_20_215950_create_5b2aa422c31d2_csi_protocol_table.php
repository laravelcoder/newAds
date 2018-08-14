<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b2aa422c31d2CsiProtocolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('csi_protocol')) {
            Schema::create('csi_protocol', function (Blueprint $table) {
                $table->integer('csi_id')->unsigned()->nullable();
                $table->foreign('csi_id', 'fk_p_174671_174143_protoc_5b2aa422c3371')->references('id')->on('csis')->onDelete('cascade');
                $table->integer('protocol_id')->unsigned()->nullable();
                $table->foreign('protocol_id', 'fk_p_174143_174671_csi_pr_5b2aa422c3450')->references('id')->on('protocols')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('csi_protocol');
    }
}
