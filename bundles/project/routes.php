<?php

Route::get('projects', array('after' => 'layout', function()
{
	$articles = array(
		array('title' => 'My Charnwood', 'image' => 'My-Charnwood-2012.png', 'summary' => array(
			HTML::image('bundles/project/img/by-cuttlefish.png', 'Developed by Cuttlefish'),
			'My Charnwood allows residents to search for information about their home and near by places of interest.',
			'Behind the scenes we import over 50 datasets from around 10 sources, each utilising different techniques.',
			'The data is broken down into textual information and mapable overlays and presented to the user through the "My Location" and "My Nearest" tabs.',
			'"My News &amp; Events" displays two feeds of news and events to the users based on their location.',
			'I have worked on 3 iterations of My Charnwood since starting at Cuttlefish.',
		), 'href' => 'http://my.charnwood.gov.uk/'),
		array('title' => 'High Adventure', 'image' => 'High-Adventure-2012.png', 'summary' => array(
			'High Adventure is an annual mountain exercise, taking place at a different, secret location each year.',
			'I joined the team in 2012 to develop a website that provides lots of useful information for participants before the event, and holds a record of past high adventures.',
			'The event has a strong Facebook following that we are keen to maintain; we have also added Twitter to the pool, automatically getting posts from the Facebook page.',
			'The design was inspired by the Scout Association website and customised to suit our needs.',
		), 'href' => 'http://high-adventure.org.uk/'),
		array('title' => 'Womble', 'image' => 'Womble.png', 'summary' => array(
			'Womble was a new event for 2012.  The website features some basic information about the activities and an online group booking form.',
			'The success of the online booking form will be carried forward to next year\'s High Adventure and other events, providing a consistent and flexible booking experience for both participants and organisers.',
			'The event has had a strong Facebook and Twitter presence from the start with design elements being shared with both, as much as possible.',
		), 'href' => 'http://womble.me.uk/'),
		array('title' => 'Pantheon (iPad)', 'image' => 'Pantheon.jpg', 'summary' => array(
			HTML::image('bundles/project/img/by-cuttlefish-app.png', 'App developed by Cuttlefish'),
			'This app was built for Pantheon\'s 2011 Annual Investor Meeting. Installed on strategically-placed iPads, it was used throughout the conference weekend to provide information to and gather feedback from attendees.</p>'.
			'<p>Features include:</p><ul>'.
				'<li>A 10 question survey</li>'.
				'<li>A short feedback form</li>'.
				'<li>A photo gallery, downloaded from the web on launch</li>'.
				'<li>A tabbed screen of event information</li>'.
				'<li>2 map screens with information points</li>'.
			'</ul>'.
			'<p>The app was written in JavaScript using the Appcelerator Titanium mobile SDK.</p>'.
			'<p>This app is not available in the AppStore.',
		)),
	);

	$category = new stdClass;
	$category->title = 'Projects';
	$category->intro = 'I have worked on many projects, here is a selection of the projects I have had a noticable impact on.';

	View::share('title', $category->title);

	return View::make('project::list', array(
		'articles' => $articles,
		'category' => $category,
	));
}));
