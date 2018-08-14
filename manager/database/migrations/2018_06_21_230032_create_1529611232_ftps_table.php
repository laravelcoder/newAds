<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1529611232FtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('ftps')) {
            Schema::create('ftps', function (Blueprint $table) {
                $table->increments('id');
                $table->string('ftp_server')->nullable();
                $table->string('ftp_directory')->nullable();
                $table->string('ftp_username')->nullable();
                $table->string('ftp_password')->nullable();
                
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
        Schema::dropIfExists('ftps');
    }
}
