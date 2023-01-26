<?php
/**
 * @package WordPress
 * @subpackage Tersus
 */
?>

<?php

if ( post_password_required() ) { ?>
	<p class="alert">This post is password protected. Enter the password to view comments.</p>
<?php
	return;
}

if ( have_comments() ) : ?>
	<h3><?php comments_number('No Comments', 'One comment', '% comments' );?> on “<?php the_title(); ?>”</h3>

	<ol>
		<?php wp_list_comments('type=comment&callback=tersus_comment'); ?>
	</ol>

<?php if (show_comments_link_nav()): ?>
	<nav><?php previous_comments_link('Older Comments'); delim_comment_link(); next_comments_link('Newer Comments') ?></nav>
<?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) :

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? ' aria-required="true"' : '' );

	$tersus_comment_args = array(
		'id_form'			=> 'commentform',
		'id_submit'			=> 'submit',
		'title_reply'		=> 'Leave a comment.',
		'title_reply_to'	=> 'Replying to %s.',
		'cancel_reply_link'	=> 'Cancel Reply',
		'label_submit'		=> 'Submit Comment',

		'comment_field' => '' . '<p><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" tabindex="4">' .
			'</textarea></p>',

		'must_log_in' => '<p>' .
			sprintf( 'You must be <a href="%s" title="Log into your account">logged in</a> to post a comment.' ,
				wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
			) . '</p>',

		'logged_in_as' => '<p>' .
			sprintf( 'You are logged in as <a href="%1$s" title="View and edit your profile">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out</a>' ,
				admin_url( 'profile.php' ),
				$user_identity,
				wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
			) . '</p>',

		'comment_notes_before' => '',

		'comment_notes_after' => '<p>' .
			sprintf( 'Use these <abbr title="HyperText Markup Language">HTML</abbr> elements and attributes to format your comment:</p> %s' ,
				'<p><code>' . allowed_tags() . '</code></p>' ),

		'fields' => apply_filters( 'comment_form_default_fields', array(

			'author' =>
				'<p><label for="author">' . 'Name' . ( $req ? ' (required)' : '' ) . '</label> ' .
				'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
				'" size="30" tabindex="1"' . $aria_req . ' /></p>',

			'email' =>
				'<p><label for="email">' . 'Email ' . ( $req ? ' (required, but ' : '' ) . 'will not be published)' . '</label> ' .
				'<input id="email" name="email" type="email" placeholder="you@example.com" value="' . esc_attr(	$commenter['comment_author_email'] ) .
				'" size="30" tabindex="2"' . $aria_req . ' /></p>',

			'url' =>
				'<p><label for="url">' . 'Website ' . '</label>' .
				'<input id="url" name="url" type="url" placeholder="https://example.com" value="' . esc_attr( $commenter['comment_author_url'] ) .
				'" size="30" tabindex="3" /></p>'
			)
		),
	);

	ob_start();
	comment_form($tersus_comment_args);
	$form_object = ob_get_clean();
	echo tersus_decruft_comment_form($form_object);

endif; ?>
