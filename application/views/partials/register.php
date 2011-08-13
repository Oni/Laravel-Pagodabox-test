	<div id="header">
		<h1 class="laravel">Authentication stuff</h1>
	</div>

	<div id="wrapper">
		<h2>Register</h2>

		<?php echo Form::open(); ?>

			<?php echo Form::token(); ?>

			<?php if ($error_username): ?>
			<p>
				<?php echo $error_username; ?>
			</p>
			<?php endif; ?>

			<?php echo Form::label('username', 'User name'); ?>
			<br />
			<?php echo Form::text('username'); ?>

			<br />

			<?php if ($error_email): ?>
			<p>
				<?php echo $error_email; ?>
			</p>
			<?php endif; ?>

			<?php echo Form::label('email', 'E-mail'); ?>
			<br />
			<?php echo Form::text('email'); ?>

			<br />

			<?php if ($error_password): ?>
			<p>
				<?php echo $error_password; ?>
			</p>
			<?php endif; ?>

			<?php echo Form::label('password', 'Password'); ?>
			<br />
			<?php echo Form::password('password'); ?>

			<br />

			<?php echo Form::label('password_confirmation', 'Type the Password again'); ?>
			<br />
			<?php echo Form::password('password_confirmation'); ?>

			<br />

			<?php echo  Form::submit('Register'); ?>

		<?php echo Form::close(); ?>

	</div>
