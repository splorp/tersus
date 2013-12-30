<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<aside id="sidebar-1">
	<ul>
	<?php
		// Sidebar widgets only appear if the plugin is installed and widgets are active
		if ( ! function_exists('dynamic_sidebar') || ! dynamic_sidebar('sidebar2') ) :

		// Otherwise insert default sidebar elements
	?>
		<li>
			<h2>Search</h2>
			<?php get_search_form(); ?>
		</li>

		<?php if ( is_404() || is_category() || is_tag() || is_day() || is_month() || is_year() || is_search() || is_paged() ) { ?>
			<li>

			<?php if (is_404()) { ?>

			<?php } elseif (is_category()) { ?>
				<p>You are browsing the <strong>&#8220;<?php single_cat_title(''); ?>&#8221;</strong> category archive.</p>

			<?php } elseif (is_tag()) { ?>
				<p>You are browsing the <strong>&#8220;<?php single_tag_title(''); ?>&#8221;</strong> tag archive.</p>

			<?php } elseif (is_day()) { ?>
				<p>You are browsing the <strong><?php the_time('l, F jS, Y'); ?></strong> archive.</p>

			<?php } elseif (is_month()) { ?>
				<p>You are browsing the <strong><?php the_time('F, Y'); ?></strong> archive.</p>

			<?php } elseif (is_year()) { ?>
				<p>You are browsing the <strong><?php the_time('Y'); ?></strong> archive.</p>

			<?php } elseif (is_search()) { ?>
				<p>You are browsing the search results for <strong>&#8220;<?php the_search_query(); ?>&#8221;</strong>.</p>

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
					<li>Valid <a href="http://validator.w3.org/check/referer" title="This page validates as HTML5"><abbr title="HyperText Markup Language">HTML5</abbr></a></li>
					<li>Valid <a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo bloginfo('stylesheet_url'); ?>" title="The stylesheet for this page validates as CSS"><abbr title="Cascading Style Sheets">CSS</abbr></a></li>
					<li>Valid <a href="http://validator.w3.org/feed/check.cgi?url=<?php bloginfo('rss2_url'); ?>" title="The feed for this page validates as RSS"><abbr title="Really Simple Syndication">RSS</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/" title="This site uses XFN markup"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
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

		// Sidebar widgets only appear if the plugin is installed and widgets are active
		if ( ! function_exists('dynamic_sidebar') || ! dynamic_sidebar('sidebar1') ) :

		// Otherwise insert default sidebar elements
		global $options;
		foreach ($options as $value) {
			if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] );
			}
		}
				
		// Display a list of pages
		if ($tersus_page_depth == "1") $depth = '0'; else $depth = '1';
		wp_list_pages('depth=' . $depth . '&title_li=<h2>Pages</h2>' );

		// Display a list of categories
		if ($tersus_category_count == "1") $category_count = '1'; else $category_count = '0';
		wp_list_categories('show_count=' . $category_count . '&title_li=<h2>Categories</h2>');
	?>
		<li><h2>Archives</h2>
			<ul>
			<?php
				// Display a list of monthly archives
				if ($tersus_archive_count == "1") $archive_count = '1'; else $archive_count = '0';
				wp_get_archives('show_post_count=' . $archive_count . '&type=monthly');
			?>
			</ul>
		</li>
	<?php
		endif;
	?>
	</ul>
</aside>