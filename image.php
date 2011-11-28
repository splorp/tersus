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

		<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> : <?php the_title(); ?></h2>
		<p><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
		<?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?>
		<?php the_content('<p>Read the rest of this item</p>'); ?>
		<p><?php previous_image_link() ?> | <?php next_image_link() ?></p>

		<p>This item was posted by <span class="vcard author"><a class="url fn" href="<?php the_author_meta('user_url') ?>"><?php the_author_meta('full_name'); ?></a></span> on <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_time('c') ?>"><?php the_time('l, F jS, Y') ?></a>.</p>

		<p>Categories:</p>
		<ul>
			<li><?php the_category('</li><li>') ?></li>
		</ul>
		<?php the_taxonomies(); ?>

		<p>You can follow comments on this item via the <?php post_comments_feed_link('RSS 2.0'); ?> feed.</p>

		<?php if ( comments_open() && pings_open() ) {
		// Comments and trackbacks are open ?>
		<p>Feel free to <a href="#comment">leave a comment</a> below or <a href="<?php trackback_url(); ?>">trackback</a> from your own site.</p>

		<?php } elseif ( !comments_open() && pings_open() ) {
		// Only trackbacks are open ?>
		<p>Comments are closed, but you can <a href="<?php trackback_url(); ?>">trackback</a> from your own site.</p>

		<?php } elseif ( comments_open() && !pings_open() ) {
		// Only comments are open ?>
		<p>Feel free to <a href="#comment">Leave a comment</a> below.</p>

		<?php } elseif ( !comments_open() && !pings_open() ) {
		// Comments and trackbacks are closed ?>
		<p>Comments are closed.</p>

		<?php } edit_post_link('Edit','<p>','</p>'); ?>

	</article>

<?php comments_template(); ?>

<?php endwhile; else: ?>
	<p>Sorry, no attachments matched your criteria.</p>
<?php endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>