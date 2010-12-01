<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */

automatic_feed_links();

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}



// Replace default post class verbosity

function simple_post_class() {
	$c[] = 'hentry';
    return $c;
}
 
add_filter( 'post_class', 'simple_post_class' );



// Add a proper thousands delimiter to category post counts

function delim($c) {
	return preg_replace('/(\d)(\d{3})\b/','\1,\2',$c);	// Hat tip to @myfonts for the regex tweaks
}

add_filter('wp_list_categories','delim');



// Remove extraneous class attributes from list elements

function declass($c) {
	$c_ = preg_replace('/<li class=[\"\'].+?[\"\']>/', '<li>', $c , -1);	// Classes on list items
	return preg_replace('/<ul class=[\"\'].+?[\"\']>/', '<ul>', $c_ , -1);	// Classes on unordered list elements

	// Need to add handling of classes that occur before and after id attributes
	// Eg: wp_list_comments
}

add_filter('wp_list_bookmarks','declass');
add_filter('wp_list_categories','declass');
add_filter('wp_list_pages','declass');



// Remove extraneous class attributes from list elements in comments
// Still needs work, as it does not remove the attribute, only values

function declass_comments($c) {
	foreach( $c as $key => $class ) {
		if(!strstr($class, "comment")) { // Leaves only the 'comment' class
			unset( $c[$key] );
			}
		}
	return $c;
}
		
add_filter('comment_class','declass_comments');



// Add support for the_post_thumbnail

if ( function_exists( 'add_theme_support' ) ) {    // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 600, 9999, true );    // Normal post thumbnails
	add_image_size( 'archive-thumbnail', 50, 50 ); // Permalink thumbnail size
}



// Add support for the_post_thumbnail in RSS feeds

function insertThumbnailRSS($content) {
   global $post;
   if ( has_post_thumbnail( $post->ID ) ){
       $content = '<p class="image">' . get_the_post_thumbnail( $post->ID, 'medium' ) . '</p>' . $content;
   }
   return $content;
}

add_filter('the_excerpt_rss', 'insertThumbnailRSS');  
add_filter('the_content_feed', 'insertThumbnailRSS'); 



// Define theme information constants

$theme_data = get_theme_data(TEMPLATEPATH.'/style.css');

define('THEME_URI', $theme_data['URI']);
define('THEME_NAME', $theme_data['Name']);
define('THEME_AUTHOR', $theme_data['Author']);
define('THEME_VERSION', trim($theme_data['Version']));
define('THEME_DESCRIPTION', trim($theme_data['Description']));



// Removes the post link delimiter when viewing first or last post

function delim_post_link() {

$prev = get_previous_post();
$next = get_next_post();
	if ( $prev && $next ) {
		echo " | ";
	}
}



// Removes the comment link delimiter when viewing first or last comment

function delim_comment_link() {

$prev = get_previous_comments_link();
$next = get_next_comments_link();
	if ( $prev && $next ) {
		echo " | ";
	}
}
?>
