<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b2410281e99cAdCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('ad_category')) {
            Schema::create('ad_category', function (Blueprint $table) {
                $table->integer('ad_id')->unsigned()->nullable();
                $table->foreign('ad_id', 'fk_p_171266_172406_catego_5b2410281eaef')->references('id')->on('ads')->onDelete('cascade');
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id', 'fk_p_172406_171266_ad_cat_5b2410281ebb6')->references('id')->on('categories')->onDelete('cascade');
                
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
        Schema::dropIfExists('ad_category');
    }
}
