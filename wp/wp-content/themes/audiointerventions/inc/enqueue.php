<?php

function audint_scripts_styles() {
  $css_last_mod = filemtime( get_template_directory() . '/assets/dist/css/main.css' );
  wp_register_style( 'audiointerventions-styles', THEME_URL . '/assets/dist/css/main.css', [], $css_last_mod );
  wp_enqueue_style( 'audiointerventions-styles' );

  $js_last_mod = filemtime( get_template_directory() . '/assets/dist/js/main.js' );
  wp_register_script( 'audiointerventions-script', THEME_URL . '/assets/dist/js/main.js', ['wp-api'], $js_last_mod, true );
  wp_enqueue_script( 'audiointerventions-script' );
}
add_action( 'wp_enqueue_scripts', 'audint_scripts_styles' );