<?php
/**
 * official functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package official
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function official_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on official, use a find and replace
		* to change 'official' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'official', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'official' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'official_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'official_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function official_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'official_content_width', 640 );
}
add_action( 'after_setup_theme', 'official_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function official_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'official' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'official' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'official_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function official_scripts() {
	wp_enqueue_style( 'official-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'official-style', 'rtl', 'replace' );

	wp_enqueue_script( 'official-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	// Enqueue Font Awesome 5 from CDN
    wp_enqueue_style( 'font-awesome-5', get_template_directory_uri() . '/css/all.css', array(), '5.15.4' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'official_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Register Custom Post Type: Projects
function create_project_cpt() {
    $labels = array(
        'name'                  => _x( 'Projects', 'Post Type General Name', 'textdomain' ),
        'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'textdomain' ),
        'menu_name'             => __( 'Projects', 'textdomain' ),
        'name_admin_bar'        => __( 'Project', 'textdomain' ),
        'archives'              => __( 'Project Archives', 'textdomain' ),
        'attributes'            => __( 'Project Attributes', 'textdomain' ),
        'all_items'             => __( 'All Projects', 'textdomain' ),
        'add_new_item'          => __( 'Add New Project', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'new_item'              => __( 'New Project', 'textdomain' ),
        'edit_item'             => __( 'Edit Project', 'textdomain' ),
        'update_item'           => __( 'Update Project', 'textdomain' ),
        'view_item'             => __( 'View Project', 'textdomain' ),
        'view_items'            => __( 'View Projects', 'textdomain' ),
        'search_items'          => __( 'Search Project', 'textdomain' ),
    );
    
    $args = array(
        'label'                 => __( 'Project', 'textdomain' ),
        'description'           => __( 'A custom post type for Projects', 'textdomain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'project', $args );
}
add_action( 'init', 'create_project_cpt', 0 );


// Add Meta Box for Projects
function add_project_meta_boxes() {
    add_meta_box(
        'project_details', // ID
        'Project Details', // Title
        'project_details_callback', // Callback function
        'project', // Post Type
        'normal', // Context (normal, side, advanced)
        'default' // Priority
    );
}
add_action( 'add_meta_boxes', 'add_project_meta_boxes' );

function project_details_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'project_nonce' );
    
    $project_start_date = get_post_meta( $post->ID, '_project_start_date', true );
    $project_end_date = get_post_meta( $post->ID, '_project_end_date', true );
    $project_url = get_post_meta( $post->ID, '_project_url', true );
    
    ?>
    <p>
        <label for="project_start_date">Project Start Date:</label><br>
        <input type="date" name="project_start_date" id="project_start_date" value="<?php echo esc_attr( $project_start_date ); ?>" />
    </p>
    <p>
        <label for="project_end_date">Project End Date:</label><br>
        <input type="date" name="project_end_date" id="project_end_date" value="<?php echo esc_attr( $project_end_date ); ?>" />
    </p>
    <p>
        <label for="project_url">Project URL:</label><br>
        <input type="url" name="project_url" id="project_url" value="<?php echo esc_attr( $project_url ); ?>" size="50" />
    </p>
    <?php
}

//Meta Fields save
function save_project_meta( $post_id ) {
    // Verify the nonce before proceeding.
    if ( !isset( $_POST['project_nonce'] ) || !wp_verify_nonce( $_POST['project_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }

    // Check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    // Check the user's permissions.
    if ( 'project' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
    }

    // Sanitize and save custom fields
    $fields = array(
        '_project_start_date',
        '_project_end_date',
        '_project_url'
    );

    foreach ( $fields as $field ) {
        if ( isset( $_POST[ substr( $field, 1 ) ] ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[ substr( $field, 1 ) ] ) );
        } else {
            delete_post_meta( $post_id, $field );
        }
    }
}
add_action( 'save_post', 'save_project_meta' );

//Custom Formatting Post Comments section according to theme

function my_custom_comment_format( $comment, $args, $depth ) {
    // Switch between different comment types (comment, pingback, trackback)
    switch ( $comment->comment_type ) {
        case 'pingback':
        case 'trackback':
            ?>
            <li class="post pingback">
                <p>Pingback: <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)' ), ' ' ); ?></p>
            <?php
            break;
        default:
            ?>
            <div class="media mb-3" id="comment-<?php comment_ID(); ?>">
				<div class="mr-2"> 
					<?php echo get_avatar( $comment, 64 ); // Display the commenter's avatar ?>		
				</div> 
				<div class="media-body">
					<p>
                        <?php comment_text(); // Display the comment text ?>
					</p>
					<small class="text-muted"><?php printf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() ); ?></small>
				</div>
			</div>
            <?php
            break;
    }
}

//REST API for Project Custom Post Type

function register_projects_api_route() {
    register_rest_route( 'projects-api/v1', '/projects/', array(
        'methods'  => 'GET',
        'callback' => 'get_projects_data',
    ) );
}
add_action( 'rest_api_init', 'register_projects_api_route' );

function get_projects_data() {
    // Fetch 'projects' custom post type
    $args = array(
        'post_type'      => 'project', // Your custom post type name
        'posts_per_page' => -1,         // Get all projects
    );

    $projects = new WP_Query( $args );

    // Initialize an empty array to hold project data
    $data = array();

    if ( $projects->have_posts() ) {
        while ( $projects->have_posts() ) {
            $projects->the_post();

            // Get custom fields for each project
            $start_date = get_post_meta( get_the_ID(), '_project_start_date', true );
            $end_date   = get_post_meta( get_the_ID(), '_project_end_date', true );

            // Prepare project data
            $data[] = array(
                'title'       => get_the_title(),
				'description' => apply_filters( 'the_content', get_the_content() ),
                'url'         => get_permalink(),
                'start_date'  => $start_date,
                'end_date'    => $end_date,
            );
        }
        wp_reset_postdata(); // Reset post data after loop
    }

    // Return data as JSON response
    return new WP_REST_Response( $data, 200 );
}

function theme_customizer_settings( $wp_customize ) {
    // Address
    $wp_customize->add_setting( 'company_address', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'company_address', array(
        'label' => 'Company Address',
        'section' => 'title_tagline', // This can be changed to your own custom section
        'type' => 'text',
    ));

    // Phone Number
    $wp_customize->add_setting( 'company_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'company_phone', array(
        'label' => 'Company Phone Number',
        'section' => 'title_tagline', // Can create a new section for this
        'type' => 'text',
    ));

    // Email
    $wp_customize->add_setting( 'company_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control( 'company_email', array(
        'label' => 'Company Email Address',
        'section' => 'title_tagline',
        'type' => 'text',
    ));
}
add_action( 'customize_register', 'theme_customizer_settings' );
