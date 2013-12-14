<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
	<p class="alert">This post is password protected. Enter the password to view comments.</p>
<?php
	return;
}

if ( have_comments() ) : ?>
	<h3><?php comments_number('No Comments', 'One comment', '% comments' );?> on &#8220;<?php the_title(); ?>&#8221;</h3>

<?php if (show_comments_link_nav()): ?>
	<p><?php previous_comments_link('Older'); delim_comment_link(); next_comments_link('Newer') ?></p>
<?php endif; ?>

	<ol>
		<?php wp_list_comments('type=comment&callback=tersus_comment'); ?>
	</ol>

<?php if (show_comments_link_nav()): ?>
	<p><?php previous_comments_link('Older'); delim_comment_link(); next_comments_link('Newer') ?></p>
<?php endif; ?>

<?php else :					// No comments posted
	if ( comments_open() ) :	// Comments are open, but no comments posted
	else :						// Comments are closed
	?>
	<p>Comments are closed.</p>
	<?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="comment">

	<h3><?php comment_form_title( 'Leave a comment.', 'Reply to %s.' ); ?></h3>

	<p><?php cancel_comment_reply_link(); ?></p>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Log into your account">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

		<?php if ( is_user_logged_in() ) : ?>

		<p>You are logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php" title="View and edit your profile"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out</a></p>

		<?php else : ?>

		<p><label for="author">Name <?php if ($req) echo "(required)"; ?></label> <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></p>

		<p><label for="email">Email (<?php if ($req) echo "required, but "; ?>will not be published)</label> <input type="email" name="email" id="email" placeholder="you@example.com" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
		</p>

		<p><label for="url">Website</label> <input type="url" name="url" id="url" placeholder="http://example.com" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" /></p>

		<?php endif; ?>

		<textarea name="comment" cols="40" rows="10" tabindex="4"></textarea>

		<p><strong>You may use the following tags to format your comment:</strong></p>
		<p><code><?php echo allowed_tags(); ?></code></p>

		<input name="submit" type="submit" tabindex="5" value="Submit Comment" />
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; ?>

</div>

<?php endif; ?>