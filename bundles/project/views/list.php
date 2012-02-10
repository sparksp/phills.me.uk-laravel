<article>
	<header class="jumbotron subhead" id="overview">
<?php if ($category): ?>
		<h1><?php echo $category->title ?: 'Projects'; ?></h1>
        <p class="lead"><?php echo $category->intro; ?></p>
<?php else: ?>
		<h1>Projects</h1>
<?php endif; ?>
	</header>	

<?php foreach ($articles as $article): ?>
	<section id="<?php echo Str::slug($article['title']); ?>">
		<div class="page-header">
			<h1><?php echo htmlspecialchars($article['title']); ?></h1>
		</div>
		<div class="row">
			<div class="span3">
				<p><?php echo implode('</p><p>', (array)$article['summary']); ?></p>
<?php if (isset($article['href'])): ?>
				<p>Visit <?php echo HTML::link($article['href'], parse_url($article['href'], PHP_URL_HOST)); ?></p>
<?php endif; ?>
			</div>
			<div class="span9">
				<?php echo HTML::image('bundles/project/img/'.$article['image'], $article['title'], array('style' => 'width: 100%')); ?>
			</div>
		</div>
	</section>
<?php endforeach; ?>

</article>