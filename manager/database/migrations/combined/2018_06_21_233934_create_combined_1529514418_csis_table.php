<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1529514418CsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('csis')) {
            Schema::create('csis', function (Blueprint $table) {
                $table->increments('id');
                $table->string('ssm')->nullable();
                $table->string('imc')->nullable();
                $table->string('ip')->nullable();
                $table->string('pid')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('csis');
    }
}
