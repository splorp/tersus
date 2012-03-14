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
		"desc" => "Select which theme style you’d like to use.",
		"id" => $shortname."_style_sheet",
		"type" => "select",
		"options" => array( "Default", "Advanced", "Super Ginormous" ), 
		"std" => "default"),
	array( "name" => "Sidebar",
		"desc" => "Show subpages in page list",
		"id" => $shortname."_page_depth",
		"type" => "checkbox",
		"std" => "true"),
	array( "name" => "",
		"desc" => "Show the number of posts beside each category",
		"id" => $shortname."_category_count",
		"type" => "checkbox",
		"std" => "true"),
	array( "name" => "",
		"desc" => "Show the number of posts beside each archive",
		"id" => $shortname."_archive_count",
		"type" => "checkbox",
		"std" => "true"),
	array( "name" => "Announcement",
		"desc" => "Display the following text on every page",
		"id" => $shortname."_announcement_display",
		"type" => "checkbox",
		"std" => ""),
	array( "name" => "",
		"desc" => "HTML may be used to format the announcement text.",
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
			<td><input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="1" <?php checked(true, get_option( $value['id'] )); ?> /> <?php echo $value['desc']; ?></td>
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


// Remove crufty class and ID attributes from list elements

	function decruft($c) {
		$c_ = preg_replace('/ class=[\"\'].+?[\"\']/','',$c);
		return preg_replace('/ id=[\"\'].+?[\"\']/','',$c_);
	}

	add_filter('wp_list_bookmarks','decruft');
	add_filter('wp_list_categories','decruft');
	add_filter('wp_list_pages','decruft');
	add_filter('edit_comment_link','decruft');
	add_filter('comment_reply_link','decruft');


// Remove crufty class attributes from avatars

	function decruft_avatars($str) {
		return preg_replace('/ class=[\"\'].+?[\"\']/',' class="photo"',$str);
	}
	
	add_filter ('get_avatar','decruft_avatars');


// Replacement gallery shortcut function
// Removes default cruft and verbosity

remove_shortcode('gallery');
add_shortcode('gallery', 'tersus_gallery');

// Portions by Michael Preuss and Aaron Cimolini
// http://snipplr.com/view.php?codeview&id=27051

function tersus_gallery($attr) {
	global $post;

	static $instance = 0;
	$instance++;

	// Check for a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
		), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	// Check to see whether any tags have been set to false
	if ($itemtag) $itemtag = tag_escape($itemtag);
	if ($captiontag) $captiontag = tag_escape($captiontag);
	if ($icontag) $icontag = tag_escape($icontag);
	$columns = intval($columns);

	$selector = "gallery-{$instance}";

	$output = "<div id=\"$selector\">\n";

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
	  ++$i;
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

		if ($itemtag) {
			$output .= '<'.$itemtag;
		  if( $columns > 0 && $i % $columns == 0 ) $output .= " last";
		  $output .= '">';
		}
		if ($icontag) $output .= "\n\t<" .$icontag. ">\t";
		$output .=  "\n\t".$link;
		if ($icontag) $output .= "\n\t</" .$icontag. ">";
		// if the attachment has a caption set
		if ( trim($attachment->post_excerpt) ) {
		  if ($captiontag) $output .= "\n<" .$captiontag. ">\n\t";
		  $output .= wptexturize($attachment->post_excerpt);
		  if ($captiontag) $output .= "\n</" .$captiontag. ">" . "\n";
		}
		if ($itemtag) $output .= "\n</" .$itemtag. ">\n";
		if ( $columns > 0 && $i % $columns == 0 ) $output .= "\n";
	}

	$output .= "</div>\n";

	return $output;
}


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


// Update comment reply link anchors 

	function comment_reply_anchor($str) {
		return preg_replace('/respond/', 'comment', $str);
	}
	
	add_filter ('comment_reply_link','comment_reply_anchor');
        

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

// Removes the link delimiter when viewing first or last image

	function delim_image_link() {

	ob_start();
	previous_image_link();
	$prev = ob_get_contents();
	ob_end_clean();

	ob_start();
	next_image_link();
	$next = ob_get_contents();
	ob_end_clean();

		if ( $prev && $next ) {
			echo " | ";
		}
	}

// Custom excerpt links

	function new_excerpt_more($more) {
		global $post;
		$t = get_post($post->ID); 
		$title = $t->post_title;
		return ' … <a href="' . get_permalink($post->ID) . '" title="Read the rest of “' . $title . '”">Read the rest of this item</a>';
	}

	add_filter('excerpt_more', 'new_excerpt_more');

?>
