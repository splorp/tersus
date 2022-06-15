<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

<section id="content">
<?php if (have_posts()) : ?>

	<h2>Search: “<span><?php the_search_query(); ?></span>”</h2>

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
	<nav><?php next_posts_link('Older'); delim_posts_link(); previous_posts_link('Newer') ?></nav>
<?php endif; ?>

<?php else : ?>

	<h2>Not found.</h2>
	<p>Sorry, you seem to be looking for something that simply isn’t here.</p>

<?php endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
