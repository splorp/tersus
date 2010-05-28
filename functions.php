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

?>
