<?php 
//WOOCOMMERCE
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);


function my_theme_wrapper_start() {
    echo '<section id="mainWoo">';
}

function my_theme_wrapper_end() {
    echo '</section>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// ADD FEATURED IMAGE IN POST
add_theme_support('post-thumbnails');

// ADD OPTION PAGES ACF PLUGIN
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
    acf_add_options_sub_page('Header');
    acf_add_options_sub_page('Footer');
}

// ENQUEUE CSS STYLESHEETS
function enqueue_styles() {
    
    // GENERAL STYLESHEET
    wp_enqueue_style('general_css', get_template_directory_uri() . '/css/style.css');
    
    // NORMALIZE CSS
    wp_enqueue_style('normalize_css', get_template_directory_uri() . '/css/normalize.css');
    
    //ANIMATE CSS
    wp_enqueue_style('animate_css', get_template_directory_uri() . '/css/animate.css');
    
    // FANCYBOX CSS
    wp_enqueue_style('fancybox_css', get_template_directory_uri() . '/fancybox/source/jquery.fancybox.css');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

// ENQUEUE SCRIPTS
function enqueue_scripts() {
    
    // ENQUEUE JQUERY
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js',
    array(), '2.2.0', false);
    
    // FANSYBOX JS
    wp_enqueue_script('fancybox-script', get_template_directory_uri().'/fancybox/source/jquery.fancybox.pack.js');
    
    // ENQUEUE CUSTOM SCRIPTS
    wp_enqueue_script('main-script', get_template_directory_uri().'/js/min_script.js');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts'); 

// RECOMPILE SCSS EVERY LOADING
define('WP_SCSS_ALWAYS_RECOMPILE', true);

// REGISTER SIDEBAR
function register_wp_sidebars() {
    register_sidebar(
        array(
            'id' => 'sidebar_side',
            'name' => 'Side Bar', 
            'description' => 'Add widget',
            'before_widget' => '<div id="widgetFirst" class="side widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">', 
            'after_title' => '</h3>'
        )
    );
}
add_action('widgets_init', 'register_wp_sidebars');
?>