<?php
	$articles = array(
		array('title' => 'My Charnwood', 'image' => 'My-Charnwood-2012.png', 'summary' => array(
			'My Charnwood allows residents to search for information about their home and near by places of interest.',
			'Behind the scenes we import over 50 datasets from around 10 sources, each utilising different techniques.',
			'The data is broken down into textual information and mapable overlays and presented to the user through the "My Location" and "My Nearest" tabs.',
			'"My News &amp; Events" displays two feeds of news and events to the users based on their location.',
			'I have worked on 3 iterations of My Charnwood since starting at Cuttlefish.',
			'Visit <a href="http://my.charnwood.gov.uk">my.charnwood.gov.uk</a>.',
		)),
		array('title' => 'High Adventure', 'image' => 'High-Adventure-2012.png', 'summary' => array(
			'High Adventure is an annual mountain exercise, taking place at a different, secret location each year.',
			'I joined the team in 2012 to develop a website that provides lots of useful information for participants before the event, and holds a record of past high adventures.',
			'The event has a strong Facebook following that we are keen to maintain; we have also added Twitter to the pool, automatically getting posts from the Facebook page.',
			'The design was inspired by the Scout Association website and customised to suit our needs.',
			'Visit <a href="http://high-adventure.org.uk/">high-adventure.org.uk</a>.',
		)),
		array('title' => 'Womble', 'image' => 'Womble.png', 'summary' => array(
			'Womble was a new event for 2012.  The website features some basic information about the activities and an online group booking form.',
			'The success of the online booking form will be carried forward to next year\'s High Adventure and other events, providing a consistent and flexible booking experience for both participants and organisers.',
			'The event has had a strong Facebook and Twitter presence from the start with design elements being shared with both, as much as possible.',
			'Visit <a href="http://womble.me.uk/">womble.me.uk</a>.',
		)),
	);
?>


<article>
	<header class="jumbotron subhead" id="overview">
		<h1>Web Projects</h1>
        <p class="lead">I have worked on many projects, here is a selection of the projects I have had a noticable impact on.</p>
	</header>	

<?php foreach ($articles as $article): ?>
	<section id="<?php echo Str::slug($article['title']); ?>">
		<div class="page-header">
			<h1><?php echo htmlspecialchars($article['title']); ?></h1>
		</div>
		<div class="row">
			<div class="span3">
				<p><?php echo implode('</p><p>', (array)$article['summary']); ?></p>
			</div>
			<div class="span9">
				<?php echo HTML::image(URL::to_asset('bundles/web/img/'.$article['image']), $article['title'], array('style' => 'width: 100%')); ?>
			</div>
		</div>
	</section>
<?php endforeach; ?>

</article>