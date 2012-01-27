<?php namespace User;

use Eloquent\Model as Eloquent;

/**
 * A basic user model.
 */
class User extends Eloquent {

	/**
	 * @var string
	 */
	public static $table = 'users';

}
