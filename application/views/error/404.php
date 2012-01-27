<?php echo View::make('layout.header', array('title' => 'Not Found'))->render(); ?>

	<h1>Not Found <small>Error 404</small></h1>

	<h2>What does this mean?</h2>

	<p>
		We couldn't find the page you requested on our servers. We're really sorry
		about that. It's our fault, not yours. We'll work hard to get this page
		back online as soon as possible.
	</p>

	<p>
		Perhaps you would like to go to our <?php echo HTML::link('/', 'home page'); ?>?
	</p>

<?php echo View::make('layout.footer')->render(); ?>