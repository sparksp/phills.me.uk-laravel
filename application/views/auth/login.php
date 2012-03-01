<article>
	<h1>Log in</h1>

	<?php echo Form::open(URL::to_action('auth@login'), 'POST', array('class' => Form::TYPE_HORIZONTAL)); ?>
	<?php echo Form::token(); ?>
	<?php echo Form::hidden('from', Input::get('from', Request::uri() === 'auth/login' ? '' : Request::uri())); ?>

	<?php if ($errors->has('login')): ?>
		<?php echo $errors->first('login', '<div class="alert alert-error">:message</div>'); ?>
	<?php endif; ?>

	<?php echo Form::field('email', 'email', 'E-mail Address', array(Input::get('email')), array('error' => $errors->has('email'))); ?>
	<?php echo Form::field('password', 'password', 'Password', array(), array('error' => $errors->has('password'))); ?>
	<?php echo Form::field('labelled_checkbox', 'remember', '', array('Use a '.HTML::link('cookies', 'cookie', array('title' => 'Find out more about the cookies we use and how to delete them', 'rel' => 'twipsy', 'target' => '_blank')).' to remember my details', 'yes')); ?>

	<?php echo Form::actions(Form::submit("Log in", array('class' => 'primary'))); ?>

	<?php echo Form::close(); ?>
</article>