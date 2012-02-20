<?php

use Snip\Model as Snip;

Route::get('snips', function()
{
	$snips = Snip::order_by('created', 'desc')->get(array('id', 'title'));

	View::share('title', 'Snips');
	return View::make('snip::list', array(
		'content' => $snips,
	));
});

Route::get('snips/snip-new', array('before' => 'auth', 'do' => function()
{
	View::share('title', 'Create Snip');
	return View::make('snip::edit', array(
		'content' => new Snip()
	));
}));

Route::post('snips', array('before' => 'auth|csrf', 'do' => function()
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

Route::get('snips/snip-(:num)-(:any)', array('before' => 'snip::check-url', function($id, $title = '')
{
	$snip = Snip::find($id);
	View::share('title', $snip->title);

	return View::make('snip::show', array(
		'content' => $snip
	));
}));

Route::get('snips/snip-(:num)/edit', array('before' => 'auth', 'do' => function($id)
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

Route::put('snips/snip-(:num)', array('before' => 'auth|csrf', 'do' => function($id)
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

Route::get('snips/snip-(:num)/delete', array('before' => 'auth', 'do' => function($id)
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

Route::delete('snips/snip-(:num)', array('before' => 'auth|csrf', 'do' => function($id)
{
	if ($snip = Snip::find($id))
	{
		$snip->delete();
		return Redirect::to('snips')->with('message', 'Snip deleted.');
	}
	return Response::error(404);
}));


// Redirect routes
Route::get(array(
	'snips/(:num)',
	'snips/snip-(:num)',
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


