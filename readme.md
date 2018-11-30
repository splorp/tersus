
# Tersus

An achingly simple WordPress theme without all the usual cruft.


## About

Tersus is an exercise in publishing template minimalism.

Why create yet another theme? Well, as clean and stripped down as some themes are, we wanted to prune things a bit further.

Tersus was originally named Simplicity — a term that described exactly what the project was all about. However, that was prior to the discovery of a [WordPress](http://wordpress.org/) theme already using that very name. After a brief discussion, several Latin terms were bandied about as replacements. Tersus (which means ‘clean, neat, or cleansed’) seemed to fit the bill rather nicely — and here we are.

A version of Tersus is being developed for [Tumblr](http://tersustheme.tumblr.com/) and is also [available on GitHub](http://github.com/splorp/tersus-tumblr/).

Keep track of Tersus development on [Twitter](http://twitter.com/tersustheme).


## Requirements

* WordPress 3.4 or later


## Features

+ HTML5 structure and compliance
+ CSS that has been reset and built from the ground up
+ Non-semantic, presentational markup has been dispatched
+ Built-in theme options for navigation, sidebar, footer, and announcement text
+ Two widget-enabled sidebar areas
+ Responsive, adaptive layout for small screens
+ Clean, valid, and awesome
+ WordPress [Theme Check Guidelines](http://make.wordpress.org/themes/guidelines/guidelines-theme-check/) compliance (a work in progress)


## Child Themes

By removing the majority of the presentational markup and other cruft from the Tersus parent theme, we’ve opened the door for child themes to pick up the aesthetic slack. There are currently two child themes being developed for Tersus.

+ [Newted](http://github.com/splorp/newted/) by [Grant Hutchinson](http://splorp.me/)
+ [Splorp](http://github.com/splorp/splorp/) by [Grant Hutchinson](http://splorp.me/)
+ [Super Ginormous](https://github.com/cdharrison/super-ginormous) by [Chris Harrison](http://cdharrison.com/)


## Credits

Tersus is brought to you by [Chris Harrison](http://cdharrison.com/), [Grant Hutchinson](http://splorp.me/), [Dan Rubin](http://danielrubin.org/), and [Andy van der Raadt](http://nicemodernist.com/).

Lovely chaps, all of them.

The groundwork for Tersus was based on the [Starkers](http://starkerstheme.com/) theme created by the affable [Elliot Jay Stocks](http://elliotjaystocks.com/).

We’d also like to give some props to the fine individuals and handy resources which have made the development of Tersus much more enjoyable. Currently on the guest list are [Grettir Asmundarson](http://tinypineapple.com/), [Beau Calvez](http://twitter.com/avengio), [Adam Chamberlin](http://shibbyonline.co.uk/), [David Kendal](http://davidkendal.net/), [BBEdit](http://www.barebones.com/products/bbedit/), [CSS Lint](http://csslint.net/), [GitHub for Mac](http://mac.github.com/), Google’s [Rich Snippets Testing Tool](http://www.google.com/webmasters/tools/richsnippets), [HTML5 Shiv](https://github.com/aFarkas/html5shiv), and [Theme-Check](http://pross.org.uk/plugins/theme-check/).

Cheers.


## Licensing

The Tersus theme is absolutely free and conveniently licensed under GPL. You may use it for personal or commercial projects, as you see fit. Please refer to the [license.txt](https://github.com/splorp/tersus/blob/master/license.txt) file included with the source for more information.

Portions of the stylesheets are based on the [YUI CSS Reset](http://developer.yahoo.com/yui/reset/) and [YUI CSS Base](http://developer.yahoo.com/yui/base/) tools provided as part of the [Yahoo! User Interface Library](http://developer.yahoo.com/yui/). All of the [YUI Library](http://developer.yahoo.com/yui/ "Copyright © Yahoo! Inc. All rights reserved") components are provided free of charge under a liberal [BSD license](http://yuilibrary.com/license/).

The [HTML5 Shiv](https://github.com/afarkas/html5shiv) script is licensed under MIT/GPL2.


## Version History

### 0.3.1 — The “Missing, Inaction” Release

+ Fixed error where `$tersus_body_class` wasn’t defined in `functions.php`
+ Added `id` attributes to `register_sidebar()` function per WordPress 4.2 requirements
+ Fixed duplicate `text-decoration` attributes on `<abbr>` and `acronym` elements
+ Updated to HTML5 Shiv 3.7.3
+ Removed deprecated theme tags


### 0.3.0 — The “Chk-Chk-Boom” Release

+ Theme passes WordPress Theme Check Guidelines
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
+ Custom link delimiter functions are now filterable too
+ Changed post and page navigation to `<nav>` elements
+ Updated to HTML5 Shiv 3.7.2


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
+ Embiggened theme screenshot to WordPress 3.8 specifications
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
+ Updated to HTML5 Shiv 3.7.0
+ Replaced deprecated `get_settings` function with `get_option`
+ Replaced deprecated `wp_specialchars` function with `esc_html`
+ Replaced deprecated `automatic_feed_links` function with `add_theme_support`
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
+ Replaced the externally linked HTML5 Shiv with a local, minified version
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
+ Reset and base stylesheets are now based on YUI 2.8.2
+ Added artwork for the screenshot and favicon files
+ Updated `screenshot.png`
+ Updated `favicon.ico`


### 0.1.0 — The “Getting Our Feet Wet” Release

+ Initial tinkering
