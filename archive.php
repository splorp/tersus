<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

<section id="content">
<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2>Category: “<?php single_cat_title(); ?>” category</h2>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2>Tag: “<?php single_tag_title(); ?>”</h2>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2>Archive: <?php the_time('F jS, Y'); ?></h2>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2>Archive: <?php the_time('F, Y'); ?></h2>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2>Archive: <?php the_time('Y'); ?></h2>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2>Author:</h2>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2>Archives</h2>
	<?php } ?>

		<p><?php next_posts_link('Older'); delim_posts_link(); previous_posts_link('Newer') ?></p>

		<?php while (have_posts()) : the_post(); ?>
			
		<article <?php post_class() ?>>
			<p title="<?php the_time('c') ?>"><?php the_time('l, F jS, Y') ?></p>
			<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to “<?php the_title_attribute(); ?>”"><?php if(the_title( '', '', false ) !='') the_title(); else echo 'Untitled';?></a></h3>
			<?php the_excerpt(); ?>
			<p class="meta">This item was posted by <span class="vcard author"><cite class="fn"><a class="url" href="<?php the_author_meta('user_url') ?>"><?php the_author_meta('display_name'); ?></a></cite></span>.</p>
			<?php edit_post_link('Edit', '<p>', '</p>'); ?>
		</article>

		<?php endwhile; ?>

		<p><?php next_posts_link('Older'); delim_posts_link(); previous_posts_link('Newer') ?></p>
            
   <?php else :
    
            if ( is_category() ) { // If this is a category archive
                printf("<h2>Sorry, but there aren’t any posts in the %s category yet.</h2>", single_cat_title('',false));
            } elseif ( is_date() ) { // If this is a date archive
                echo("<h2>Sorry, but there aren’t any posts with this date.</h2>");
            } elseif ( is_author() ) { // If this is a category archive
                $userdata = get_userdatabylogin(get_query_var('author_name'));
                printf("<h2>Sorry, but there aren’t any posts by %s yet.</h2>", $userdata->display_name);
            } else {
                echo("<h2>Sorry, no posts found.</h2>");
            }

	endif;
?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>