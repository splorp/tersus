<?php
/**
 * @package WordPress
 * @subpackage Simplicity
 */
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

	<body>
		<?php
			// Removed body_class() call from body element
			// We may want to revisit this at a later date
			// and provide a custom function which allows
			// page-level ids or classes instead
		?>
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<p><?php bloginfo('description'); ?></p>