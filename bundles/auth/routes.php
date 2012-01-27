<?php

/**
 * Auth Routes
 * 
 * **Note:** Remember to update application/config/auth.php
 */

Router::register('GET /auth/login', array('after' => 'layout', function()
{
	if ( ! Auth::check())
	{
		// GET /login is not Forbidden (403) and should be served with 
		// status 200, so we make a view of the form rather than serve
		// a Response::error.  The only difference is the status code.
		return View::make('auth::login');
	}
	else
	{
		return Redirect::to('')
			->with('message', '<strong>Log in:</strong> You are already logged in.');
	}
}));

Router::register('POST /auth/login', array('before' => 'csrf', 'after' => 'layout', function()
{
	if (Auth::attempt(Input::get('email'), Input::get('password'), Input::get('remember', 'no') == 'yes'))
	{
		$to = Input::has('from') ? URL::to(Input::get('from')) : URL::to('');

		return Redirect::to($to)->with('success', '<strong>Log in:</strong> Welcome to Womble!');
	}
	else
	{
		$errors = new Laravel\Messages;
		$errors->add('login', 'E-mail address or password are wrong, please try again.');
		$errors->add('email', 'Error');
		$errors->add('password', 'Error');

		$response = Response::make(View::make('auth::login', array(
				'errors' => $errors,
			))
		, 403);
		$response->layout = true;
		return $response;
	}
}));

Router::register('GET /auth/logout', function()
{
	$redirect = Redirect::to('');
	if (Auth::check())
	{
		Auth::logout();
		$redirect->with('success', '<strong>Log out:</strong> Goodbye, we\'ll miss you!');
	}
	return $redirect;
});
