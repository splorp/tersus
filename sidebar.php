<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<aside id="sidebar-1">
	<ul>
	<?php

		// If no widgets are active, insert default sidebar elements
		if ( ! function_exists('dynamic_sidebar') || ! dynamic_sidebar('Sidebar 1') ) :

	?>
		<li>
			<h2>Search</h2>
			<?php get_search_form(); ?>
		</li>

		<?php if ( is_404() || is_category() || is_tag() || is_day() || is_month() || is_year() || is_search() || is_paged() ) { ?>
			<li>

			<?php if (is_404()) { ?>

			<?php } elseif (is_category()) { ?>
				<p>You are browsing the <strong>“<?php single_cat_title(''); ?>”</strong> category archive.</p>

			<?php } elseif (is_tag()) { ?>
				<p>You are browsing the <strong>“<?php single_tag_title(''); ?>”</strong> tag archive.</p>

			<?php } elseif (is_day()) { ?>
				<p>You are browsing the <strong><?php the_time('l, F jS, Y'); ?></strong> archive.</p>

			<?php } elseif (is_month()) { ?>
				<p>You are browsing the <strong><?php the_time('F, Y'); ?></strong> archive.</p>

			<?php } elseif (is_year()) { ?>
				<p>You are browsing the <strong><?php the_time('Y'); ?></strong> archive.</p>

			<?php } elseif (is_search()) { ?>
				<p>You are browsing the search results for <strong>“<?php the_search_query(); ?>”</strong>.</p>

			<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<p>You are browsing the archive.</p>

			<?php } ?>
			</li>
		<?php
			}

			if ( is_home() || is_page() ) {
				wp_list_bookmarks();
		?>
			<li>
				<h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li>Valid <a href="https://validator.w3.org/nu/?doc=<?php echo esc_url(home_url()); ?>" title="This page validates as HTML5"><abbr title="HyperText Markup Language">HTML5</abbr></a></li>
					<li>Valid <a href="https://jigsaw.w3.org/css-validator/validator?uri=<?php echo esc_url(get_stylesheet_uri()); ?>" title="The stylesheet for this page validates as CSS"><abbr title="Cascading Style Sheets">CSS</abbr></a></li>
					<li>Valid <a href="https://validator.w3.org/feed/check.cgi?url=<?php esc_url(bloginfo('rss2_url')); ?>" title="The feed for this page validates as RSS"><abbr title="Really Simple Syndication">RSS</abbr></a></li>
					<li><a href="https://gmpg.org/xfn/" title="This site uses XFN markup"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

		<?php
			}
			endif;
		?>
	</ul>
</aside>

<aside id="sidebar-2">
	<ul>
	<?php

		// If no widgets are active, insert default sidebar elements
		if ( ! function_exists('dynamic_sidebar') || ! dynamic_sidebar('Sidebar 2') ) :

		// Display a list of pages
		if (get_option('tersus_page_depth') == "1") $depth = '0'; else $depth = '1';
		wp_list_pages('depth=' . $depth . '&title_li=<h2>Pages</h2>' );

		// Display a list of categories
		if (get_option('tersus_category_count') == "1") $category_count = '1'; else $category_count = '0';
		wp_list_categories('show_count=' . $category_count . '&title_li=<h2>Categories</h2>');
	?>
		<li><h2>Archives</h2>
			<ul>
			<?php
				// Display a list of monthly archives
				if (get_option('tersus_archive_count') == "1") $archive_count = '1'; else $archive_count = '0';
				wp_get_archives('show_post_count=' . $archive_count . '&type=monthly');
			?>
			</ul>
		</li>
	<?php
		endif;
	?>
	</ul>
</aside>
