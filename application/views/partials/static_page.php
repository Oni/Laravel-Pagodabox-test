	<div id="header">
		<h1 class="laravel">My static page</h1>
	</div>

	<div id="wrapper">
		<h2>Yes, I'm mostly static</h2>

		<p>My cool text goes here.</p>

		<p>
			And look at these images:
			<?php echo HTML::image('img/warn.png', 'Warning Icon!'); ?>
			<a href="<?php echo URL::to_home(); ?>"><?php echo HTML::image('img/warn.png', 'Warning Icon!'); ?></a>
			(testing images).
		</p>
		
		<p>
			Oh, and look at this email:
			<?php echo HTML::email('example@test.com'); ?>
			(testing email obfuscation).
		</p>
	</div>
