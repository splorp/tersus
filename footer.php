<?php
/**
 * @package WordPress
 * @subpackage Simplicity
 */
?>

		<!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
		<p><?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress <?php bloginfo('version'); ?></a> <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>. <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. --></p>
		
		<?php wp_footer(); ?>

	</body>

</html>