<?php
/**
 * hautakchurch functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hautakchurch
 */

 /**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'hautakchurch_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hautakchurch_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on hautakchurch, use a find and replace
		 * to change 'hautakchurch' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hautakchurch', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'hautakchurch' ),
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
				'hautakchurch_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'hautakchurch_setup' );

// Custom Post Type Slider Image
function slider() {
	$labels = array (
		'name'				=> '圖片輪播',
		'singular_name' 	=> '圖片輪播',
		'menu_name'			=> '圖片輪播',
		'add_new_item' 		=> '添加圖片至圖片輪播',
		'add_new' 			=> '添加新圖片至圖片輪播',
		);
	$args = array (
		'label'				=> __('slider'),
		'labels'			=> $labels,
		'supports'			=> array('title', 'editor', 'thumbnail'),
		'public'			=> true,
		'show_ui'			=> true,
		'capability_type'	=> 'post',
		'menu_icon'			=> 'dashicons-format-gallery',
		'taxonomies'          => array( 'category' )
		);
	register_post_type('slider',$args);
}

add_action('init', 'slider');

// Custom Post Type Recording
function recording() {
	$labels = array (
		'name'				=> '講道錄音',
		'singular_name' 	=> '講道錄音',
		'menu_name'			=> '講道錄音',
		'add_new_item' 		=> '添加講道錄音',
		'add_new' 			=> '添加新的講道錄音',
		);
	$args = array (
		'label'				=> __('recording'),
		'labels'			=> $labels,
		'supports'			=> array('title', 'editor', 'thumbnail'),
		'show_in_rest' 		=> true,
		'public'			=> true,
		'show_ui'			=> true,
		'capability_type'	=> 'post',
		'menu_icon'			=> 'dashicons-format-audio',
		'taxonomies'          => array( 'category' )
		);
	register_post_type('recording',$args);
	
}

add_action('init', 'recording');

function recording_add_meta_box() {
	add_meta_box( 'recording_meta', '資料', 'recording_meta_callback', 'recording','side');
}

function recording_meta_callback($post) {
	wp_nonce_field('save_recording_meta_data', 'recording_meta_metabox_nounce');

	$value = get_post_meta($post->ID, '_preacher_name_value_key', true);
	echo '<label for="preacher_name_field" style="padding: 5px 3px; display: block">講員</label>';
	echo '<input type="email" id="preacher_name_field" name="preacher_name_field" style="margin-bottom: 10px" value="' .esc_attr($value).'" />';

	$value2 = get_post_meta($post->ID, '_bible_verse_value_key', true);
	echo '<label for="bible_verse_field" style="padding: 5px 3px; display: block">經文</label>';
	echo '<input type="email" id="bible_verse_field" name="bible_verse_field" value="' .esc_attr($value2).'" />';

}

add_action('add_meta_boxes', 'recording_add_meta_box');

function save_recording_meta_data($post_id) {
	if( !isset($_POST['recording_meta_metabox_nounce']) ){
		return;
	}

	if( !wp_verify_nonce( $_POST['recording_meta_metabox_nounce'], 'save_recording_meta_data')) {
		return;
	}

	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}

	if( !current_user_can( 'edit_post', $post_id) ) {
		return;
	}

	if( !isset( $_POST['preacher_name_field']) ) {
		return;
	} 

	if( !isset( $_POST['bible_verse_field']) ) {
		return;
	} 

	$data = sanitize_text_field( $_POST['preacher_name_field'] );
	$data2 = sanitize_text_field( $_POST['bible_verse_field'] );

	update_post_meta( $post_id, '_preacher_name_value_key', $data);
	update_post_meta( $post_id, '_bible_verse_value_key', $data2);
}

add_action('save_post', 'save_recording_meta_data');

// Add the custom columns to the recording post type:
add_filter( 'manage_recording_posts_columns', 'set_custom_edit_recording_columns' );
function set_custom_edit_recording_columns($columns) {
    unset( $columns['author'] );
    $columns['preacher'] = __( '講員', 'hautakchurch');
    $columns['verse'] = __( '經文', 'hautakchurch' );

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_recording_posts_custom_column' , 'custom_recording_column', 10, 2 );
function custom_recording_column( $column, $post_id ) {
    switch ( $column ) {

        case 'preacher' :
			echo get_post_meta( $post_id , '_preacher_name_value_key' , true ); 
			break;

        case 'verse' :
            echo get_post_meta( $post_id , '_bible_verse_value_key' , true ); 
            break;

    }
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hautakchurch_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'hautakchurch_content_width', 640 );
}
add_action( 'after_setup_theme', 'hautakchurch_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hautakchurch_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'hautakchurch' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hautakchurch' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'hautakchurch_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hautakchurch_scripts() {
	wp_enqueue_style( 'bootstrap-css', "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css");
	wp_enqueue_script('jquery', "https://code.jquery.com/jquery-3.3.1.slim.min.js");
	wp_enqueue_script('popperjs', "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");
	wp_enqueue_script('bootstrap-js', "https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js");
	wp_enqueue_script('fontAwesome', "https://kit.fontawesome.com/988906133c.js");

	// wp_enqueue_style( 'hautakchurch-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'hautakchurch-style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION );
	wp_style_add_data( 'hautakchurch-style', 'rtl', 'replace' );

	wp_enqueue_script( 'hautakchurch-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hautakchurch_scripts' );

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

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

 /**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
