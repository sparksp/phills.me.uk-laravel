<?php

Router::register('GET /web', array('after' => 'layout', function()
{
	return View::make('web::list');
}));
