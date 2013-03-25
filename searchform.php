<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
    <input type="text" value="<?php echo esc_html($s); ?>" name="s" />
    <input type="submit" value="Search" />
</form>
