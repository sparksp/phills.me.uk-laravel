
	</div>

	<footer class="mastfoot container" id="bottom">
		<p class="pull-right"><a href="#">Back to top</a></p>
<?php if (count($_COOKIE)): ?>
		<p class="pull-right"><?php echo HTML::link('cookies', 'Read about how we use cookies'); ?>.</p>
<?php endif; ?>
		<p>
			&copy; <a href="http://phills.me.uk/" class="fn url">Phill Sparks</a>.
			Web Hosting by <a class="fn org url" rel="external" href="http://www.site5.com/in.php?id=51960">Site5</a>.
			Developed with <a href="http://laravel.com">Laravel</a>.
		</p>
	</footer>

	<?php echo Asset::container('footer')->scripts(); ?>

</body>
</html>
