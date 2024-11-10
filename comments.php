<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package official
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div class="row my-5">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
	<div class="card card-outline-secondary my-4">
		<div class="card-header">
			<h2>Post Comments</h2>
		</div>
		<!-- <div class="card-body"> -->
			<?php
			wp_list_comments(
				array(
					'style'      => '<div class="card-body">',
					'short_ping' => true,
					'callback' => 'my_custom_comment_format'
				)
			);
			comment_form();
			?>
			<!-- <a href="#" class="btn hvr-hover">Leave a Review</a> -->
		<!-- </div> -->
	</div>
	<?php
		endif; // Check for have_comments().
	?>
</div>
