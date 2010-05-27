<?php
/**
 * @package WordPress
 * @subpackage Starkers
 */
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
<?php get_search_form(); ?>

<h2>Archives by Month:</h2>
<ul>
	<?php wp_get_archives('type=monthly'); ?>
</ul>

<h2>Archives by Subject:</h2>
<ul>
	 <?php wp_list_categories(); ?>
</ul>

<?php get_footer(); ?>