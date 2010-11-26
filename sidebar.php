<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>
		<ul>
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			<li>
				<?php
					include ( TEMPLATEPATH . '/searchform.php' );
					/*
						get_search_form(); 

						Because we’ve added searchform.php to the theme, using
						get_search_form() isn't necessary here. But, in some
						cases it may make more sense to use the built-in function:

						http://codex.wordpress.org/Function_Reference/get_search_form
					*/
				?>
			</li>

			<?php if ( is_404() || is_category() || is_day() || is_month() ||
						is_year() || is_search() || is_paged() ) {
			?> <li>

			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>

			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for the day <?php the_time('l, F jS, Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for <?php the_time('F, Y'); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for the year <?php the_time('Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p>You have searched the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>You are currently browsing the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives.</p>

			<?php } ?>

			</li>
		<?php }?>
		</ul>
		
		<ul>
			<?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>
			<li><h2>Archives</h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>
			<?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>
		</ul>
		
		<ul>
			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
				<?php wp_list_bookmarks(); ?>

				<li>
					<h2>Meta</h2>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<li>Valid <a href="http://validator.w3.org/check/referer" title="This page validates as HTML5"><abbr title="HyperText Markup Language">HTML5</abbr></a></li>
						<li>Valid <a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo bloginfo('stylesheet_url'); ?>" title="The stylesheet for this page validates as CSS"><abbr title="Cascadign Style Sheets">CSS</abbr></a></li>
						<li>Valid <a href="http://validator.w3.org/feed/check.cgi?url=<?php echo bloginfo('rss_url'); ?>" title="The feed for this page validates as RSS"><abbr title="Really Simple Syndication">RSS</abbr></a></li>
						<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
						<?php wp_meta(); ?>
					</ul>
				</li>
			<?php } ?>

			<?php endif; ?>
		</ul>