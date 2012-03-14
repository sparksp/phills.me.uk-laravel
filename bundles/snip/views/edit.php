<article>
<?php if($content->id): ?>
	<h1>Edit Snip</h1>
	<?php echo Form::open($content->uri(), 'PUT', array('class' => 'snip '.Form::TYPE_HORIZONTAL)); ?>
	<?php $cancel = HTML::link($content->url(), 'Cancel', array('class' => 'btn cancel'))?>
<?php else: ?>
	<h1>Create Snip</h1>
	<?php echo Form::open(URL::to_action('snips::home'), 'POST', array('class' => 'snip '.Form::TYPE_HORIZONTAL)); ?>
	<?php $cancel = HTML::link('snips', 'Cancel', array('class' => 'btn cancel'))?>
<?php endif; ?>
	<?php echo Form::token(); ?>
	
	<?php echo Form::field('text', 'title', 'Title', array(Input::old('title', $content->title)), array('error' => $errors->first('title'))); ?>
	<?php echo Form::field('textarea', 'description', 'Description', array(Input::old('description', $content->description), array('cols' => '')), array('error' => $errors->first('descripton'))); ?>
	<?php echo Form::field('textarea', 'body', 'Code', array(Input::old('body', $content->body), array('cols' => '')), array('error' => $errors->first('body'))); ?>
	<?php echo Form::field('select', 'language', 'Language', array(Snip\Model::language_options(), Input::old('language', $content->language)), array('error' => $errors->first('language'))); ?>
	<?php echo Form::field('text', 'tags', 'Tags', array(Input::old('tags', $content->tags)), array('error' => $errors->first('tags'))); ?>

	<?php echo Form::actions(array(
		Form::submit('Save', array('class' => 'primary')), $cancel,
	)); ?>

	<?php echo Form::close(); ?>
</article>
