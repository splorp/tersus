<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

<section id="content">
<?php if (have_posts()) : ?>

	<h2>Search results for “<?php the_search_query(); ?>”</h2>

	<p><?php next_posts_link('Older'); delim_posts_link(); previous_posts_link('Newer') ?></p>

	<?php while (have_posts()) : the_post(); ?>

	<article <?php post_class() ?>>
		<p title="<?php the_time('c') ?>"><?php the_time('l, F jS, Y') ?></p>
		<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to “<?php the_title_attribute(); ?>”"><?php if(the_title( '', '', false ) !='') the_title(); else echo 'Untitled';?></a></h3>
		<p><?php the_excerpt(); ?></p>
		<?php edit_post_link('Edit', '<p>', '</p>'); ?>
	</article>

	<?php endwhile; ?>

	<p><?php next_posts_link('Older'); delim_posts_link(); previous_posts_link('Newer') ?></p>
	
<?php else : ?>

	<h2>Not found.</h2>
	<p>Sorry, you seem to be looking for something that simply isn’t here.</p>

<?php endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>