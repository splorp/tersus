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
		<?php
			global $options;
			foreach ($options as $value) {
				if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); }
			}
		?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
		<!-- iPhone non-Retina icon -->
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/style/img/apple-touch-icon-57x57-precomposed.png" />
		<!-- iPad non-Retina icon -->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/style/img/apple-touch-icon-72x72-precomposed.png" />
		<!-- iPad non-Retina icon (iOS 7+) -->
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/style/img/apple-touch-icon-76x76-precomposed.png" />
		<!-- iPhone Retina icon -->
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/style/img/apple-touch-icon-114x114-precomposed.png" />
		<!-- iPhone Retina icon (iOS 7+) -->
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/style/img/apple-touch-icon-120x120-precomposed.png" />
		<!-- iPad Retina icon -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/style/img/apple-touch-icon-144x144-precomposed.png" />
		<!-- iPad Retina icon (iOS 7+) -->
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/style/img/apple-touch-icon-152x152-precomposed.png" />
		<!-- Windows 8 pinned site tile -->
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/style/img/msapplication-tileimage-144x144.png" />
		<meta name="msapplication-TileColor" content="#bfbfbf" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--[if (lt IE 9) & (!IEMobile 7)]>
			<script src="<?php echo get_stylesheet_directory_uri(); ?>/style/js/html5.js"></script>
		<![endif]-->

		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<header>
			<?php if ($tersus_announcement_display == "1"): ?>
			<section id="announcement">
				<?php echo (stripslashes($tersus_announcement)); ?>
			</section>
			<?php endif; ?>			
			<h1><a href="<?php echo home_url(); ?>/" title="Back to the home page"><?php bloginfo('name'); ?></a></h1>
			<p><?php bloginfo('description'); ?></p>
		</header>
		
		<?php if ($tersus_navigation_display == "1"): ?>
		<nav role="navigation">
			<?php
				$menuParameters = array(
				  'container'       => false,
				  'echo'            => true,
				  'items_wrap'      => '<ul>%3$s</ul>',
				  'depth'           => 0,
				  'fallback_cb'		=> false,
				);				
				echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
			?>
		</nav>
		<?php endif; ?>
