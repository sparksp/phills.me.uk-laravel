<article>
	<h1>Snips</h1>
	<ul>
	<?php foreach ($content as $row): ?>
		<li><?php echo HTML::link($row->url(), $row->title); ?></li>
	<?php endforeach ?>
	</ul>
</article>