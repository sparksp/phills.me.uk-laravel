<?php

/**
 * Create a new users table.
 * 
 * @author  Phill Sparks <me@phills.me.uk>
 */
class User_Create_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('email')->unique('index_user_email');
			$table->string('name');
			$table->string('password')->length(60);
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{
			$table->drop();
		});
	}

}