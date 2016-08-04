<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */


// Define theme constants

$theme_name = 'tersus';
$theme_data = wp_get_theme($theme_name);

define('THEME_URI', $theme_data->get('ThemeURI'));
define('THEME_NAME', $theme_data->get('Name'));
define('THEME_VERSION', trim($theme_data->get('Version')));
define('THEME_DESCRIPTION', trim($theme_data->get('Description')));


// Tersus theme options

$theme_name_full = $theme_data->get('Name');
$options = array (
array( "name" => "Sidebar",
	"desc" => "Show subpages in page list",
	"id" => $theme_name."_page_depth",
	"type" => "checkbox",
	"std" => "true"),
array( "name" => "",
	"desc" => "Show the number of posts beside each category",
	"id" => $theme_name."_category_count",
	"type" => "checkbox",
	"std" => "true"),
array( "name" => "",
	"desc" => "Show the number of posts beside each archive",
	"id" => $theme_name."_archive_count",
	"type" => "checkbox",
	"std" => "true"),
array( "name" => "Navigation",
	"desc" => "Display navigation above main content",
	"id" => $theme_name."_navigation_display",
	"type" => "checkbox",
	"std" => "true"),
array( "name" => "Announcement",
	"desc" => "Display the following text at the top of each page",
	"id" => $theme_name."_announcement_display",
	"type" => "checkbox",
	"std" => ""),
array( "name" => "",
	"desc" => "HTML may be used to format the announcement text.",
	"id" => $theme_name."_announcement",
	"type" => "textarea",
	"std" => "<p>This text will appear in the announcement area.</p>"),
array( "name" => "Footer",
	"desc" => "Display theme information in footer",
	"id" => $theme_name."_theme_information",
	"type" => "checkbox",
	"std" => "true"),
array( "name" => "",
	"desc" => "Display the following text in the footer of each page",
	"id" => $theme_name."_footer_display",
	"type" => "checkbox",
	"std" => "true"),
array( "name" => "",
	"desc" => "HTML may be used to format the footer text.",
	"id" => $theme_name."_footer_text",
	"type" => "textarea",
	"std" => "<p>This text will appear in the footer.</p>"),
);

if ( ! function_exists( 'tersus_add_admin' ) ) {
	function tersus_add_admin() {
		global $theme_name_full, $theme_name, $options;
		if ( isset($_GET['page']) && $_GET['page'] == basename(__FILE__) ) {
			if ( !empty( $_REQUEST['action'] ) && 'save' == $_REQUEST['action'] ) {
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
			}
		}
		add_theme_page($theme_name_full." Options", "".$theme_name_full." Options", 'edit_themes', basename(__FILE__), 'tersus_admin');
	}
}

