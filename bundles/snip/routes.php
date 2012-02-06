<?php

use Snip\Model as Snip;

Router::register('GET /snips', array('after' => 'layout', function()
{
	$snips = Snip::order_by('created', 'desc')->get(array('id', 'title'));

	View::share('title', 'Snips');
	return View::make('snip::list', array(
		'content' => $snips,
	));
}));

Router::register('GET /snips/snip-new', array('before' => 'auth', 'after' => 'layout', 'do' => function()
{
	View::share('title', 'Create Snip');
	return View::make('snip::edit', array(
		'content' => new Snip()
	));
}));

Router::register('POST /snips', array('before' => 'auth|csrf', 'after' => 'layout', 'do' => function()
{
	$snip = new Snip();
	$errors = $snip->validate();
	if (count($errors->all()) > 0)
	{
		View::share('title', 'Create snip');
		return View::make('snip::edit', array(
			'content' => $snip,
			'errors' => $errors
		));
	}
	else
	{
		$snip->save();
		return Redirect::to($snip->url())->with('message', 'Snip created.');
	}
}));

Router::register('GET /snips/snip-(:num)-(:any)', array('before' => 'snip::check-url', 'after' => 'layout', function($id, $title = '')
{
	$snip = Snip::find($id);
	View::share('title', $snip->title);

	return View::make('snip::show', array(
		'content' => $snip
	));
}));

Router::register('GET /snips/snip-(:num)/edit', array('before' => 'auth', 'after' => 'layout', 'do' => function($id)
{
	if ($snip = Snip::find($id))
	{
		View::share('title', 'Edit: '.$snip->title);
		return View::make('snip::edit', array(
			'content' => $snip
		));
	}
	return Response::error(404);
}));

Router::register('PUT /snips/snip-(:num)', array('before' => 'auth|csrf', 'after' => 'layout', 'do' => function($id)
{
	if ($snip = Snip::find($id))
	{
		$errors = $snip->validate();
		if (count($errors->all()) > 0)
		{
			View::share('title', 'Edit: '.$snip->title);
			return View::make('snip::edit', array(
				'content' => $snip,
				'errors' => $errors
			));
		}
		else
		{
			$snip->save();
			return Redirect::to($snip->url())->with('message', 'Snip updated.');
		}
	}
	// Use POST to create snips
	return Response::error(404);
}));

Router::register('GET /snips/snip-(:num)/delete', array('before' => 'auth', 'after' => 'layout', 'do' => function($id)
{
	if ($snip = Snip::find($id))
	{
		View::share('title', 'Delete: '.$snip->title);
		return View::make('snip::delete', array(
			'content' => $snip
		));
	}
	return Response::error(404);
}));

Router::register('DELETE /snips/snip-(:num)', array('before' => 'auth|csrf', 'after' => 'layout', 'do' => function($id)
{
	if ($snip = Snip::find($id))
	{
		$snip->delete();
		return Redirect::to('snips')->with('message', 'Snip deleted.');
	}
	return Response::error(404);
}));


// Redirect routes
Router::register(array(
	'GET /snips/(:num)',
	'GET /snips/snip-(:num)',
), array('before' => 'snip::check-url'));


// Check URL Filter
Filter::register('snip::check-url', function()
{
	list($id, $title) = Request::route()->parameters;
	
	if ($snip = Snip::find($id))
	{
		$slug = Str::slug($snip->title, '-');

		if ($title !== $slug)
		{
			return Redirect::to($snip->url());
		}
	}
	else
	{
		return Response::error(404);
	}
});


