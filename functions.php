<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */


// Tersus Theme Options

	$themename = "Tersus";
	$shortname = "tersus";
	$options = array (
	array( "name" => "Flavor",
		"desc" => "&larr; Select which flavor of Tersus you’d like to use.",
		"id" => $shortname."_style_sheet",
		"type" => "select",
		"options" => array( "Default", "Advanced", "Super Ginormous" ), 
		"std" => "default"),
	);
	$theme_data = get_theme_data(TEMPLATEPATH.'/style.css');
	
	define('THEME_URI', $theme_data['URI']);
	define('THEME_NAME', $themename);
	define('THEME_AUTHOR', $theme_data['Author']);
	define('THEME_VERSION', trim($theme_data['Version']));
	define('THEME_DESCRIPTION', trim($theme_data['Description']));


// Tersus Options Admin

	function tersus_add_admin() {
 
		global $themename, $shortname, $options;
 
		if ( $_GET['page'] == basename(__FILE__) ) {
 
			if ( 'save' == $_REQUEST['action'] ) {
 
				foreach ($options as $value) {
					update_option( $value['id'], $_REQUEST[ $value['id'] ] );
				}
 
				foreach ($options as $value) {
					if( isset( $_REQUEST[ $value['id'] ] ) ) {
						update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
					} else {
						delete_option( $value['id'] );
					}
				}
 
				header("Location: themes.php?page=functions.php&saved=true");

				die;
 
			} else if( 'reset' == $_REQUEST['action'] ) {
 
				foreach ($options as $value) {
					delete_option( $value['id'] );
				}
 
				header("Location: themes.php?page=functions.php&reset=true");
				die;
 
			}
		}
 
		add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'tersus_admin');
 
	}
 
	function tersus_admin() {
 
		global $themename, $shortname, $options;
 
		if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' options saved.</strong></p></div>';
		if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' options reset.</strong></p></div>';
 
	?>
			<div class="wrap">
				<h2><?php echo $themename; ?> Options</h2>
 
				<form method="post">
 
				<?php
					foreach ($options as $value) {
						switch ( $value['type'] ) {
						case "open":
				?>
					<table width="100%" border="0" style="background-color:#eef5fb; padding:10px;">
				<?php
						break;
						case "close":
				?>
 
					</table><br />
 
				<?php
						break;
						case "title":
				?>
					<table width="100%" border="0" style="background-color:#dceefc; padding:5px 10px;">
						<tr>
							<td valign="top" colspan="2">
								<h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3>
							</td>
						</tr>

				<!--custom-->
			
				<?php
						break; 
						case "sub-title":
				?>
						<h3 style="font-family:Georgia,'Times New Roman',Times,serif; padding-left:8px;"><?php echo $value['name']; ?></h3> 

				<!--end-of-custom-->
 
				<?php
						break;
						case 'text':
				?>
 
	<tr>
	<td valign="top" width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
	<td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
	</tr>
 
	<tr>
	<td><small><?php echo $value['desc']; ?></small></td>
	</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
 
	<?php
	break;
 
	case 'textarea':
	?>
 
	<tr>
	<td valign="top" width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
	<td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>
 
	</tr>
 
	<tr>
	<td><small><?php echo $value['desc']; ?></small></td>
	</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
 
	<?php
	break;
 
	case 'select':
	?>
	<tr>
	<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
	<td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
	</tr>
 
	<tr>
	<td><small><?php echo $value['desc']; ?></small></td>
	</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
 
	<?php
	break;
 
	case "checkbox":
	?>
	<tr>
	<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
	<td width="80%"><?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
	</td>
	</tr>
 
	<tr>
	<td><small><?php echo $value['desc']; ?></small></td>
	</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
 
	<?php break;
 
			}
		}
	?>
 
			<p class="submit">
				<input name="save" type="submit" value="Save changes" />
				<input type="hidden" name="action" value="save" />
			</p>
		</form>
		<form method="post">
			<p class="submit">
				<input name="reset" type="submit" value="Reset" />
				<input type="hidden" name="action" value="reset" />
			</p>
		</form>
 
	<?php

	}

	add_action('admin_menu', 'tersus_add_admin');

// Automatic Feed Links

	automatic_feed_links();
	
// Sidebar Support. Let's have two, shall we?

	if ( function_exists('register_sidebar') ) {
		register_sidebar(array('name'=>'Sidebar1',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>',
		));
		register_sidebar(array('name'=>'Sidebar2',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>',
		));
	}

// Adds support for Post Formats -- http://codex.wordpress.org/Post_Formats
	
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

// Replace default post class verbosity
	
	function simple_post_class() {
	    $post = get_post($post_id);
		$c = array();
	
		// hentry for hAtom compliance
		$c[] = 'hentry';
		
		// Determine Post Format
		$post_format = get_post_format( $post->ID );
		if ( $post_format && !is_wp_error($post_format) ) $c[] = $post->post_type . '-' . sanitize_html_class( $post_format );
	
		// Is it Sticky?
		if ( is_sticky($post->ID) && is_home() && !is_paged() ) $c[] = 'sticky';
	
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

// Removes the link delimiter when viewing first or last post

	function delim_post_link() {
		$prev = get_previous_post();
		$next = get_next_post();
		if ( $prev && $next ) {
			echo " | ";
		}
	}

// Removes the link delimiter when viewing first or last archive page

	function delim_posts_link() {
		$prev = get_previous_posts_link();
		$next = get_next_posts_link();
		if ( $prev && $next ) {
			echo " | ";
		}
	}

// Removes the link delimiter when viewing first or last comment

	function delim_comment_link() {

	$prev = get_previous_comments_link();
	$next = get_next_comments_link();
		if ( $prev && $next ) {
			echo " | ";
		}
	}

?>
