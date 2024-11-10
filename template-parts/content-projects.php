<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package official
 */

?>
<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4" id="post-<?php the_ID(); ?>">
	<div class="products-single fix">
		<div class="box-img-hover">
			<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'thumbnail', array('class' => 'img-fluid') ); // Replace 'medium' with the size you want
					}
					?>
			<!-- <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image"> -->
			<div class="mask-icon">
				<a class="cart" href="<?php echo get_permalink() ?>">View Details</a>
			</div>
		</div>
		<div class="why-text">
			<?php
					the_title( '<h4>', '</h4>' );
				
				?>
			<small> <?php
				official_posted_on();
				official_posted_by();
				?></small>
		</div>
	</div>
</div>
