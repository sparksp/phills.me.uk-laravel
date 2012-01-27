<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<title><?php echo $title ? "$title - Phill Sparks" : "Phill Sparks: My design skills are black, white and orange"; ?></title>

	<meta name="author" content="Phill Sparks">
	<meta name="dcterms.rights" content="Copyright (c) Phill Sparks. All rights reserved.">
	<meta name="generator" content="Laravel/2.2.0-beta-1 (laravel.com)">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

	<link href="<?php echo URL::to_asset('favicon.ico'); ?>" type="image/x-icon" rel="shortcut icon">
	<link href="<?php echo URL::to_asset('css/phills.min.css'); ?>" rel="stylesheet" type="text/css">
	<?php echo Asset::styles(); ?>

	<style type="text/css"><?php echo \Laravel\Section::yield('styles'); ?></style>
	<?php echo Asset::scripts(); ?>

	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>

	<header><div class="container">
		<h1><a href="<?php echo URL::to("/"); ?>">Phill S<small>parks</small></a></h1>
		<nav><?php echo Menu\Menu::make(array('class' => 'menu'))
			->add("/about", "About")
			->get();
		?><ul class="social pull-right">
			<li class="delicious"><a href="http://delicious.com/P.Sparks" rel="me" title="Share with P.Sparks on Delicious">Delicious</a></li>
			<li class="facebook"><a href="http://facebook.com/sparks.phill" rel="me" title="Find Phill Sparks on Facebook">Facebook</a></li>
			<li class="flickr"><a href="http://flickr.com/photos/webmilk" rel="me" title="Find webmilk on Flickr">Flickr</a></li>
			<li class="lastfm"><a href="http://last.fm/user/WebMilk" rel="me" title="Last.fm">Last.fm</a></li>
			<li class="twitter"><a href="http://twitter.com/PhillSparks" rel="me" title="Follow @PhillSparks on Twitter">Twitter</a></li>
			<li class="youtube"><a href="http://youtube.com/user/PhillSparks" rel="me" title="Subscribe to PhillSparks on YouTube">YouTube</a></li>
		</ul></nav>
	</div></header>

	<?php echo Section::yield('breadcrumbs'); ?>

	<div id="body" class="container">
		<section>

		<?php if (Session::has('message')): ?>
			<div class="alert alert-info"><?php echo Session::get('message'); ?></div>
		<?php endif; ?>
		<?php if (Session::has('success')): ?>
			<div class="alert alert-success"><?php echo Session::get('success'); ?></div>
		<?php endif; ?>
		<?php if (Session::has('warning')): ?>
			<div class="alert alert-warning"><?php echo Session::get('warning'); ?></div>
		<?php endif; ?>
		<?php if (Session::has('error')): ?>
			<div class="alert alert-error"><?php echo Session::get('error'); ?></div>
		<?php endif; ?>
