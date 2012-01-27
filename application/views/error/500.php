<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Internal Server Error - Phill Sparks</title>

	<meta name="author" content="Phill Sparks">
	<meta name="copyright" content="Copyright (c) Leicestershire County Scout Council. All rights reserved.">
	<meta name="generator" content="Laravel/2.0.4 (laravel.com)">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

	<link href="<?php echo URL::to_asset('favicon.ico'); ?>" type="image/x-icon" rel="shortcut icon">
	<link href="<?php echo URL::to_asset('css/phills.css'); ?>" rel="stylesheet" type="text/css">

	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>

	<header><div class="container">
		<h1><a href="<?php echo URL::to("/"); ?>">Phill S<small>parks</small></a></h1>
	</div></header>

	<div class="container">
		<section>

			<h1>Internal Server Error <small>Error 500</small></h1>

			<h2>What does this mean?</h2>

			<p>
				Something went wrong on our servers while we were processing your request.
				We're really sorry about this, and will work hard to get this resolved as
				soon as possible.
			</p>

			<p>
				Perhaps you would like to go to our <?php echo HTML::link('/', 'home page'); ?>?
			</p>

		</section>
	</div>

	<footer class="footer container" id="bottom">
		<p class="pull-right"><a href="#">Back to top</a></p>
		<p>
			&copy; <a href="http://phills.me.uk/" class="fn url">Phill Sparks</a>. All rights reserved.

			Made by <a href="http://phills.me.uk">Phill Sparks</a>.
			Powered by <a href="http://laravel.com">Laravel</a>.
		</p>
	</footer>
</body>
</html>
