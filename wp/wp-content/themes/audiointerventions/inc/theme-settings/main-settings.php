<?php

$audint_theme_settings['main'] = [];

/**
 * Set up admin menu for theme settings page
 */
function audint_admin_menu_settings() {
  add_menu_page(
    'Theme Settings', // $page_title
    'Theme Settings', // $menu_title
    'manage_options', // $capability
    'audint_theme_settings', // $menu_slug
    'audint_theme_settings_cb', // $callback
    '', // $icon_url
    60 // $position
  );
}
add_action( 'admin_menu', 'audint_admin_menu_settings' );

/**
 * Callback function to render settings page, settings sections, and settings fields
 */
function audint_theme_settings_cb() {
  // check if user can be in this page
  if ( ! current_user_can( 'manage_options' ) ) {
    return;
  }

  // display success notice if needed
  if ( isset( $_GET[ 'settings-updated' ] ) ) {
    add_settings_error( 'audint_settings_messages', 'audint_notice', 'Settings updated.', 'success' );
  }

  settings_errors( 'audint_settings_messages' );
  ?>

  <div class="wrap main-settings">
    <h1>Audio Interventions - Main Theme Settings</h1>

    <form action="options.php" method="post" class="main-settings__form">
      <?php
        settings_fields( 'audint_main_group' );
        do_settings_sections( 'audint_main_settings_page' );
        submit_button( 'Save Settings' );
      ?>
    </form>
  </div>

  <?php
}


/**
 * Register setting, sections, and fields
 */
function audint_settings_init() {
  global $audint_theme_settings;
  
  register_setting(
    'audint_main_group',
    'audint_main_settings',
    [
      'type'  => 'string',
      'description' => 'Main theme settings for Audio Interventions theme',
      'sanitize_callback' => 'audint_sanitize_main_settings',
      'show_in_rest'      => false,
    ]
  );

  // loop through sections and fields
  foreach ( $audint_theme_settings['main'] as $section_key => $section ) {
    add_settings_section( $section['id'], $section['title'], $section['callback'], $section['page'] );
    
    foreach ( $section['fields'] as $field_key => $field ) {
      add_settings_field( $field['id'], $field['title'], $field['callback'], $field['page'], $field['section'], $field['args'] );
    }
  }  
}
add_action( 'admin_init', 'audint_settings_init' );


function audint_sanitize_main_settings() {

}