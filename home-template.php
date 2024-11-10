<?php
/*
Template Name: Homepage Template
*/
get_header();
?>
<!-- Start Slider -->
    <div class="cover-slides d-flex justify-content-center align-items-center">
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/banner-01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> <?php echo get_bloginfo( 'name' ) ?></strong></h1>
                            <p class="m-b-40">See my Custom Projects Archive Page & Posts Archive Page</p>
                            <p>
                                <a class="btn hvr-hover" href="<?php echo get_post_type_archive_link('project'); ?>">Projects Archive</a>
                                <a class="btn hvr-hover" href="<?php echo get_post_type_archive_link('post'); ?>">Posts Archive</a>
                            </p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <!-- End Slider -->

<?php
    // Custom Query for Projects
    $args = array(
        'post_type' => 'project', // Change this to your custom post type slug
        'posts_per_page' => -1, // Retrieve all projects
    );

    $projects_query = new WP_Query( $args );

    // Check if there are any posts to display
    if ( $projects_query->have_posts() ) :
?>
<!-- Start Projects  -->
    <div class="categories-shop">
        <div class="container">
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Recent Projects</h1>
                        <p>Our Most Recent Projects</p>
                    </div>
                </div>
            </div>
            <div class="row">
				<?php while ( $projects_query->have_posts() ) : $projects_query->the_post(); ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
						<?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid')); ?>
                        <!-- <img class="img-fluid" src="" alt="" /> -->
                        <a class="btn hvr-hover" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                    </div>
                </div>
				<?php endwhile; ?>
            </div>
        </div>
    </div>
    <!-- End Projects -->
<?php

 endif;
 ?>

<?php 
get_footer();