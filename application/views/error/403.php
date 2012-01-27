<?php echo View::make('layout.header', array('title' => Auth::guest() ? 'Log in' : 'Forbidden'))->render(); ?>
<?php if (Auth::guest()): ?>
	<?php echo View::make('auth::login')->render(); ?>
<?php else: ?>
<article>
	<h1>Forbidden <small>Error 403</small></h1>

	<h2>What does this mean?</h2>

	<p>
		We couldn't find the page you requested on our servers. We're really sorry
		about that. It's our fault, not yours. We'll work hard to get this page
		back online as soon as possible.
	</p>

	<p>
		Perhaps you would like to go to our <?php echo HTML::link('/', 'home page'); ?>?
	</p>
</article>
<?php endif; ?>
<?php echo View::make('layout.footer')->render(); ?>