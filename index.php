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
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<p><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></p>
			<?php } ?>
			
			<?php the_content('Read the rest of this entry'); ?>
			
			<?php if(!has_post_format('aside') && !has_post_format('image')) { ?>
				<p>Tags:</p>
				<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
				<p>Categories:</p>
				<ul>
					<li><?php the_category('</li><li>') ?></li>
				</ul>
			<?php } ?>
			
			<p><?php edit_post_link('Edit', '', ' | '); ?><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
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