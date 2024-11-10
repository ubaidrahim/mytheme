<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package official
 */

?>
<?php
            $project_start_date = get_post_meta( get_the_ID(), '_project_start_date', true );
            $project_end_date = get_post_meta( get_the_ID(), '_project_end_date', true );
            $project_url = get_post_meta( get_the_ID(), '_project_url', true );
?>

	<div class="row" id="post-<?php the_ID(); ?>">
		<div class="col-xl-5 col-lg-5 col-md-6">
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
		<div class="col-xl-7 col-lg-7 col-md-6">
            <div class="single-product-details">
                <?php
					the_title( '<h2>', '</h2>' );
				
				?>
				<h5> <?php
				official_posted_on();
				official_posted_by();
				?></h5>
                        <p class="available-stock"><span> Project Start Date / <a href="#"><?php echo $project_start_date ?></a></span><p>
                        <p class="available-stock"><span> Project End Date / <a href="#"><?php echo $project_end_date ?></a></span><p>
						<h4>Short Description:</h4>
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

						<div class="price-box-bar">
							<div class="cart-and-bay-btn">
								<a class="btn hvr-hover" target="_blank" href="<?php echo $project_url ?>">Project Link</a>
							</div>
						</div>
                    </div>
		</div>
	</div>
