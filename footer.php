<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>
		<footer>
			<p>
				Powered by <a href="http://wordpress.org/" rel="external" title="Code is poetry.">WordPress <?php bloginfo('version'); ?></a><br />
				Themed by <a href="<?php echo THEME_URI; ?>" rel="external" title="<?php echo THEME_DESCRIPTION; ?>"><?php echo THEME_NAME; ?> <?php echo THEME_VERSION; ?></a>
				<?php if (defined('CHILD_THEME_NAME'))
					{ ?><br />
				Styled by <a href="<?php echo CHILD_THEME_URI; ?>" rel="external" title="<?php echo CHILD_THEME_DESCRIPTION; ?>"><?php echo CHILD_THEME_NAME; ?> <?php echo CHILD_THEME_VERSION; ?></a>
				<?php } ?>
			</p>
			<p>
				Subscribe to <a href="<?php bloginfo('rss2_url'); ?>" rel="alternate" title="Feed me.">Posts (RSS)</a> or
				<a href="<?php bloginfo('comments_rss2_url'); ?>" rel="alternate" title="Feed me.">Comments (RSS)</a>
			</p>
			<?php wp_footer(); ?>
		</footer>
	</body>
</html>