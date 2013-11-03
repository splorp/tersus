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
			<?php
			if ($tersus_footer_display == "1"):
				echo (stripslashes($tersus_footer_text));
			endif;
			if ($tersus_theme_information == "1"): ?>
			<ul>
				<li>Powered by <a href="http://wordpress.org/" rel="external" title="Code is poetry.">WordPress <?php bloginfo('version'); ?></a></li>
				<li>Themed by <a href="<?php echo THEME_URI; ?>" rel="external" title="<?php echo THEME_DESCRIPTION; ?>"><?php echo THEME_NAME; ?> <?php echo THEME_VERSION; ?></a></li>
				<?php if (defined('CHILD_THEME_NAME')): ?>
				<li>Styled by <a href="<?php echo CHILD_THEME_URI; ?>" rel="external" title="<?php echo CHILD_THEME_DESCRIPTION; ?>"><?php echo CHILD_THEME_NAME; ?> <?php echo CHILD_THEME_VERSION; ?></a></li>
				<?php endif; ?>
			</ul>
			<?php endif; ?>
			<ul>
				<li>Subscribe to <a href="<?php bloginfo('rss2_url'); ?>" rel="alternate" title="Feed me.">all posts</a> (RSS)</li>
				<li>Subscribe to <a href="<?php bloginfo('comments_rss2_url'); ?>" rel="alternate" title="Feed me.">all comments</a> (RSS)</li>
			<?php if (is_singular()): ?>
				<li>Subscribe to <a href="<?php echo get_post_comments_feed_link(); ?>" rel="alternate" title="Feed me.">comments for this page only</a> (RSS)</li>
			<?php endif; ?>
			</ul>
		</footer>

		<?php wp_footer(); ?>

	</body>
</html>
