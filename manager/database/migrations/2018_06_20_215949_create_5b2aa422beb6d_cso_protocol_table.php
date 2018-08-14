<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b2aa422beb6dCsoProtocolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('cso_protocol')) {
            Schema::create('cso_protocol', function (Blueprint $table) {
                $table->integer('cso_id')->unsigned()->nullable();
                $table->foreign('cso_id', 'fk_p_174743_174143_protoc_5b2aa422becf0')->references('id')->on('csos')->onDelete('cascade');
                $table->integer('protocol_id')->unsigned()->nullable();
                $table->foreign('protocol_id', 'fk_p_174143_174743_cso_pr_5b2aa422bedc9')->references('id')->on('protocols')->onDelete('cascade');
                
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
        Schema::dropIfExists('cso_protocol');
    }
}
