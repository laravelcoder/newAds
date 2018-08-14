<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1529612017PerChannelConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('per_channel_configurations')) {
            Schema::create('per_channel_configurations', function (Blueprint $table) {
                $table->increments('id');
                $table->string('cid')->nullable();
                $table->tinyInteger('active')->nullable()->default('1');
                $table->string('notify_channel_id')->nullable();
                $table->string('offset')->nullable();
                $table->string('ad_spacing')->nullable();
                
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
        Schema::dropIfExists('per_channel_configurations');
    }
}
