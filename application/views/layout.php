<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $head_title; ?></title>

	<?php echo HTML::style('css/main.css', array('media' => 'screen')); ?>

</head> 
<body>

	<div id="nav"> 
		<ul>
			<li><?php echo HTML::link_to_home('Home'); ?></li>
			<li><?php echo HTML::link_to_page('Static page'); ?></li>
			<li><?php echo HTML::link_to_secret('Secret page', array(), array('class' => 'secret')); ?></li>
 			<?php if (Auth::check()): ?>
 			<li><?php echo HTML::link_to_logout('Logout'); ?></li>
 			<?php else: ?>
 			<li><?php echo HTML::link_to_auth('Login'); ?></li>
 			<?php endif; ?>
		</ul> 
	</div> 

<?php echo $content; ?>
</body> 
</html>
