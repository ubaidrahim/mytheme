<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package official
 */

?>

<div id="post-<?php the_ID(); ?>" class="list-view-box">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<div class="products-single fix">
				<div class="box-img-hover">
					<!-- <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image"> -->
					<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'medium', array('class' => 'img-fluid') ); // Replace 'medium' with the size you want
					}
					?>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<div class="why-text full-width">
				<?php
					the_title( '<h4>', '</h4>' );
				
				?>
				<h5> <?php
				official_posted_on();
				official_posted_by();
				?></h5>
				<p>
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'official' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
					?>
				</p>
			</div>
		</div>
	</div>
</div>
