<?php

/**
 * Theme features
 */
function audint_theme_features() {
    load_theme_textdomain( 'audiointerventions', get_template_directory() . '/languages' );

    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'post-formats', get_post_format_slugs() );
}
add_action( 'after_setup_theme', 'audint_theme_features' );


/**
 * Menus
 */
function audint_menus() {
    $menu_locations = array(
        'main_menu' => __( 'Main Menu', 'audiointerventions' ),
        'footer_menu' => __( 'Footer Menu', 'audiointerventions' ),
    );
    register_nav_menus( $menu_locations );
}
add_action( 'init', 'audint_menus' );
