<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentAreaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('content_areas', function($table)
        {
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->string('type');

            $table->foreign('type_id')
                  ->references('id')->on('page_types')
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
		Schema::drop('pages_content_areas');
	}

}
