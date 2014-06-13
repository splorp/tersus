<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

<section id="content">
<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		
			<?php if(!has_post_format('aside') && !has_post_format('image')) { ?>
				<p class="published" title="<?php the_time('c') ?>"><?php the_time(get_option('date_format')); ?></p>
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to &#8220;<?php the_title_attribute(); ?>&#8221;"><?php the_title(); ?></a></h2>

			<?php }
				the_content();
				if(!has_post_format('aside') && !has_post_format('image')) {
			?>
				<h6>Author</h6>
				<p class="vcard author">
					<cite class="fn">
						<a class="url" href="<?php the_author_meta('user_url') ?>" title="Visit the author&#8217;s site">
							<?php the_author_meta('display_name'); ?>
						</a>
					</cite>
				</p>
				<?php if (has_tag()) { ?>
					<h6>Tags</h6>
					<p><?php the_tags( '', ', ', '' ) ?></p>
				<?php } ?>
				<h6>Categories</h6>
				<p><?php the_category( ', ' ) ?></p>
			<?php } ?>
			
			<p><a href="<?php the_permalink(); ?>#respond" title="Contribute to the discussion"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></a></p>
			<?php edit_post_link('Edit', '<p>', '</p>'); ?>
		</article>

	<?php endwhile; ?>

	<?php if (show_posts_link_nav()): ?>
		<nav><?php next_posts_link('Older'); delim_posts_link(); previous_posts_link('Newer') ?></nav>
	<?php endif; ?>

<?php else : ?>

	<h2>Not found.</h2>
	<p>Sorry, you seem to be looking for something that simply isn&#8217;t here.</p>

<?php endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
