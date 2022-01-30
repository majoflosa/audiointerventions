<?php
$is_dev = $_SERVER['HTTP_HOST'] !== 'audiointerventions.com';
$is_prod = !$is_dev;

define( 'ENV_IS_DEV', $is_dev );
define( 'ENV_IS_PROD', $is_prod );

if ( $is_dev ) {
    $theme_url = 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes/audiointerventions';
} else {
    $theme_url = get_template_directory_uri();
}
define( 'THEME_URL', $theme_url );


function rem_scripts_styles() {
  $css_last_mod = filemtime( get_template_directory() . '/assets/dist/css/main.css' );
  wp_register_style( 'remnant-tribes-styles', THEME_URL . '/assets/dist/css/main.css', [], $css_last_mod );
  wp_enqueue_style( 'remnant-tribes-styles' );

  $js_last_mod = filemtime( get_template_directory() . '/assets/dist/js/main.js' );
  wp_register_script( 'remnant-tribes-script', THEME_URL . '/assets/dist/js/main.js', ['wp-api'], $js_last_mod, true );
  wp_enqueue_script( 'remnant-tribes-script' );
}
add_action( 'wp_enqueue_scripts', 'rem_scripts_styles' );