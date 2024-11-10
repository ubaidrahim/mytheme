<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package official
 */

?>
<!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
				
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About <?php echo get_bloginfo( 'name' ); ?></h4>
                            <p><?php echo get_bloginfo( 'description' ); ?></p> 							
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary-menu',
                                'container'      => 'ul',
                            ) );
                            ?>
                            <!-- <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul> -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: <?php echo get_theme_mod( 'company_address', 'Default Address' ); ?> </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:<?php echo get_theme_mod( 'company_phone', 'Default Phone' ); ?>"><?php echo get_theme_mod( 'company_phone', 'Default Phone' ); ?></a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:<?php echo get_theme_mod( 'company_email', 'Default Email' ); ?>"><?php echo get_theme_mod( 'company_email', 'Default Email' ); ?></a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company d-flex px-3"><?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( '%1$s by %2$s.', 'mytheme' ), 'mytheme', '<a href="https://linkedin.com/in/ubaidrahim">Ubaid Rahim</a>' );
				?>
			<a class="ml-auto" href="<?php echo esc_url( __( 'https://wordpress.org/', 'official' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'mytheme' ), 'WordPress' );
				?>
			</a></p>
    </div>
    <!-- End copyright  -->
    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="<?php echo get_template_directory_uri() ?>/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/popper.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="<?php echo get_template_directory_uri() ?>/js/jquery.superslides.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/bootstrap-select.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/inewsticker.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/bootsnav.js."></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/images-loded.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/isotope.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/owl.carousel.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/baguetteBox.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/form-validator.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/contact-form-script.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/js/custom.js"></script>




</body>
</html>
