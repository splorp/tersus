<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

<section id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<p><?php previous_image_link(0,'Previous Image'); delim_image_link(); next_image_link(0,'Next Image'); ?></p>

	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<p title="<?php the_time('c') ?>"><?php the_time('l, F jS, Y') ?></p>
		<h2><?php the_title(); ?></h2>
		<p><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
		<?php
			// Display the caption
			if ( !empty($post->post_excerpt) ) the_excerpt();
			// Display the description
			the_content();
		?>

		<p>This item was posted by <span class="vcard author"><cite class="fn"><a class="url" href="<?php the_author_meta('user_url') ?>" title="Visit the author’s site"><?php the_author_meta('display_name'); ?></a></cite></span> in <a href="<?php echo get_permalink($post->post_parent); ?>" title="View the gallery"><?php echo get_the_title($post->post_parent); ?></a>.</p>

		<?php the_taxonomies(); ?>

		<p>You can follow comments on this item via the <?php post_comments_feed_link('RSS 2.0'); ?> feed.</p>

		<?php if ( comments_open() && pings_open() ) {
		// Comments and trackbacks are open ?>
		<p>Feel free to <a href="#comment" title="Contribute to the discussion">leave a comment</a> below or <a href="<?php trackback_url(); ?>" title="Send a notification when you refer to this entry">trackback</a> from your own site.</p>

		<?php } elseif ( !comments_open() && pings_open() ) {
		// Only trackbacks are open ?>
		<p>Comments are closed, but you can <a href="<?php trackback_url(); ?>" title="Send a notification when you refer to this entry">trackback</a> from your own site.</p>

		<?php } elseif ( comments_open() && !pings_open() ) {
		// Only comments are open ?>
		<p>Feel free to <a href="#comment" title="Contribute to the discussion">Leave a comment</a> below.</p>

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