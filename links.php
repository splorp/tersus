<?php
/**
 * @package WordPress
 * @subpackage Tersus

Template Name: Links

*/
?>

<?php get_header(); ?>

<section id="content">
	<h2>Links</h2>
	<ul>
		<?php wp_list_bookmarks(); ?>
	</ul>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>