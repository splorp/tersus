<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>
		<footer>
			<p>
				Powered by <a href="http://wordpress.org/" rel="external" title="Code is poetry.">WordPress <?php bloginfo('version'); ?></a> &amp;
				<a href="http://tersustheme.com/" rel="external" title="Simple, clean, cruftless.">Tersus <?php echo THEME_VERSION; ?></a>
			</p>
			<p>
				Subscribe to <a href="<?php bloginfo('rss2_url'); ?>" rel="alternate" title="Feed me.">Posts (RSS)</a> or
				<a href="<?php bloginfo('comments_rss2_url'); ?>" rel="alternate" title="Feed me.">Comments (RSS)</a>
			</p>
			<?php wp_footer(); ?>
		</footer>
	</body>
</html>