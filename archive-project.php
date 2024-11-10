<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
                            <div class="tab-content">
								<div role="tabpanel" class="tab-pane fade show active" id="grid-view">
									<div class="row">
		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-projects', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
		</div>
	</div>
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