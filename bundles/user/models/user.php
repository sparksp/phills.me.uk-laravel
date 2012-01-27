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

	/**
	 * Gets a query object of this user's snips.
	 * 
	 * @return Laravel\Database\Query
	 */
	public function snip()
	{
		return $this->has_many('Snip\\Snip')
			// "collate" is SQLite
			->order_by('title', 'collate nocase asc');
	}
}
