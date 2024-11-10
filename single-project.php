<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package official
 */

get_header();
?>
<!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Project Details</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
<!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content-project-single', get_post_type() );

					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'official' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'official' ) . '</span> <span class="nav-title">%title</span>',
						)
					);

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					

				endwhile; // End of the loop.
				?>
	</div>
</div>

<?php
get_footer();
