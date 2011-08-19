<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<h2>Search Results</h2>

		<?php next_posts_link('Older'); delim_posts_link(); previous_posts_link('Entries') ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php if(the_title( '', '', false ) !='') the_title(); else echo 'Untitled';?></a></h3>
				<p><?php the_time('l, F jS, Y') ?></p>
				<p>Tags:</p>
				<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
				<p>Categories:</p>
				<ul>
					<li><?php the_category('</li><li>') ?></li>
				</ul>
				<p><?php edit_post_link('Edit', '', ' | '); ?><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
			</div>

		<?php endwhile; ?>

		<?php next_posts_link('Older'); delim_posts_link(); previous_posts_link('Entries') ?>
		
	<?php else : ?>

		<h2>Not found.</h2>
		<p>Sorry, you seem to be looking for something that simply isn’t here.</p>

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>