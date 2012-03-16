<?php namespace User;

use Eloquent\Model as Eloquent;

/**
 * A basic user model.
 * 
 * @package   User
 * @category  Bundle
 * @author    Phill Sparks <me@phills.me.uk>
 * @copyright 2012 Phill Sparks
 * @license   MIT License <http://www.opensource.org/licenses/mit>
 */
class Model extends Eloquent {

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
