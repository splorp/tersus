<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<title><?php wp_title('&mdash;', true, 'right'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
	<?php
		if (function_exists('wp_body_open')) {
		wp_body_open();
		}
	?>
		<header>
			<?php if (get_option('tersus_announcement_display') == "1"): ?>
			<section id="announcement">
			<?php
				$tersus_announcement = get_option('tersus_announcement');
				echo (stripslashes($tersus_announcement));
			?>
			</section>
			<?php endif; ?>			
			<h1><a href="<?php echo esc_url(home_url()); ?>/" title="Back to the home page"><?php bloginfo('name'); ?></a></h1>
			<p><?php bloginfo('description'); ?></p>
		</header>
		
		<?php if (get_option('tersus_navigation_display') == "1"): ?>
		<nav role="navigation">
			<?php
				echo strip_tags(wp_nav_menu(array(
					'container'      => false,
					'echo'           => true,
					'items_wrap'     => '<ul>%3$s</ul>',
					'depth'          => 0,
					'fallback_cb'    => false,
					'theme_location' => 'header-menu',
				)), '<a>' );
			?>
		</nav>
		<?php endif; ?>
