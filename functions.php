<?php
/**
 * @package WordPress
 * @subpackage Simplicity
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



//  Replace default post class verbosity

function simple_post_class() {
 $c[] = 'hentry';
    return $c;
}
 
add_filter( 'post_class', 'simple_post_class' );



//  Remove list item classes from page listing

function declass($c) {
	return preg_replace('/<li class=\".+?\">/', '<li>', $c , -1);

}

add_filter('wp_list_pages','declass');



// Add support for the_post_thumbnail

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 600, 9999, true ); // Normal post thumbnails
	add_image_size( 'archive-thumbnail', 50, 50 ); // Permalink thumbnail size
}

// Adds support for the_post_thumbnail in RSS feeds
function insertThumbnailRSS($content) {
   global $post;
   if ( has_post_thumbnail( $post->ID ) ){
       $content = '<p class="image">' . get_the_post_thumbnail( $post->ID, 'medium' ) . '</p>' . $content;
   }
   return $content;
}

add_filter('the_excerpt_rss', 'insertThumbnailRSS');  
add_filter('the_content_feed', 'insertThumbnailRSS'); 


?>
