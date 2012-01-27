<?php

/**
 * Create a new snips table.
 * 
 * @author  Phill Sparks <me@phills.me.uk>
 */
class Snip_Create_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('snips', function($table)
		{
			$table->create();

			// Columns
			$table->increments('id');
			$table->timestamps();
			$table->string('slug')->unique('index_snips_slug');
			$table->integer('user_id')->index('index_snips_user_id');
			$table->string('title');
			$table->string('description');
			$table->string('body');
			$table->string('language');
			$table->string('tags');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('snips', function($table)
		{
			// The table did not exist before we started so we can just drop it
			$table->drop();
		});
	}

}