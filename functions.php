<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */

// Define Theme Constants

	$theme_data = get_theme_data(TEMPLATEPATH.'/style.css');
	
	define('THEME_URI', $theme_data['URI']);
	define('THEME_NAME', $theme_data['Name']);
	define('THEME_AUTHOR', $theme_data['Author']);
	define('THEME_VERSION', trim($theme_data['Version']));
	define('THEME_DESCRIPTION', trim($theme_data['Description']));


// Tersus Theme Options

	$themename = "Tersus";
	$shortname = "tersus";
	$options = array (
	array( "name" => "Flavor",
		"desc" => "Select which flavor of Tersus you’d like to use.",
		"id" => $shortname."_style_sheet",
		"type" => "select",
		"options" => array( "Default", "Advanced", "Super Ginormous" ), 
		"std" => "default"),
	array( "name" => "Announcement",
		"desc" => "Display an announcement on every page.",
		"id" => $shortname."_announcement_display",
		"type" => "checkbox",
		"std" => "off"),
	array( "name" => "Announcement Text",
		"desc" => "Enter the text to appear in the announcement area. HTML is allowed.",
		"id" => $shortname."_announcement",
		"type" => "textarea",
		"std" => "<p>This text will appear in the announcement area.</p>"),
	);


// Tersus Theme Options Admin

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
		if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' options have been saved.</strong></p></div>';
		if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' options have been reset to their default settings.</strong></p></div>';
 
	?>

	<div class="wrap">
		<div id="icon-themes" class="icon32"><br /></div>
		<h2><?php echo $themename; ?> Options</h2>
		<form method="post">
		<table class="form-table">
		
		<?php
			foreach ($options as $value) {
				switch ( $value['type'] ) {
			case 'text':
		?>
	 
		<tr>
			<th><strong><?php echo $value['name']; ?></strong></th>
			<td><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if (get_settings($value['id']) != "") { echo get_settings($value['id']); } else { echo $value['std']; } ?>" /> <?php echo $value['desc']; ?></td>
		</tr>
 
		<?php
			break;
			case 'textarea':
		?>
 
		<tr>
			<th><strong><?php echo $value['name']; ?></strong></th>
			<td><textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="80" rows="5"><?php if (get_settings($value['id']) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo $value['std']; } ?></textarea>
			<p><?php echo $value['desc']; ?></p></td>
		</tr>
  
		<?php
			break;
			case 'select':
		?>

		<tr>
			<th><strong><?php echo $value['name']; ?></strong></th>
			<td><select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if (get_settings($value['id']) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select> <?php echo $value['desc']; ?></td>
		</tr>
		
		<?php
			break;
			case "checkbox":
		?>

		<tr>
			<th><strong><?php echo $value['name']; ?></strong></th>
			<td><?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?><input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /> <?php echo $value['desc']; ?></td>
		</tr>

		<?php break;
				}
			}
		?>

		</table>
		<p class="submit">
			<input name="save" type="submit" value="Save Changes" />
			<input type="hidden" name="action" value="save" />
		</p>
	</form>

	<form method="post">
		<p class="submit">
			<input name="reset" type="submit" value="Reset Options" />
			<input type="hidden" name="action" value="reset" />
		</p>
	</form>
 
	<?php
	}

	add_action('admin_menu', 'tersus_add_admin');

// Automatic Feed Links

	automatic_feed_links();
	
// Remove non-validating parent post link from header

	remove_action('wp_head', 'parent_post_rel_link');
	
// Sidebar support. Let's have two, shall we?

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
 
// Remove non-validating rel attributes from category links

	function relfix($c) {
		return preg_replace('/category tag/','tag',$c);
	}

	add_filter('the_category','relfix');

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


// Remove extraneous class attributes from comment links

	function declass_comment_links($str) {
		return preg_replace('/ class=[\"\'].+?[\"\']/', '', $str);
	}
	
	add_filter ('edit_comment_link','declass_comment_links');
	add_filter ('comment_reply_link','declass_comment_links');



// Replacement comment callback function
// Removes default class and ID verbosity

function tersus_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID() ?>">
		<p>Posted by <span class="vcard author"><?php echo get_avatar( $comment->comment_author_email, 48 ); ?> <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?></span> on <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>" rel="bookmark" title="<?php comment_time('c') ?>"><?php comment_time('l, F jS, Y') ?></a>.</p>

	<?php if ($comment->comment_approved == '0') : ?>
		<p><em><?php _e('Your comment is awaiting moderation.') ?></em></p>
	<?php endif; ?>

	<?php comment_text() ?>

	<p><?php edit_comment_link(__('Edit'),'',' | ') ?><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
<?php
	}

        

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
