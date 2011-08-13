	<div id="header">
		<h1 class="laravel">Authentication stuff</h1>
	</div>

	<div id="wrapper">
		<h2>Login starts here</h2>

		<?php if ($error): ?>
		<p>
			User name or password incorrect.
		</p>
		<?php endif; ?>

		<?php echo Form::open(); ?>

			<?php echo Form::token(); ?>

			<?php echo Form::label('username', 'User name'); ?>
			<br />
			<?php echo Form::text('username'); ?>

			<br />

			<?php echo Form::label('password', 'Password'); ?>
			<br />
			<?php echo Form::password('password'); ?>

			<br />

			<?php echo  Form::submit('Login'); ?>

		<?php echo Form::close(); ?>
		
		<p>
			Or <a href="<?php echo URL::to_register(); ?>">register</a>.
		</p>

	</div>
