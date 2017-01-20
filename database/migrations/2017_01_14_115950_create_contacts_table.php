<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('name');
                        $table->string('email')->unique();
                        $table->string('phone')->unique();
                        $table->integer('category_id')->unsigned();
			$table->timestamps();
                        
                        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contacts');
	}

}
