<article>
<?php if($content->id): ?>
	<h1>Edit Snip</h1>
	<?php echo Form::open(URL::to('snip/'.$content->id), 'PUT', array('class' => 'snip '.Form::TYPE_HORIZONTAL)); ?>
	<?php $cancel = HTML::link('snip/'.$content->id, 'Cancel', array('class' => 'btn cancel'))?>
<?php else: ?>
	<h1>Create Snip</h1>
	<?php echo Form::open(URL::to('snip'), 'POST', array('class' => 'snip '.Form::TYPE_HORIZONTAL)); ?>
	<?php $cancel = HTML::link('snip', 'Cancel', array('class' => 'btn cancel'))?>
<?php endif; ?>
	<?php echo Form::token(); ?>
	
	<?php echo Form::field('text', 'title', 'Title', array(Input::get('title', $content->title)), array('error' => $errors->first('title'))); ?>
	<?php echo Form::field('textarea', 'description', 'Description', array(Input::get('description', $content->description), array('cols' => '')), array('error' => $errors->first('descripton'))); ?>
	<?php echo Form::field('textarea', 'body', 'Code', array(Input::get('body', $content->body), array('cols' => '')), array('error' => $errors->first('body'))); ?>
	<?php echo Form::field('select', 'language', 'Language', array(Snip\Snip::language_options(), Input::get('language', $content->language)), array('error' => $errors->first('language'))); ?>
	<?php echo Form::field('text', 'tags', 'Tags', array(Input::get('tags', $content->tags)), array('error' => $errors->first('tags'))); ?>

	<?php echo Form::actions(array(
		Form::submit('Save', array('class' => 'primary')), $cancel,
	)); ?>

	<?php echo Form::close(); ?>
</article>
