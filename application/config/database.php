<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Database Query Logging
	|--------------------------------------------------------------------------
	|
	| By default, the SQL, bindings, and execution time are logged in an array
	| for you to review. They can be retrieved via the DB::profile() method.
	| However, in some situations, you may want to disable logging for
	| ultra high-volume database work. You can do so here.
	|
	*/

	'profile' => true,

	/*
	|--------------------------------------------------------------------------
	| Default Database Connection
	|--------------------------------------------------------------------------
	|
	| The name of your default database connection. This connection will used
	| as the default for all database operations unless a different name is
	| given when performing said operation. This connection name should be
	| listed in the array of connections below.
	|
	*/

	'default' => 'sqlite',

	/*
	|--------------------------------------------------------------------------
	| Database Connections
	|--------------------------------------------------------------------------
	|
	| All of the database connections used by your application. Many of your
	| applications will no doubt only use one connection; however, you have
	| the freedom to specify as many connections as you can handle.
	|
	| All database work in Laravel is done through the PHP's PDO facilities,
	| so make sure you have the PDO drivers for your particlar database of
	| choice installed on your machine.
	|
	| Drivers: 'mysql', 'pgsql', 'sqlsrv', 'sqlite'.
	|
	*/

	'connections' => array(

		'sqlite' => array(
			'driver'   => 'sqlite',
			'database' => 'application',
		),

	),

);