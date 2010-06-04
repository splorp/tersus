<?php
/**
 * @package WordPress
 * @subpackage Simplicity
 */
?>
		<footer>
			<p>Powered by <a href="http://wordpress.org/">WordPress <?php bloginfo('version'); ?></a></p>
			<p>Subscribe to <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> or <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></p>
			<?php wp_footer(); ?>
		</footer>
	</body>
</html>