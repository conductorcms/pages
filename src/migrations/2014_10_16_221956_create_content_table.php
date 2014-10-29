<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_content', function($table)
        {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->integer('content_area_id')->unsigned();
            $table->string('body');

            $table->foreign('page_id')
                  ->references('id')->on('pages')
                  ->onDelete('cascade');

            $table->foreign('content_area_id')
                  ->references('id')->on('content_areas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages_content');
    }

}
