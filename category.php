<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>


<section id="content">
	<?php if (have_posts()) : ?>
			<h1><?php
						printf( __( 'Category Archives: %s' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					?>
			</h1>
			<?php
				$category_description = category_description();
				if ( ! empty( $category_description ) )
					echo apply_filters( 'category_archive_meta', '' . $category_description . '' );
			?>
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
		
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php if(the_title( '', '', false ) !='') the_title(); else echo 'Untitled';?></a></h2>
				<?php the_excerpt('<p>Read the rest of this item</p>'); ?>
				<p class="meta">This item was posted by <span class="vcard author"><cite class="fn"><a class="url" href="<?php the_author_meta('user_url') ?>"><?php the_author_meta('display_name'); ?></a></cite></span> on <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_time('c') ?>"><?php the_time('l, F jS, Y') ?></a>.</p>

				<?php edit_post_link('Edit','<p>','</p>'); ?>

			</article>			
					
		<?php endwhile; ?>

	<?php else : ?>

		<article <?php post_class( 'no-results' ) ?> id="post-0">
			<h3><?php _e( 'Nothing Found' ); ?></h3>
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.' ); ?></p>
			<?php get_search_form(); ?>
		</article>

	<?php endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>