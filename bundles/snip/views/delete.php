<article>
	<h1>Delete Snip</h1>
	<?php echo Form::open(URL::to('snip/'.$content->id), 'DELETE', array('class' => 'snip')); ?>
	<?php echo Form::token(); ?>
	
	<p>Are you sure you want to delete <strong><?php echo HTML::entities($content->title); ?></strong>?</p>
	
	<?php echo Form::actions(array(
		Form::submit('Delete', array('class' => 'danger')),
		HTML::link('snip/'.$content->id, 'Cancel', array('class' => 'btn cancel')),
	)); ?>
	
	<?php echo Form::close(); ?>
</article>
