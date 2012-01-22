<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

<section id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<h2><?php if(the_title( '', '', false ) !='') the_title(); else echo 'Untitled';?></h2>
		<?php the_content(); ?>
		<?php wp_link_pages(array('before' => '<p>Pages: ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	</article>
<?php endwhile; endif; ?>
<?php edit_post_link('Edit', '<p>', '</p>'); ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>