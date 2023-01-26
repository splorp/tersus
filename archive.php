<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

<section id="content">
<?php if (have_posts()) :
	if (is_category()) { ?>
		<h2>Category: “<?php single_cat_title(); ?>” category</h2>
	<?php } elseif( is_tag() ) { ?>
		<h2>Tag: “<?php single_tag_title(); ?>”</h2>
	<?php } elseif (is_day()) { ?>
		<h2>Archive: <?php the_time('F jS, Y'); ?></h2>
	<?php } elseif (is_month()) { ?>
		<h2>Archive: <?php the_time('F, Y'); ?></h2>
	<?php } elseif (is_year()) { ?>
		<h2>Archive: <?php the_time('Y'); ?></h2>
	<?php } elseif (is_author()) { ?>
		<h2>Author:</h2>
	<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2>Archives</h2>
	<?php } ?>

	<?php while (have_posts()) : the_post(); ?>

	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<p class="published" title="<?php the_time('c') ?>"><?php the_time(get_option('date_format')); ?></p>
		<h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to <?php if(the_title( '', '', false ) !='') the_title_attribute(array('before' => '“','after' => '”')); else echo 'this post.';?>"><?php if(the_title( '', '', false ) !='') the_title(); else echo 'Untitled';?></a></h3>
		<?php the_excerpt(); ?>
		<p class="meta">This item was posted by <span class="vcard author"><cite class="fn"><a class="url" href="<?php the_author_meta('user_url') ?>" title="Visit the author’s site"><?php the_author_meta('display_name'); ?></a></cite></span>.</p>
		<?php edit_post_link('Edit', '<p>', '</p>'); ?>
	</article>

	<?php endwhile; ?>

	<?php if (show_posts_link_nav()): ?>
		<nav><?php next_posts_link('Older Posts'); delim_posts_link(); previous_posts_link('Newer Posts') ?></nav>
	<?php endif; ?>

	<?php else :
		if ( is_category() ) {
			printf("<h2>Sorry, but there aren’t any posts in the %s category yet.</h2>", single_cat_title('',false));
		} elseif ( is_date() ) {
			echo("<h2>Sorry, but there aren’t any posts with this date.</h2>");
		} else {
			echo("<h2>Sorry, no posts found.</h2>");
		}
	endif;
?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
