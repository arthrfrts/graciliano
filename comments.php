<?php
/*
    THE COMMENTS TEMPLATE
    This template display the comment list, the comment form and the password field in case of a password-protected post.
*/

// If the post is protected by a password, goodbye.
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if( have_comments() ): ?>
		<h2 class="comments-title">
      <?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					printf( _x( 'One comment to &ldquo;%s&rdquo;', 'comments title', 'graciliano' ), get_the_title() );
				} else {
					printf(
						_nx(
							'%1$s comment to &ldquo;%2$s&rdquo;',
							'%1$s comments to &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'graciliano'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol>

		<?php if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ): ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'graciliano' ); ?></h2>

				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'graciliano' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'graciliano' ) ); ?></div>
				</div>
			</nav>
		<?php
		endif;
	else: ?>
	<h2 class="comments-title"><?php esc_html_e( 'Leave a comment', 'graciliano' ); ?></h2>
	<p><?php esc_html_e( 'There\'s no comments on this page yet. Let\'s start this discussion.', 'graciliano' ); ?>
	<?php endif;

	// Let's tell people that they can't comment anymore.
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php  esc_html_e( 'Comments are closed.', 'graciliano' ); ?></p>
	<?php
	endif;

	comment_form();
	?>

</div>
