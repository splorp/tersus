<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<section class="sidebar" id="sidebar1">
	<ul>
	<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'sidebar2' ) ) :
	?>
		<li>
			<h2>Search</h2>
			<?php
				include ( TEMPLATEPATH . '/searchform.php' );
				/*
					get_search_form(); 

					Because we’ve added searchform.php to the theme, using
					the built-in function isn’t necessary. We’ve left the 
					syntax in place in case you prefer to use it instead.

					http://codex.wordpress.org/Function_Reference/get_search_form
				*/
			?>
		</li>

		<?php if ( is_404() || is_category() || is_day() || is_month() || is_year() || is_search() || is_paged() ) { ?>
			<li>

				<?php if (is_404()) { /* If this is a 404 page */ ?>

				<?php } elseif (is_category()) { /* If this is a category archive */ ?>
	
					<p>You are currently browsing the archives for the <strong>“<?php single_cat_title(''); ?>”</strong> category.</p>

				<?php } elseif (is_day()) { /* If this is a yearly archive */ ?>
					
					<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> archives for <strong><?php the_time('l, F jS, Y'); ?></strong>.</p>

				<?php } elseif (is_month()) { /* If this is a monthly archive */ ?>

					<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> archives for <strong><?php the_time('F, Y'); ?></strong>.</p>

				<?php } elseif (is_year()) { /* If this is a yearly archive */ ?>

					<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> archives for <strong><?php the_time('Y'); ?></strong>.</p>

				<?php } elseif (is_search()) { /* If this is a monthly archive */ ?>
					
					<p>You have searched the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> archives for <strong>“<?php the_search_query(); ?>”</strong>.</p>

				<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { /* Everything else */ ?>
					
					<p>You are currently browsing the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> archives.</p>

				<?php } ?>
			</li>
		<?php
			}
				// If this is the front page */
				if ( is_home() || is_page() ) {		
					wp_list_bookmarks();
		?>

			<li>
				<h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li>Valid <a href="http://validator.w3.org/check/referer" title="This page validates as HTML5"><abbr title="HyperText Markup Language">HTML5</abbr></a></li>
					<li>Valid <a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo bloginfo('stylesheet_url'); ?>" title="The stylesheet for this page validates as CSS"><abbr title="Cascading Style Sheets">CSS</abbr></a></li>
					<li>Valid <a href="http://validator.w3.org/feed/check.cgi?url=<?php echo bloginfo('rss_url'); ?>" title="The feed for this page validates as RSS"><abbr title="Really Simple Syndication">RSS</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<?php wp_meta(); ?>
				</ul>
			</li>
	
		<?php
			}
				endif;
		?>
	</ul>
</section>
			
<section class="sidebar" id="sidebar2">
	<ul>
	<?php
		// Used widgetized sidebar, if the plugin is installed
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'sidebar1' ) ) :

		// Display a list of pages
		wp_list_pages('title_li=<h2>Pages</h2>' );

		// Display a list of categories
		wp_list_categories('show_count=1&title_li=<h2>Categories</h2>');
		endif;
	?>
		<li><h2>Archives</h2>
			<ul>
				<?php
					// Display a list of monthly archives
					wp_get_archives('type=monthly');
				?>
			</ul>
		</li>
	</ul>
</section>