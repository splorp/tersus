<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>
<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<title><?php wp_title('&mdash;', true, 'right'); ?><?php bloginfo('name'); ?></title>
		<?php
			global $options;
			foreach ($options as $value) {
				if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
			}
		?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
		<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('stylesheet_directory'); ?>/style/img/apple-touch-icon-57x57-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('stylesheet_directory'); ?>/style/img//apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/style/img//apple-touch-icon-114x114-precomposed.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
		<!--[if IE]>
			<script src="<?php bloginfo('stylesheet_directory'); ?>/style/js/html5.js"></script>
		<![endif]-->
		
	</head>

	<body>
		<header>
			<?php if ($tersus_announcement_display == "1"): ?>
			<section id="announcement">
				<?php echo (stripslashes($tersus_announcement)); ?>
			</section>
			<?php endif; ?>
		
			<?php
				// Removed body_class() call from body element
				// We may want to revisit this at a later date
				// and provide a custom function which allows
				// page-level ids or classes instead
			?>
			
			<h1><a href="<?php echo get_option('home'); ?>/" title="Back to the home page"><?php bloginfo('name'); ?></a></h1>
			<p><?php bloginfo('description'); ?></p>
		</header>
		
		<?php if ($tersus_navigation_display == "1"): ?>
		<nav role="navigation">
			<?php
				$menuParameters = array(
				  'container'       => false,
				  'echo'            => false,
				  'items_wrap'      => '%3$s',
				  'depth'           => 0,
				);				
				echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
			?>
		</nav>
		<?php endif; ?>
