<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b2aae1c6ef685b2aae1c6b70cCsoProtocolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('cso_protocol');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('cso_protocol')) {
            Schema::create('cso_protocol', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('cso_id')->unsigned()->nullable();
            $table->foreign('cso_id', 'fk_p_174743_174143_protoc_5b2aa41dd70a0')->references('id')->on('csos');
                $table->integer('protocol_id')->unsigned()->nullable();
            $table->foreign('protocol_id', 'fk_p_174143_174743_cso_pr_5b2aa41dd5cf0')->references('id')->on('protocols');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
