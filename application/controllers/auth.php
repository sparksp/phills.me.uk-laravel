<?php

/**
 * The Auth Controller handles logging in and out.
 * 
 * @author    Phill Sparks <me@phills.me.uk>
 * @copyright 2012 Phill Sparks
 * @license   MIT License <http://www.opensource.org/licenses/mit>
 */
class Auth_Controller extends Base_Controller {

	public $restful = true;

	function __construct()
	{
		$this->filter('before', 'csrf')->on('post');
	}

	function get_login()
	{
		if ( ! Auth::check())
		{
			View::share('title', 'Login');

			$response = Response::view('auth/login');

			// GET /login should be served with status 200 (OK) unless we have
			// arrived here due to errors in completing the login form, in
			// which case we serve status 409 (Conflict) and tell the user
			// what is wrong.  Status 403 (Forbidden) is not appropriate since
			// the login page itself is not a protected resource.
			if (Session::has('errors'))
			{
				$response->status = 409;  // Conflict
				$response->layout = true;
			}
			return $response;
		}
		else
		{
			return Redirect::home()
				->with('message', '<strong>Log in:</strong> You are already logged in.');
		}
	}

	function post_login()
	{
		if (Auth::attempt(Input::get('email'), Input::get('password'), Input::get('remember', 'no') == 'yes'))
		{
			$to = Input::has('from') ? URL::to(Input::get('from')) : URL::home();

			return Redirect::to($to, 303)->with('success', '<strong>Log in:</strong> Welcome!');
		}
		else
		{
			$errors = new Laravel\Messages;
			// We do not reveal where the error is just highlight that there is an error.
			$errors->add('login', 'E-mail address or password are wrong, please try again.');
			$errors->add('email', 'Error');
			$errors->add('password', 'Error');

			// Redirect back to where they came from, or if we don't know to the login page
			$url = Input::has('from') ? Input::get('from') : URL::to_action('auth@login');
			return Redirect::to($url, 303) // See Other
				->with_input('except', array('password'))
				->with_errors($errors);
		}
	}

	function get_logout()
	{
		$redirect = Redirect::home();
		if (Auth::check())
		{
			Auth::logout();
			$redirect->with('success', '<strong>Log out:</strong> Goodbye, we\'ll miss you!');
		}
		return $redirect;
	}
	
}
