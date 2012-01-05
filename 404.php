<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php get_header(); ?>

	<?php if ( dirname("/' . $category_base . '/") ) { ?>
		
		<section id="content">
			<h2>Browse All Categories</h2>
			<ul>
				<?php wp_list_categories('style=list&title_li='); ?>
			</ul>
		</section>
	
	<?php } else { ?>
		
		<section id="content">
			<h2>Not found.</h2>
			<p>Sorry, you seem to be looking for something that simply isn’t here.</p>
		</section>

	<?php } ?> 

<?php get_sidebar(); ?>
<?php get_footer(); ?>