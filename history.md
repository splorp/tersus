
# Tersus

An achingly simple WordPress theme without all the usual cruft.


## Version History

### 0.4.2 — The “Light Spackling” Release

+ Set default `<body>` background colour
+ Changed `<body>` margin values from `px` to `em`
+ Tidied up the appearance of the ‘reply’ and ‘edit comment’ links
+ Removed superfluous `update_option()` function causing ‘undefined array key’ errors

### 0.4.1 — The “Seeing Things” Release

+ Removed link to home page when viewing the home page
+ Links to untitled posts now display proper `title` attributes
+ Added character escaping to validator links in the default sidebar
+ Improved access to `wp_get_theme()` data

### 0.4.0 — The “Burn It All Down” Release

+ Theme now requires WordPress 5.0 or later
+ Theme now passes the basic [Theme Review Process](https://make.wordpress.org/themes/handbook/review/) tests
+ Added character escaping to the `home_url()` function
+ Added `wp_body_open` function to `header.php`
+ Added `theme_location` to `wp_nav_menu` function and simplified parameter loading
+ Added theme text domain to `register_nav_menus` function
+ Added `html5` theme support feature
+ Replaced `wp_title` with `title-tag` theme support feature
+ Refactored `add_theme_support` functions
+ Removed Windows Live Writer manifest link from `<head>`
+ Removed WordPress emoji styles and scripts from `<head>`
+ Removed Gutenberg block editor cruft from `<head>`
+ Removed linked icon elements from `<head>`
+ Embiggened site icon artwork
+ Added a dark variant of the site icon
+ Removed legacy icon and artwork files
+ Removed duplicate post and page navigation located above the content
+ Removed posts by author function from `archive.php` since it wasn’t being used
+ Removed gallery decrufting function per theme check guidelines
+ Added missing `title` attributes to post navigation links
+ Added missing `title` and `rel` attributes to image navigation links
+ Added missing `title` and `rel` attributes to post pagination links
+ Added missing `title` and `rel` attributes to comment pagination links
+ Fixed improperly defined category and tag variables in `404.php`
+ Fixed naming references for the dynamic sidebar elements
+ Added WordPress and PHP version requirements fields to `style.css` header
+ Added `.screen-reader-text` class to `core.css`
+ Changed all HTML entities back to their original ASCII characters
+ Replaced `reset.css` with [normalize.css](http://necolas.github.io/normalize.css/)
+ Removed [HTML5 Shiv](https://github.com/afarkas/html5shiv) because really
+ Updated license to [GPLv3](https://www.gnu.org/licenses/gpl-3.0.html)
+ Added plain text version of read me file to comply with theme requirements
+ Moved the version history from the read me file to its own document


### 0.3.1 — The “Missing, Inaction” Release

+ Theme now requires WordPress 4.1 or later
+ Fixed error where `$tersus_body_class` wasn’t defined in `functions.php`
+ Added `id` attributes to `register_sidebar()` function
+ Added `Text Domain` field to `style.css` header
+ Fixed duplicate `text-decoration` attributes on `<abbr>` and `<acronym>` elements
+ Fixed broken display of theme options
+ Custom link delimiter functions are now filterable
+ Changed post and page navigation to `<nav>` elements
+ Removed duplicate closed comments messaging
+ Embiggened theme screenshot, this time with feeling
+ Removed deprecated theme tags
+ Updated to [HTML5 Shiv](https://github.com/afarkas/html5shiv) 3.7.3


### 0.3.0 — The “Chk-Chk-Boom” Release

+ Added `$content_width` theme feature
+ Added `alt` attributes to post and comment author avatars
+ Reinstated `body_class()` function with an extremely stripped down set of classes
+ Reinstated `comment_form()` function
+ Reinstated default comment form anchors
+ Removed extraneous slashes from tag cloud links
+ Removed weird “do not load this page directly” check from comments template
+ Removed renegade styles injected by the Recent Comments widget
+ Standardized attribute quoting for several WordPress functions and template tags
+ Embiggened display of content on image attachment pages
+ Decrufting filters are no longer applied to avatars on admin pages
+ Namespaced all theme functions with the `tersus_` prefix
+ Custom theme functions are now pluggable by child themes
+ Updated to [HTML5 Shiv](https://github.com/afarkas/html5shiv) 3.7.2


### 0.2.2 — The “Pretty Pony” Release

+ Theme now requires WordPress 3.4 or later
+ Replaced deprecated `get_theme_data()` function with `wp_get_theme()`
+ Replaced `bloginfo('language')` function with `language_attributes()`
+ Replaced `bloginfo('stylesheet_directory')` function with `get_stylesheet_directory_uri()`
+ Replaced `get_option('home')` and `bloginfo('url')` functions with `home_url()`
+ Replaced `the_date()` function with `the_time(get_option('date_format'))` to use the formatting specified in settings
+ Replaced `TEMPLATEPATH` constant with `get_template_directory()` for more consistent support in child themes
+ Replaced a handful of renegade PHP short tags for code consistency
+ A custom menu must now be defined to display navigation above main content
+ Decrufted navigation and page menu lists
+ Removed unused `_e()` and `__()` text localization functions
+ Removed `$post` hack from `archive.php` since `the_date()` is no longer being used
+ Reinstated the `get_search_form()` function in `sidebar.php` because drunk
+ Reinstated properly formatted tag cloud title attributes
+ Reinstated some core WordPress classes so the theme options look prettier
+ Removed reset button from theme options
+ Added theme option to toggle the display of custom footer text
+ Consolidated display of theme and version information in footer
+ Consolidated comment feeds for individual pages and posts in footer
+ Tidied up the comment form and related support text
+ Added a handful of declarations for WordPress-generated classes to `core.css`
+ Added icons to support iOS 7
+ Updated all iOS and Windows 8 icons for typographic consistency
+ Embiggened theme screenshot, again
+ Replaced the rather free spirited theme tags with official WordPress tags
+ Changed all raw high-ASCII characters to HTML entities


### 0.2.1 — The “Engorged” Release

+ Theme now requires WordPress 3.0 or later
+ Added support for archives page template
+ Added support for links page template
+ Archive and search result page titles are more descriptive
+ Enabled `viewport` page zoom
+ Embiggened theme screenshot to support HiDPI displays
+ Embiggened theme avatar to support HiDPI displays
+ Added support for the proliferation of various iOS and Windows 8 iconography
+ Added specificity to the `[if IE]` conditional
+ Updated to [HTML5 Shiv](https://github.com/afarkas/html5shiv) 3.7.0
+ Replaced deprecated `get_settings` function with `get_option`
+ Replaced deprecated `wp_specialchars` function with `esc_html`
+ Replaced deprecated `automatic_feed_links` function with `add_theme_support` equivalent
+ Fixed ‘undefined index’ debug errors in theme admin functions
+ Fixed ‘undefined variable’ debug error in `simple_post_class` function
+ Fixed ‘undefined variable’ debug error in `searchform.php`


### 0.2.0 - The “Flavourless” Release

+ Removed theme ‘flavours’ and the related switching option
+ Theme styles are now supported via child themes
+ Theme now uses both parent and child theme favicons
+ The theme version has returned to the footer
+ The name and version of the child theme are now displayed in the footer
+ Fixed improperly generated gallery description lists
+ Fixed display of empty wrapper elements on post and archive pages
+ Standardized comment navigation links
+ Added support for `wp_nav_menu` navigation menu
+ Added theme option to toggle the display of navigation menu
+ Added theme option to toggle the display of theme information in the footer
+ Added `language` attribute to `<html>` element
+ Simplified subcategory lists
+ Replaced the externally linked [HTML5 Shiv](https://github.com/afarkas/html5shiv) with a local, minified version
+ Embiggened theme screenshot


### 0.1.6 - The “Nice Consistency” Release

+ Added support for category archives
+ Added support for tag archives
+ Added support for basic post format styles
+ Fixed intra-blockquote margins
+ Fixed widget spacing on advanced layouts
+ Post formatting is more consistent in archives and search results
+ Fixed and tuned up non-functional `the_excerpt` links
+ Fixed viewport wonkiness on non-desktop screens
+ Fleshed out hAtom microformats markup
+ Added smarter handling of parent pages for categories and tags
+ Replaced the default gallery with a decrufted version
+ Tidied up the display of attached images
+ Date stamps are now based on the WordPress Date Format setting


### 0.1.5 - The “Good, Bad & Less Ugly” Release

+ New theme options for non-widget’d page, category, and archive lists
+ Sidebar markup changed to `<aside>` elements
+ Wrapped author names in `<cite>` elements
+ Added basic stylee for `<blockquote>`
+ Super Ginormous layout style is more responsive
+ Fixed collapsing margins when using advanced layout on small screens
+ Fixed display of archives when widgets are active
+ Comment lists now use custom callback function
+ Further decrufting of comments and comment forms
+ Removed crufty classes from avatars
+ Consolidated decrufting functions
+ Fixed stylesheet parsing errors uncovered by CSS Lint
+ Tidied up the display of search results


### 0.1.4 — The “Wrap It!” Release

+ Updated markup to use `<section>` and `<article>` elements
+ New theme option to display site-wide ‘announcement’ banner
+ Advanced layout style is more responsive
+ Advanced layout typography and colours have been adjusted
+ Form elements now have more consistent stylee
+ Tag lists now only appear if there are tags present
+ All `rel` attributes now validate
+ Added current theme style to footer
+ Removed a schwack of empty CSS selectors
+ Standardized stylesheet naming conventions
+ Lots of text consistency tweakage


### 0.1.3 - The “About Time This Thing Was Updated Again” Release

+ Added theme options for switching between stylesheets
+ Added ‘Advanced’ and ‘Super Ginormous’ alternate stylesheets
+ Added support for post formats
+ Added missing `get_sidebar()` function to applicable templates
+ Added fallback for `the_title` for untitled pages and posts
+ Changed base font stack to sans serif
+ Updated `simple_post_class` to support a `format-type` classname, if applicable
+ Replaced static class declarations with `post_class` function
+ Standardized ‘not found’ messaging
+ Standardized and simplified header text and formatting
+ Simplified ‘older’ and ‘newer’ link text
+ Fixed invalid `<textarea>` attributes
+ Removed non-valid, IE-specific CSS selectors
+ Removed `get_search_form()` function from everywhere except the sidebar
+ Continued HTML5 conversion


### 0.1.2 — The “Dustbunnies” Release

+ Added theme information constants
+ Added contextual delimiters to next and previous links
+ Updated sidebar formatting and default ‘meta’ links
+ Tags and categories are now formatted as unordered lists
+ Paging links are now consistent top and bottom of pages
+ Edit links are now consistent
+ Removed superfluous list formatting around search text
+ Removed duplicate search form from 404 page
+ Removed crufty classes from comment lists


### 0.1.1 — The “We Don’t Need No Stinkin’ Stylesheet” Release

+ Fixed the ‘headers already sent’ error
+ Reset and base stylesheets are now based on the [Yahoo! User Interface Library](https://github.com/yui/yui2)
+ Added artwork for the screenshot and favicon files
+ Updated `screenshot.png`
+ Updated `favicon.ico`


### 0.1.0 — The “Getting Our Feet Wet” Release

+ Initial tinkering
