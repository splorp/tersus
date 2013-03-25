<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php
	global $options;
	foreach ($options as $value) {
		if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); }
	}
?>

		<footer>
			<p>
				Powered by <a href="http://wordpress.org/" rel="external" title="Code is poetry.">WordPress <?php bloginfo('version'); ?></a>
			<?php if ($tersus_theme_information == "1"): ?><br />
				Themed by <a href="<?php echo THEME_URI; ?>" rel="external" title="<?php echo THEME_DESCRIPTION; ?>"><?php echo THEME_NAME; ?> <?php echo THEME_VERSION; ?></a>
				<?php if (defined('CHILD_THEME_NAME')): ?><br />
				Styled by <a href="<?php echo CHILD_THEME_URI; ?>" rel="external" title="<?php echo CHILD_THEME_DESCRIPTION; ?>"><?php echo CHILD_THEME_NAME; ?> <?php echo CHILD_THEME_VERSION; ?></a>
				<?php endif; ?>
			<?php endif; ?>
			</p>
			<p>
				Subscribe to <a href="<?php bloginfo('rss2_url'); ?>" rel="alternate" title="Feed me.">Posts (RSS)</a> or
				<a href="<?php bloginfo('comments_rss2_url'); ?>" rel="alternate" title="Feed me.">Comments (RSS)</a>
			</p>
			<?php wp_footer(); ?>
		</footer>
	</body>
</html>