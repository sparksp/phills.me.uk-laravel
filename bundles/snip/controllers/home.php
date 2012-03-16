<?php

use Snip\Model as Snip;

/**
 * Default controller for snips.
 * 
 * @package   Snip
 * @category  Bundle
 * @author    Phill Sparks <me@phills.me.uk>
 * @copyright 2012 Phill Sparks
 * @license   MIT License <http://www.opensource.org/licenses/mit>
 */
class Snip_Home_Controller extends Base_Controller {

	public $restful = true;

	/**
	 * Setup the filters for the controller.
	 */
	public function __construct()
	{
		$this->filter('before', 'auth')->on('get')->only(array('new', 'edit'));
		$this->filter('before', 'auth')->on(array('post', 'put', 'delete'));
		$this->filter('before', 'csrf')->on(array('post', 'put', 'delete'));
	}

	/**
	 * GET /snips
	 * 
	 * Display a listing of all snips.
	 * 
	 * @return mixed
	 */
	public function get_index()
	{
		$snips = Snip::order_by('created', 'desc')->get(array('id', 'title'));

		View::share('title', 'Snips');
		return View::make('snip::list', array(
			'content' => $snips,
		));
	}

	/**
	 * POST /snips
	 * 
	 * Create a new snip and redirect to it, or redirect to the new form on error.
	 * 
	 * @return mixed
	 */
	public function post_index()
	{
		$snip = new Snip;
		$errors = $snip->validate();
		if (count($errors->all()) > 0)
		{
			// Redirect back to the form
			return Redirect::to_action('snip::home@new', array(), 303)
				->with_input()
				->with_errors($errors);
		}
		else
		{
			$snip->save();

			// True REST would return 201 (Created) here with a Location
			// header pointing to the new resource, however this is not a
			// redirect and so browsers won't follow the Location.
			return Redirect::to($snip->url(), 303)
				->with('message', 'Snip created.');
		}
	}

	/**
	 * GET /snips/new
	 * 
	 * Display a form to create a new snip.
	 * 
	 * @return mixed
	 */
	public function get_new()
	{
		View::share('title', 'Create Snip');
		$response = Response::view('snip::edit', array(
			'content' => new Snip
		));

		// A normal request to this form should return status 200 (OK),
		// however if we're redirected back here with errors then something
		// was wrong with the previous request so we'll use 400 (Bad Request)
		// to indicate this, despite this actual GET request being OK.
		if (Session::has('errors'))
		{
			$response->status = 400; // Bad Request
			$response->layout = true;
		}
		return $response;
	}

	/**
	 * GET /snips/(id)-(slug)
	 * 
	 * Show the detail for a snip.
	 * 
	 * @param  int  $id
	 * @param  string  $slug
	 * @return mixed
	 */
	public function get_detail($id, $slug = '')
	{
		if ($snip = Snip::find($id))
		{
			if ($snip->slug != $slug)
			{
				return Redirect::to_action('snip::home@detail', array($id, $snip->slug), 301);
			}
			else
			{
				View::share('title', $snip->title);

				return View::make('snip::show', array(
					'content' => $snip
				));
			}
		}
		return Response::error(404);
	}

	/**
	 * GET /snips/(id)
	 * 
	 * Redirects to the detail view for the snip.
	 * 
	 * @param  int  $id
	 * @return mixed
	 */
	public function get_show($id)
	{
		if ($snip = Snip::find($id))
		{
			return Redirect::to_action('snip::home@detail', array($id, $snip->slug), 301);
		}
		return Response::error(404);
	}

	/**
	 * PUT /snips/(id)
	 * 
	 * Updates a snip with the PUT data.
	 * 
	 * @param  int  $id
	 * @return mixed
	 */
	public function put_show($id)
	{
		if ($snip = Snip::find($id))
		{
			$errors = $snip->validate();
			if (count($errors->all()) > 0)
			{
				return Redirect::to_action('snip::home@edit', array($id), 303)
					->with_input()
					->with_errors($errors);
			}
			else
			{
				$snip->save();
				return Redirect::to($snip->url(), 303)
					->with('message', 'Snip updated.');
			}
		}
		// Use POST to create snips
		return Response::error(404);
	}

	/**
	 * DELETE /snips/(id)
	 * 
	 * Delete a snip, and redirect back to the snip index.
	 * 
	 * @param  int  $id
	 * @return mixed
	 */
	public function delete_show($id)
	{
		if ($snip = Snip::find($id))
		{
			$snip->delete();

			// True REST would return 204 (No Content) as an acknowledgement
			// that the action was performed and there is now no content.
			return Redirect::to('snips', 303)
				->with('message', 'Snip deleted.');
		}
		return Response::error(404);
	}

	/**
	 * GET /snips/(id)/edit
	 * 
	 * Display the edit form for a snip.
	 * 
	 * @param  int  $id
	 * @return mixed
	 */
	public function get_edit($id)
	{
		if ($snip = Snip::find($id))
		{
			View::share('title', 'Edit: '.$snip->title);
			$response = Response::view('snip::edit', array(
				'content' => $snip
			));

			// A normal request to this form should return status 200 (OK),
			// however if we're redirected back here with errors then something
			// was wrong with the previous request so we'll use 400 (Bad Request)
			// to indicate this, despite this actual GET request being OK.
			if (Session::has('errors'))
			{
				$response->status = 400; // Bad Request
				$response->layout = true;
			}
			return $response;
		}
		return Response::error(404);
	}

	/**
	 * GET /snips/(id)/delete
	 * 
	 * Display a delete confirmation form for a snip.
	 * 
	 * @param  int  $id
	 * @return mixed
	 */
	public function get_delete($id)
	{
		if ($snip = Snip::find($id))
		{
			View::share('title', 'Delete: '.$snip->title);
			$response = Response::view('snip::delete', array(
				'content' => $snip
			));

			// A normal request to this form should return status 200 (OK),
			// however if we're redirected back here with errors then something
			// was wrong with the previous request so we'll use 400 (Bad Request)
			// to indicate this, despite this actual GET request being OK.
			if (Session::has('errors'))
			{
				$response->status = 400; // Bad Request
				$response->layout = true;
			}
			return $response;
		}
		return Response::error(404);
	}

}