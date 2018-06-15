<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b2410281cca6InternalNotificationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('internal_notification_user')) {
            Schema::create('internal_notification_user', function (Blueprint $table) {
                $table->integer('internal_notification_id')->unsigned()->nullable();
                $table->foreign('internal_notification_id', 'fk_p_171247_171234_user_i_5b2410281ce4c')->references('id')->on('internal_notifications')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_171234_171247_intern_5b2410281cf99')->references('id')->on('users')->onDelete('cascade');
                $table->timestamp("read_at")->nullable();
		$table->timestamp("created_at")->default(DB::raw("CURRENT_TIMESTAMP"));
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
        Schema::dropIfExists('internal_notification_user');
    }
}
