<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php previous_post_link('&laquo; %link') ?> | <?php next_post_link('%link &raquo;') ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
			<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
			<?php wp_link_pages(array('before' => '<p>Pages: ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			<p>This entry was posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>.</p>

			<p>Tags:</p>
			<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
			<p>Categories:</p>
			<ul>
				<li><?php the_category('</li><li>') ?></li>
			</ul>

			<p>You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.</p>

			<?php if ( comments_open() && pings_open() ) {
			// Both Comments and Pings are open ?>
			<p>You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.</p>

			<?php } elseif ( !comments_open() && pings_open() ) {
			// Only Pings are Open ?>
			<p>Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.</p>

			<?php } elseif ( comments_open() && !pings_open() ) {
			// Comments are open, Pings are not ?>
			<p>You can skip to the end and leave a response. Pinging is currently not allowed.</p>

			<?php } elseif ( !comments_open() && !pings_open() ) {
			// Neither Comments, nor Pings are open ?>
			<p>Both comments and pings are currently closed.</p>

			<p><?php } edit_post_link('Edit this entry','','.'); ?></p>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>