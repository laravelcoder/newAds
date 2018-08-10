<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1533925643AlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('alerts')) {
            Schema::create('alerts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->nullable();
                $table->text('content')->nullable();
                $table->enum('alert_type', array('alert-danger', 'alert-info', 'alert-warning', 'alert-success', 'alert-default', 'alert-plain'))->nullable();
                
                $table->timestamps();
                
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
        Schema::dropIfExists('alerts');
    }
}
