<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */

get_header();
?>

	<h2>Error 404 - Not Found</h2>
	<?php
		include ( TEMPLATEPATH . '/searchform.php' );
		/*
			get_search_form(); 
			
			Because I've added searchform.php to the theme, using get_search_form() isn't necessary here,
			BUT in some cases it may make more sense to use the built-in function:
			
			http://codex.wordpress.org/Function_Reference/get_search_form
		*/
	?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>