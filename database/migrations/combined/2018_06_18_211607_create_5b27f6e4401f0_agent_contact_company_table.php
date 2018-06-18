<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create5b27f6e4401f0AgentContactCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('agent_contact_company')) {
            Schema::create('agent_contact_company', function (Blueprint $table) {
                $table->integer('agent_id')->unsigned()->nullable();
                $table->foreign('agent_id', 'fk_p_171264_171256_contac_5b27f6e4403ce')->references('id')->on('agents')->onDelete('cascade');
                $table->integer('contact_company_id')->unsigned()->nullable();
                $table->foreign('contact_company_id', 'fk_p_171256_171264_agent__5b27f6e4404f7')->references('id')->on('contact_companies')->onDelete('cascade');
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
        Schema::dropIfExists('agent_contact_company');
    }
}