if ( ! function_exists( 'tersus_admin' ) ) {
	function tersus_admin() {
		global $theme_name_full, $theme_name, $options;
		if ( !empty( $_REQUEST['saved'] ) && $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$theme_name_full.' options have been saved.</strong></p></div>';

?>

<div class="wrap">
	<div id="icon-themes" class="icon32"><br /></div>
	<h2><?php echo $theme_name_full; ?> Options</h2>
	<form method="post">
	<table class="form-table">

	<?php
		foreach ($options as $value) {
			switch ( $value['type'] ) {
		case 'text':
	?>

	<tr>
		<th><strong><?php echo $value['name']; ?></strong></th>
		<td><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if (get_option($value['id']) != "") { echo get_option($value['id']); } else { echo $value['std']; } ?>" /> <?php echo $value['desc']; ?></td>
	</tr>

	<?php
		break;
		case 'textarea':
	?>

	<tr>
		<th><strong><?php echo $value['name']; ?></strong></th>
		<td><textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="80" rows="5"><?php if (get_option($value['id']) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std']; } ?></textarea>
		<p><?php echo $value['desc']; ?></p></td>
	</tr>

	<?php
		break;
		case 'select':
	?>

	<tr>
		<th><strong><?php echo $value['name']; ?></strong></th>
		<td><select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if (get_option($value['id']) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select> <?php echo $value['desc']; ?></td>
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
		<input name="save" type="submit" class="button button-primary" value="Save Changes" />
		<input type="hidden" name="action" value="save" />
	</p>
</form>

<?php
	}
}

add_action('admin_menu', 'tersus_add_admin');


// Automatic feed links support
// http://codex.wordpress.org/Automatic_Feed_Links

add_theme_support( 'automatic-feed-links' );


// Post format support
// http://codex.wordpress.org/Post_Formats

add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );


// Add support for the_post_thumbnail
// http://codex.wordpress.org/Post_Thumbnails

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 600, 9999, true );    // Normal post thumbnails
add_image_size( 'archive-thumbnail', 50, 50 ); // Permalink thumbnail size


// Page menu support
// http://codex.wordpress.org/Function_Reference/register_nav_menus

function register_my_menus() {
	register_nav_menus(
		array( 'header-menu' => 'Header Menu' )
	);
}

add_action( 'init', 'register_my_menus' );


// Remove non-validating parent post link from header

remove_action('wp_head', 'parent_post_rel_link');


// Add sidebar support
// http://codex.wordpress.org/Function_Reference/register_sidebar

register_sidebar(array(
	'name'=>'Sidebar1',
	'id'=>'sidebar-1',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
));

register_sidebar(array(
	'name'=>'Sidebar2',
	'id'=>'sidebar-2',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
));


// Add support for $content_width
// Required by Theme Check Guidelines
// http://make.wordpress.org/themes/guidelines/guidelines-theme-check/

if ( ! isset( $content_width ) )
	$content_width = 600;


// Replace default body class verbosity

if ( ! function_exists( 'tersus_body_class' ) ) {
	function tersus_body_class($wp_class_list, $simple_class_list) {
		// List allowed classes
		$whitelist = array('home', 'page', 'single', 'attachment', 'archive', 'search', 'error404');

		// Filter the unwanted classes
		$wp_class_list = array_intersect($wp_class_list, $whitelist);
		$tersus_body_class = $wp_class_list;
		
		// Output allowed classes
		return array_merge($wp_class_list, (array) $tersus_body_class);
	}

	add_filter('body_class', 'tersus_body_class', 10, 2);
}


// Replace default post class verbosity

if ( ! function_exists( 'tersus_post_class' ) ) {
	function tersus_post_class() {
		global $post;
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

	add_filter( 'post_class', 'tersus_post_class' );
}


// Remove non-validating rel attributes from category links

if ( ! function_exists( 'tersus_relfix' ) ) {
	function tersus_relfix($c) {
		return preg_replace('/category tag/','tag',$c);
	}

	add_filter('the_category','tersus_relfix');
}


// Remove styles injected by the Recent Comments widget
// https://core.trac.wordpress.org/ticket/11928

if ( ! function_exists( 'tersus_remove_style' ) ) {
	function tersus_remove_style() {
		global $wp_widget_factory;
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'  ) );
	}

	add_action( 'widgets_init', 'tersus_remove_style' );
}


// Add a proper thousands delimiter to category post counts

if ( ! function_exists( 'tersus_delim' ) ) {
	function tersus_delim($c) {
		return preg_replace('/(\d)(\d{3})\b/','\1,\2',$c);	// Hat tip to MyFonts for the regex tweaks
	}

	add_filter('wp_list_categories','tersus_delim');
}


// Replace single attribute quotes with double quotes

if ( ! function_exists( 'tersus_double_down' ) ) {
	function tersus_double_down($c) {
		return preg_replace('/\'/','"',$c);
	}

	add_filter('wp_tag_cloud','tersus_double_down');
	add_filter('wp_list_categories','tersus_double_down');
	add_filter('get_archives_link','tersus_double_down');
	add_filter('get_comment_author_link','tersus_double_down');
	add_filter('next_image_link','tersus_double_down');
	add_filter('previous_image_link','tersus_double_down');

	// The options-discussion.php admin page performs a preg_replace() when building the Default Avatar list.
	// Without the following check, the current user's avatar is displayed instead of the default images.

	if ( ! is_admin() ) {
		add_filter('get_avatar','tersus_double_down');
	}
}


// Remove crufty class and ID attributes from list elements

if ( ! function_exists( 'tersus_decruft' ) ) {
	function tersus_decruft($c) {
		$c_ = preg_replace('/ class=[\"\'].+?[\"\']/','',$c);
		return preg_replace('/ id=[\"\'].+?[\"\']/','',$c_);
	}

	add_filter('wp_tag_cloud','tersus_decruft');
	add_filter('wp_list_bookmarks','tersus_decruft');
	add_filter('wp_list_categories','tersus_decruft');
	add_filter('wp_list_pages','tersus_decruft');
	add_filter('wp_nav_menu','tersus_decruft');
	add_filter('wp_page_menu','tersus_decruft');
	add_filter('edit_comment_link','tersus_decruft');
	add_filter('comment_reply_link','tersus_decruft');
}


// Remove crufty class and ID attributes from tag cloud, reformat title attributes

if ( ! function_exists( 'tersus_decruft_tagcloud' ) ) {
	function tersus_decruft_tagcloud($c) {
		$c_ = preg_replace('/ style=[\"\'].+?[\"\']/','',$c);
		return preg_replace('/ title=[\"\']([0-9]+?) topic(s?)[\"\']/',' title="View \1 post\2"',$c_);
	}

	add_filter('wp_tag_cloud','tersus_decruft_tagcloud');
}


// Remove crufty class attributes from avatars

if ( ! function_exists( 'tersus_decruft_avatar' ) ) {
	function tersus_decruft_avatar($c) {
		return preg_replace('/ class=[\"\'].+?[\"\']/',' class="photo"',$c);
	}

	if ( ! is_admin() ) {	// Don't apply filter to admin pages
		add_filter('get_avatar','tersus_decruft_avatar');
	}
}


// Decruft and update comment form

if ( ! function_exists( 'tersus_decruft_comment_form' ) ) {
	function tersus_decruft_comment_form($c) {
		$find = array(
			'/ class=[\"\'].+?[\"\']/', 	// Find class attributes
			'/ id=\"reply-title\"/',		// Find id attribute
			'/<\/?small>/',					// Find <small> tags
			'/type="submit"/'				// Find submit button
			);
		$replace = array(
			'',								// Declass entire comment form
			'',								// Remove ID attribute from title_reply
			'',								// Remove <small> tags from cancel_reply_link
			'type="submit" tabindex="5"'	// Add tabindex attribute to submit button
			);
		return preg_replace($find, $replace, $c);
	}
}


// Replacement gallery shortcut function
// Removes default cruft and verbosity
//
// Portions by Michael Preuss and Aaron Cimolini
// http://snipplr.com/view.php?codeview&id=27051

if ( ! function_exists( 'tersus_gallery' ) ) {
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

		$output = "<div class=\"gallery " .$size. "\">\n";

		$i = 0;
		foreach ( $attachments as $id => $attachment ) {
		  ++$i;
			$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

			if ($itemtag) {
				$output .= "<" .$itemtag. ">";
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

	remove_shortcode('gallery');
	add_shortcode('gallery', 'tersus_gallery');
}


// Replacement comment callback function
// Remove crufty class and ID attributes

if ( ! function_exists( 'tersus_comment' ) ) {
	function tersus_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li id="comment-<?php comment_ID() ?>">
			<p>Posted by <span class="vcard author"><?php echo get_avatar( $comment->comment_author_email, 48, '', $comment->comment_author ); ?> <?php printf('<cite class="fn">%s</cite>', get_comment_author_link()) ?></span> on <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>" rel="bookmark" title="<?php comment_time('c') ?>"><?php comment_time('l, F jS, Y') ?></a>.</p>

		<?php if ($comment->comment_approved == '0') : ?>
			<p><em>This comment is awaiting moderation.</em></p>
		<?php endif; ?>

		<?php comment_text() ?>

		<p><?php edit_comment_link('Edit Comment','',' | ') ?><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
	<?php
	}
}


// Add support for the_post_thumbnail in RSS feeds

if ( ! function_exists( 'tersus_rss_thumb' ) ) {
	function tersus_rss_thumb($content) {
	   global $post;
	   if ( has_post_thumbnail( $post->ID ) ){
		   $content = '<p class="image">' . get_the_post_thumbnail( $post->ID, 'medium' ) . '</p>' . $content;
	   }
	   return $content;
	}

	add_filter('the_excerpt_rss', 'tersus_rss_thumb');
	add_filter('the_content_feed', 'tersus_rss_thumb');
}


// Tests whether post paging links should be shown

function show_post_link_nav() {
	$prev = get_previous_post();
	$next = get_next_post();
	if ( $prev || $next ) {
		return true;
	}
}


// Tests whether archive paging links should be shown

function show_posts_link_nav() {
	$prev = get_previous_posts_link();
	$next = get_next_posts_link();
	if ( $prev || $next ) {
		return true;
	}
}


// Tests whether comment paging links should be shown

function show_comments_link_nav() {
	$prev = get_previous_comments_link();
	$next = get_next_comments_link();
	if ( $prev || $next ) {
		return true;
	}
}


// Tests whether image paging links should be shown

function show_image_link_nav() {

	ob_start();
	previous_image_link();
	$prev = ob_get_contents();
	ob_end_clean();

	ob_start();
	next_image_link();
	$next = ob_get_contents();
	ob_end_clean();

	if ( $prev || $next ) {
		return true;
	}
}


// Removes the link delimiter when viewing first or last post

function delim_post_link() {
	$prev = get_previous_post();
	$next = get_next_post();
	if ( $prev && $next ) {
		$d = " | ";
		echo apply_filters( 'post_link_delim', $d );
	}
}


// Removes the link delimiter when viewing first or last archive page

function delim_posts_link() {
	$prev = get_previous_posts_link();
	$next = get_next_posts_link();
	if ( $prev && $next ) {
		$d = " | ";
		echo apply_filters( 'posts_link_delim', $d );
	}
}


// Removes the link delimiter when viewing first or last comment

function delim_comment_link() {
	$prev = get_previous_comments_link();
	$next = get_next_comments_link();
	if ( $prev && $next ) {
		$d = " | ";
		echo apply_filters( 'comment_link_delim', $d );
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
		$d = " | ";
		echo apply_filters( 'image_link_delim', $d );
	}
}


// Custom excerpt links

if ( ! function_exists( 'tersus_excerpt_more' ) ) {
	function tersus_excerpt_more($more) {
		global $post;
		$t = get_post($post->ID);
		$title = $t->post_title;
		return ' &#8230; <a href="' . get_permalink($post->ID) . '" title="Read the rest of &#8220;' . $title . '&#8221;">Read the rest of this item</a>';
	}

	add_filter('excerpt_more', 'tersus_excerpt_more');
}


// Custom title element text

if ( ! function_exists( 'tersus_title' ) ) {
	function tersus_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() )
			return $title;

		// Add the site name
		$title .= get_bloginfo( 'name' );

		// Add the site description to home or front page
		// $site_description = get_bloginfo( 'description', 'display' );
		// if ( $site_description && ( is_home() || is_front_page() ) )
		//		$title = "$title $sep $site_description";

		// Add tag designation
		if ( is_tag() )
			$title = 'Tag ' . "$sep $title";

		// Add category designation
		if ( is_category() )
			$title = 'Category ' . "$sep $title";

		// Add archive designation
		if ( is_day() || is_month() || is_year() )
			$title = 'Archive ' . "$sep $title";

		// Add pretty search terms
		if ( is_search() )
			$title = 'Search Results ' . "$sep " . '&#8220;' . get_search_query() . '&#8221;' . " $sep " . get_bloginfo( 'name' );

		// Add a page number if necessary
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( 'Page %s', max( $paged, $page ) );

		return $title;
	}

	add_filter( 'wp_title', 'tersus_title', 10, 2 );
}

?>
