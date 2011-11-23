<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

<section id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<p><?php previous_post_link('%link'); delim_post_link(); next_post_link('%link') ?></p>

	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<h2><?php if(the_title( '', '', false ) !='') the_title(); else echo 'Untitled';?></h2>
		<?php the_content('<p>Read the rest of this entry</p>'); ?>
		<?php wp_link_pages(array('before' => '<p>Pages: ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		<p>This item was posted by <span class="vcard author"><a class="url fn" href="<?php the_author_meta('user_url') ?>"><span class="given-name"><?php the_author_meta('first_name'); ?></span> <span class="family-name"><?php the_author_meta('last_name'); ?></span></span></a></span> on <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_time('c') ?>"><?php the_time('l, F jS, Y') ?> at <?php the_time() ?></a>.</p>

		<?php if (has_tag()) echo '<p>Tags:</p>'; the_tags('<ul><li>','</li><li>','</li></ul>'); ?>

		<p>Categories:</p>
		<ul>
			<li><?php the_category('</li><li>') ?></li>
		</ul>

		<p>You can follow comments on this entry via the <?php post_comments_feed_link('RSS 2.0'); ?> feed.</p>

		<?php if ( comments_open() && pings_open() ) {
		// Comments and trackbacks are open ?>
		<p>Feel free to <a href="#comment">leave a comment</a> below or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.</p>

		<?php } elseif ( !comments_open() && pings_open() ) {
		// Only trackbacks are open ?>
		<p>Comments are closed, but you can <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.</p>

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
	<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>