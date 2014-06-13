<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

<section id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if (show_post_link_nav()): ?>
	<nav><?php previous_post_link('%link'); delim_post_link(); next_post_link('%link') ?></nav>
<?php endif; ?>

	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<p class="published" title="<?php the_time('c') ?>"><?php the_time(get_option('date_format')); ?></p>
		<h2 class="entry-title"><?php if(the_title( '', '', false ) !='') the_title(); else echo 'Untitled';?></h2>
		<?php the_content(); ?>
		<?php wp_link_pages(array('before' => '<p>Pages: ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		<p>This item was posted by <span class="vcard author"><cite class="fn"><a class="url" href="<?php the_author_meta('user_url') ?>" title="Visit the author&#8217;s site"><?php the_author_meta('display_name'); ?></a></cite></span>.</p>

		<?php if (has_tag()) echo '<p>Tags:</p>'; the_tags('<ul><li>','</li><li>','</li></ul>'); ?>

		<p>Categories:</p>
		<ul>
			<li><?php the_category('</li><li>') ?></li>
		</ul>

		<?php if ( comments_open() && pings_open() ) { ?>
		<p><a href="#respond" title="Contribute to the discussion">Leave a comment</a> or <a href="<?php trackback_url(); ?>" title="Send a notification when you link to this page">send a trackback</a> from your own site.</p>

		<?php } elseif ( !comments_open() && pings_open() ) { ?>
		<p>Comments are closed, but you can <a href="<?php trackback_url(); ?>" title="Send a notification when you link to this page">send a trackback</a> from your own site.</p>

		<?php } elseif ( comments_open() && !pings_open() ) { ?>
		<p><a href="#respond" title="Contribute to the discussion">Leave a comment</a>.</p>

		<?php } elseif ( !comments_open() && !pings_open() ) { ?>
		<p>Comments are closed.</p>

		<?php } edit_post_link('Edit','<p>','</p>'); ?>

	</article>

<?php if (show_post_link_nav()): ?>
	<nav><?php previous_post_link('%link'); delim_post_link(); next_post_link('%link') ?></nav>
<?php endif; ?>

<?php comments_template(); ?>

<?php endwhile; else: ?>
	<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>