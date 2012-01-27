<?php Bundle::start('syntaxhighlighter'); ?>

<article>
	<h1><?php echo $content->title; ?></h1>
	<?php echo SyntaxHighlighter::highlight($content->body, $content->language); ?>
	<p class="about">Created by <?php echo HTML::link('user/'.$content->user->id, $content->user->name); ?> on <?php echo date('jS F Y', strtotime($content->created_at))?>.
		<?php if (substr($content->updated_at, 0, 10) > substr($content->created_at, 0, 10)): ?>
		Last updated on <?php echo date('jS F Y', strtotime($content->updated_at)); ?>.
		<?php endif; ?></p>
</article>