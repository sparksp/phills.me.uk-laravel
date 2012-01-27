<?php

use Snip\Snip;

Router::register('GET /snip', array('after' => 'layout', function()
{
	$snips = Snip::order_by('created', 'desc')->get(array('id', 'title'));

	// title: Snips
	return View::make('snip::list', array(
			'content' => $snips,
		));
}));

Router::register('POST /snip', array('before' => 'auth, csrf', 'after' => 'layout', 'do' => function()
{
	$snip = new Snip();
	$errors = $snip->validate();
	if (count($errors->all()) > 0)
	{
		// title: Create snip
		return View::make('snip::edit', array(
			'content' => $snip,
			'errors' => $errors
		));
	}
	else
	{
		$snip->save();
		return Redirect::to('snip/'.$snip->id)->with('message', 'Snip created.');
	}
}));

Router::register('GET /snip/(:num)', array('after' => 'layout', function($id)
{
	if ($snip = Snip::find($id))
	{
		// title: $snip->title
		return View::make('snip::show', array(
			'content' => $snip
		));
	}
	return Response::error(404);
}));

Router::register('PUT /snip/(:num)', array('before' => 'auth, csrf', 'after' => 'layout', 'do' => function($id)
{
	if ($snip = Snip::find($id))
	{
		$errors = $snip->validate();
		if (count($errors->all()) > 0)
		{
			// title: Edit: $snip->title
			return View::make('snip::edit', array(
				'content' => $snip,
				'errors' => $errors
			));
		}
		else
		{
			$snip->save();
			return Redirect::to('snip/'.$id)->with('message', 'Snip updated.');
		}
	}
	return Response::error(404);
}));

Router::register('GET /snip/(:num)/edit', array('before' => 'auth', 'after' => 'layout', 'do' => function($id)
{
	if ($snip = Snip::find($id))
	{
		// title: Edit: $snip->title
		return View::make('snip::edit', array(
			'content' => $snip
		));
	}
	return Response::error(404);
}));

Router::register('GET /snip/create', array('before' => 'auth', 'after' => 'layout', 'do' => function()
{
	// title: Create Snip
	return View::make('snip::edit', array(
		'content' => new Snip()
	));
}));

Router::register('GET /snip/(:num)/delete', array('before' => 'auth', 'after' => 'layout', 'do' => function($id)
{
	if ($snip = Snip::find($id))
	{
		// title: Delete: $snip->title
		return View::make('snip::delete', array(
			'content' => $snip
		));
	}
	return Response::error(404);
}));

Router::register('DELETE /snip/(:num)', array('before' => 'auth, csrf', 'after' => 'layout', 'do' => function($id)
{
	if ($snip = Snip::find($id))
	{
		$snip->delete();
		return Redirect::to('snip')->with('message', 'Snip deleted.');
	}
}));
