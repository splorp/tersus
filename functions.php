<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */


// Define theme constants

$theme_name = 'tersus';
$theme_name_full = wp_get_theme()->get('Name');

define('THEME_URI', wp_get_theme($theme_name)->get('ThemeURI'));
define('THEME_NAME', wp_get_theme($theme_name)->get('Name'));
define('THEME_VERSION', trim(wp_get_theme($theme_name)->get('Version')));
define('THEME_DESCRIPTION', trim(wp_get_theme($theme_name)->get('Description')));


// Tersus theme options

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
					if( isset( $_REQUEST[ $value['id'] ] ) ) {
						update_option( $value['id'], $_REQUEST[ $value['id'] ] );
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

// Theme feature support

if ( ! function_exists('theme_support_features') ) {
	function theme_support_features() {

		// Add theme support for automatic feed links
		// https://codex.wordpress.org/Automatic_Feed_Links
		add_theme_support( 'automatic-feed-links' );

		// Add theme support for post formats
		// https://wordpress.org/documentation/article/post-formats/
		add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat' ) );

		// Add theme support for HTML5 markup for various page elements
		// https://codex.wordpress.org/Theme_Markup
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// Add theme support for featured images
		// https://codex.wordpress.org/Post_Thumbnails
		add_theme_support( 'post-thumbnails' );

		// Add theme support for document title tag
		// https://codex.wordpress.org/Title_Tag
		add_theme_support( 'title-tag' );

		}
	add_action( 'after_setup_theme', 'theme_support_features' );
}


// Page menu support
// https://developer.wordpress.org/reference/functions/register_nav_menus/

if ( ! function_exists('register_my_menus') ) {
	function register_my_menus() {
		register_nav_menus(
			array( 'header-menu' => __('Header Menu', 'tersus') )
		);
	}
	add_action( 'init', 'register_my_menus' );
}


// Remove non-validating parent post link from head
remove_action('wp_head', 'parent_post_rel_link');

// Remove Windows Live Writer manifest link from head
remove_action('wp_head', 'wlwmanifest_link');

// Remove WordPress emoji cruft from head
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

// Remove Gutenberg cruft CSS from head
if ( ! function_exists('tersus_gutenberg_cruft') ) {
	function tersus_gutenberg_cruft() {
		wp_dequeue_style( 'wp-block-library' );
	}
	add_action('wp_enqueue_scripts', 'tersus_gutenberg_cruft');
	remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
	remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
}


// Remove WordPress gallery inline CSS
add_filter( 'use_default_gallery_style', '__return_false' );

// Add sidebar support
// https://developer.wordpress.org/reference/functions/register_sidebar/

register_sidebar( array (
	'name'			=> 'Sidebar 1',
	'id'			=> 'sidebar-1',
	'before_widget'	=> '<li id="%1$s" class="widget %2$s">',
	'after_widget'	=> '</li>',
	'before_title'	=> '<h2 class="widgettitle">',
	'after_title'	=> '</h2>',
) );

register_sidebar( array (
	'name'			=> 'Sidebar 2',
	'id'			=> 'sidebar-2',
	'before_widget'	=> '<li id="%1$s" class="widget %2$s">',
	'after_widget'	=> '</li>',
	'before_title'	=> '<h2 class="widgettitle">',
	'after_title'	=> '</h2>',
) );


// Add support for $content_width
// Required by Theme Check Guidelines
// https://make.wordpress.org/themes/guidelines/guidelines-theme-check/

if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

// Replace default body class verbosity

if ( ! function_exists( 'tersus_body_class' ) ) {
	function tersus_body_class($wp_class_list, $simple_class_list) {
		// List allowed classes
		$allowed_class_list = array('home', 'page', 'single', 'attachment', 'archive', 'search', 'error404');

		// Filter the unwanted classes
		$wp_class_list = array_intersect($wp_class_list, $allowed_class_list);
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
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
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


// Replace malformed robots meta element

if ( ! function_exists( 'tersus_wp_head_tidy' ) ) {
	remove_filter('wp_robots', 'wp_robots_max_image_preview_large');
	function tersus_wp_robots_tidy() {
		echo '<meta name="robots" content="index, follow" />' . PHP_EOL;
	}
	add_action('wp_head', 'tersus_wp_robots_tidy');
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
			'/h3/',							// Find <h3> tags
			'/ class=[\"\'].+?[\"\']/', 	// Find class attributes
			'/ id=\"reply-title\"/',		// Find selector and id attribute
			'/<\/?small>/',					// Find <small> tags
			'/type="submit"/'				// Find submit button
			);
		$replace = array(
			'p',							// Replace with <p> tags
			'',								// Declass entire comment form
			'',								// Remove ID attribute from title_reply
			'',								// Remove <small> tags from cancel_reply_link
			'type="submit" tabindex="5"'	// Add tabindex attribute to submit button
			);
		return preg_replace($find, $replace, $c);
	}
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

		<p><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> <?php edit_comment_link('Edit Comment','','') ?></p>
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


// Add missing attributes to next and previous post links

function add_next_post_attributes($attr) {
	$attr = str_replace("href=", 'title="View the next post" href=', $attr);
	return $attr;
}
function add_prev_post_attributes($attr) {
	$attr = str_replace("href=", 'title="View the previous post" href=', $attr);
	return $attr;
}
add_filter('next_post_link', 'add_next_post_attributes');
add_filter('previous_post_link', 'add_prev_post_attributes');


// Add missing attributes to next and previous image links

function add_next_image_attributes($attr) {
	$attr = str_replace("href=", 'title="View the next image" rel="next" href=', $attr);
	return $attr;
}
function add_prev_image_attributes($attr) {
	$attr = str_replace("href=", 'title="View the previous image" rel="prev" href=', $attr);
	return $attr;
}
add_filter('next_image_link', 'add_next_image_attributes');
add_filter('previous_image_link', 'add_prev_image_attributes');


// Add missing attributes to next and previous post page links

if ( !function_exists( 'add_next_posts_attributes' ) ) {
	function add_next_posts_attributes($attr) {
		$attr = 'rel="next" title="View the next page of posts"';
		return $attr;
	}
}
if ( !function_exists( 'add_prev_posts_attributes' ) ) {
	function add_prev_posts_attributes($attr) {
		$attr = 'rel="prev" title="View the previous page of posts"';
		return $attr;
	}
}
add_filter('next_posts_link_attributes', 'add_next_posts_attributes');
add_filter('previous_posts_link_attributes', 'add_prev_posts_attributes');


// Add missing attributes to next and previous comment page links

if ( !function_exists( 'add_next_comments_attributes' ) ) {
	function add_next_comments_attributes($attr) {
		$attr = 'rel="next" title="View the next page of comments"';
		return $attr;
	}
}
if ( !function_exists( 'add_prev_comments_attributes' ) ) {
	function add_prev_comments_attributes($attr) {
		$attr = 'rel="prev" title="View the previous page of comments"';
		return $attr;
	}
}
add_filter('next_comments_link_attributes', 'add_next_comments_attributes');
add_filter('previous_comments_link_attributes', 'add_prev_comments_attributes');


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
		if ($t->post_title != '') {
			$title = '“' . $t->post_title . '”';
		} else {
			$title = 'this post.';
		}
		return ' … <a href="' . get_permalink($t) . '" title="Read the rest of ' .$title . '">More</a>';
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
			$title = 'Search Results ' . "$sep " . '“' . get_search_query() . '”' . " $sep " . get_bloginfo( 'name' );

		// Add a page number if necessary
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( 'Page %s', max( $paged, $page ) );

		return $title;
	}

	add_filter( 'wp_title', 'tersus_title', 10, 2 );
}

?>
