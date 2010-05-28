<?php
/**
 * @package WordPress
 * @subpackage Simplicity
 */

get_header(); ?>

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></p>
			<?php the_content('Read the rest of this entry &raquo;'); ?>
			<p><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
		</div>

	<?php endwhile; ?>

	<?php if (next_posts_link() || previous_posts_link()): ?>
		<?php next_posts_link('&laquo; Older Entries') ?> | <?php previous_posts_link('Newer Entries &raquo;') ?>
	<?php endif ?>
	
<?php else : ?>

	<h2>Not Found</h2>
	<p>Sorry, but you are looking for something that isn't here.</p>
	<?php get_search_form(); ?>

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>