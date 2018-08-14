<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b2aae1c754505b2aae1c6b70cCsiProtocolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('csi_protocol');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('csi_protocol')) {
            Schema::create('csi_protocol', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('csi_id')->unsigned()->nullable();
            $table->foreign('csi_id', 'fk_p_174671_174143_protoc_5b2aa422bd26b')->references('id')->on('csis');
                $table->integer('protocol_id')->unsigned()->nullable();
            $table->foreign('protocol_id', 'fk_p_174143_174671_csi_pr_5b2aa422bc234')->references('id')->on('protocols');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
