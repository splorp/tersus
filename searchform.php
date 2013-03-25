<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
    <input type="text" value="<?php echo esc_html(the_search_query()); ?>" name="s" />
    <input type="submit" value="Search" />
</form>
