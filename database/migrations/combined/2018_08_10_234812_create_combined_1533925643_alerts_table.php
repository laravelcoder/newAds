<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCombined1533925643AlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('alerts')) {
            Schema::create('alerts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->nullable();
                $table->text('content')->nullable();
                $table->enum('alert_type', ['alert-danger', 'alert-info', 'alert-warning', 'alert-success', 'alert-default', 'alert-plain'])->nullable();

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
