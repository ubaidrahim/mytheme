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
<div class="shop-box-inner">
	<div class="container">
		<div class="row">
			<div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
			<div class="right-product-box">
				<div class="product-categorie-box">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content-single', get_post_type() );

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
			</div>
			<?php
			get_sidebar();
			?>
		</div>
	</div>
</div>

<?php
get_footer();
