<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://linkedin.com/in/ubaidrahim
 *
 * @package mytheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title><?php the_title(); ?></title>

    <!-- Site Icons -->
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() ?>/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/custom.css">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php 
					if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
						the_custom_logo(); 
					} else {
						echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
					}
					?>
					</a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <?php
					wp_nav_menu( array(
                        'theme_location' => 'menu-1', // This should match the key used in register_nav_menus
                        'container'      => 'ul',
                        'menu_class'     => 'nav navbar-nav ml-auto', // Apply Bootstrap classes
                        'depth'          => 2,
                        'walker'         => new WP_Bootstrap_Navwalker(),
                    ) );
                    ?>
                </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>

