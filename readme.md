
# Tersus

An achingly simple WordPress theme without all the usual cruft.


## About

Tersus is an exercise in publishing template minimalism.

Why create yet another theme? As clean and stripped down as some themes are, we wanted to prune things a bit further.

Tersus was originally named Simplicity — a term that described exactly what the project was all about. However, that was prior to the discovery of a [WordPress](http://wordpress.org/) theme already using that very name. After a brief discussion, several Latin terms were bandied about as replacements. Tersus (which means ‘clean, neat, or cleansed’) seemed to fit the bill rather nicely — and here we are.

A version of Tersus is also being developed for [Tumblr](http://tersustheme.tumblr.com/) and is also [available on GitHub](http://github.com/splorp/tersus-tumblr/).

Keep track of Tersus development on [Twitter](http://twitter.com/tersustheme).


## Features

+ HTML5 structure and compliance
+ CSS that has been reset and built from the ground up
+ Non-semantic, presentational markup has been dispatched
+ Built-in theme layout, sidebar, and announcement options
+ Responsive, adaptive layout for small screens
+ Clean, valid, and awesome


## Child Themes

By removing the majority of the presentational markup from the Tersus parent theme, we’ve opened the door for child themes to pick up the aesthetic slack. There are currently two child themes being developed for Tersus.

+ [Splorp](http://github.com/splorp/splorp/) by [Grant Hutchinson](http://splorp.me/)
+ [Super Ginormous](https://github.com/cdharrison/super-ginormous) by [Chris Harrison](http://cdharrison.com/)


## Credits

The Tersus project is brought to you by [Chris Harrison](http://cdharrison.com/), [Grant Hutchinson](http://splorp.me/), [Dan Rubin](http://danielrubin.org/), and [Andy van der Raadt](http://nicemodernist.com/).

Lovely chaps, all of them.

The groundwork for Tersus was based on the [Starkers](http://starkerstheme.com/) theme created by the affable [Elliot Jay Stocks](http://elliotjaystocks.com/).

We’d also like to give some props to the fine individuals and handy resources which have made the development of Tersus much more enjoyable. On the currently guest list are [Grettir Asmundarson](http://tinypineapple.com/), [Beau Calvez](http://twitter.com/avengio), [David Kendal](http://davidkendal.net/), [BBEdit](http://www.barebones.com/products/bbedit/), [CSS Lint](http://csslint.net/), [GitHub for Mac](http://mac.github.com/), Google’s [Rich Snippets Testing Tool](http://www.google.com/webmasters/tools/richsnippets), and [HTML5 Shiv](https://github.com/aFarkas/html5shiv).

Cheers.


## Licensing

The Tersus theme is absolutely free and conveniently licensed under GPL. You may use it for personal or commercial projects, as you see fit. Please refer to the [license.txt](https://github.com/splorp/tersus/blob/master/license.txt) file included with the source for more information.

Portions of the stylesheets are based on the [YUI CSS Reset](http://developer.yahoo.com/yui/reset/) and [YUI CSS Base](http://developer.yahoo.com/yui/base/) tools provided as part of the [Yahoo! User Interface Library](http://developer.yahoo.com/yui/). All of the [YUI Library](http://developer.yahoo.com/yui/) components are provided free of charge under a liberal [BSD license](http://yuilibrary.com/license/). Copyright © 2012 Yahoo! Inc. All rights reserved.

The [HTML5 Shiv](https://github.com/aFarkas/html5shiv) script is licensed under MIT/GPL2.


## Version History

### 0.1.7 - The “Flavourless” Release

+ Removed theme ‘flavours’ and the related switching option
+ Theme styles are now supported via child themes
+ Theme now uses both parent and child theme favicons
+ Fixed improperly generated gallery description lists
+ Replaced the externally linked HTML5 Shiv with a local, minified version
+ Added support for page menu navigation
+ Added theme option to display page menu navigation
+ The theme version is displayed in the footer again
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
+ All ‘rel’ attributes now validate
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
+ Fixed invalid textarea attributes
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
+ Updated screenshot.png
+ Updated favicon.ico


### 0.1.0 — The “Getting Our Feet Wet” Release

+ Initial tinkering
