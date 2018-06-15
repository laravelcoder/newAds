<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b2410281766cAgentContactCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('agent_contact_company')) {
            Schema::create('agent_contact_company', function (Blueprint $table) {
                $table->integer('agent_id')->unsigned()->nullable();
                $table->foreign('agent_id', 'fk_p_171264_171256_contac_5b2410281781c')->references('id')->on('agents')->onDelete('cascade');
                $table->integer('contact_company_id')->unsigned()->nullable();
                $table->foreign('contact_company_id', 'fk_p_171256_171264_agent__5b24102817912')->references('id')->on('contact_companies')->onDelete('cascade');
                
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
