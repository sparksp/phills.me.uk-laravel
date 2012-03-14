<article>
	<h1>Delete Snip</h1>
	<?php echo Form::open($content->uri(), 'DELETE', array('class' => 'snip')); ?>
	<?php echo Form::token(); ?>
	
	<p>Are you sure you want to delete <strong><?php echo HTML::entities($content->title); ?></strong>?</p>
	
	<?php echo Form::actions(array(
		Form::submit('Delete', array('class' => 'danger')),
		HTML::link($content->url(), 'Cancel', array('class' => 'btn cancel')),
	)); ?>
	
	<?php echo Form::close(); ?>
</article>
