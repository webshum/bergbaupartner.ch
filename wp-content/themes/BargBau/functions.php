<?php

function debug($data) {
	echo "<pre>";
	print_r($data);
	echo "</pre>";
} 


add_theme_support( 'post-thumbnails' );

/**
 * INCLUDE STYLE
 */
add_action( 'wp_enqueue_scripts', 'berbau_add_scripts' );
function berbau_add_scripts() {
	wp_enqueue_style( 'style-main', get_template_directory_uri() .'/css/style.css' );
	wp_enqueue_style( 'style-lightbox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css' );
	wp_enqueue_script( 'script-lottie', 'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js', null, null, true );
	wp_enqueue_script( 'script-lightbox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array(), '1.0', true );
	wp_enqueue_script( 'script-main', get_template_directory_uri() .'/js/main.js', array(), '1.0', true );
}

/**
 * REGISTER MENU
 */
add_action( 'after_setup_theme', function(){
	register_nav_menus([
		'header_menu' => 'Fixed menu'
	]);
});

/**
 * REGISTER SIDEBAR
 */
add_action( 'widgets_init', 'register_widgets' );
function register_widgets(){
	register_sidebar([
		'name'          => 'Footer 1',
		'id'            => "footer-1",
		'description'   => '',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => "",
		'before_title'  => '',
		'after_title'   => "",
		'before_sidebar' => '',
		'after_sidebar'  => ''
	]);

	register_sidebar([
		'name'          => 'Footer copy',
		'id'            => "footer-copy",
		'description'   => '',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => "",
		'before_title'  => '',
		'after_title'   => "",
		'before_sidebar' => '',
		'after_sidebar'  => ''
	]);
}

/**
 * REGISTER POST TYPE
 */
add_action('init', 'post_type_init');
function post_type_init(){
	register_post_type('portfolio', array(
		'labels'             => array(
			'name'               => 'Portfolio',
			'singular_name'      => 'Portfolio',
			'add_new'            => 'Add Portfolio',
			'add_new_item'       => 'Add New Portfolio',
			'edit_item'          => 'Edit Portfolio',
			'new_item'           => 'New Portfolio',
			'view_item'          => 'View Portfolio',
			'search_items'       => 'Search Portfolio',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in cart',
			'parent_item_colon'  => '',
			'menu_name'          => 'Portfolio'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		//'rewrite'            => ['slug' => 'leistungen'],
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
	) );
}

/*
|--------------------------------------------------------------------------
| Check to array empty
|--------------------------------------------------------------------------
*/
function isArrayEmpty($array) {
    if (empty($array)) {
        return true;
    }
    
    foreach ($array as $value) {
        if (is_array($value)) {
            if (!isArrayEmpty($value)) {
                return false;
            }
        } else {
            if (!empty($value)) {
                return false;
            }
        }
    }
    
    return true;
}

// function custom_post_permalink( $permalink, $post, $leavename ) {
//     if ( $post->post_type == 'portfolio' ) {
//         $permalink = home_url( '/leistungen/' );
//     }

//     return $permalink;
// }
// add_filter( 'post_link', 'custom_post_permalink', 10, 3 );
// add_filter( 'post_type_link', 'custom_post_permalink', 10, 3 );

function custom_portfolio_redirect() {
    if ($_SERVER['REQUEST_URI'] === '/portfolio/') {
        wp_redirect(home_url('/leistungen'), 301);
        exit();
    }
}

add_action('template_redirect', 'custom_portfolio_redirect');