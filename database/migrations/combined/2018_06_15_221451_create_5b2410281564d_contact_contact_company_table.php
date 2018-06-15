<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create5b2410281564dContactContactCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('contact_contact_company')) {
            Schema::create('contact_contact_company', function (Blueprint $table) {
                $table->integer('contact_id')->unsigned()->nullable();
                $table->foreign('contact_id', 'fk_p_171257_171256_contac_5b241028158f6')->references('id')->on('contacts')->onDelete('cascade');
                $table->integer('contact_company_id')->unsigned()->nullable();
                $table->foreign('contact_company_id', 'fk_p_171256_171257_contac_5b241028159da')->references('id')->on('contact_companies')->onDelete('cascade');
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
        Schema::dropIfExists('contact_contact_company');
    }
}