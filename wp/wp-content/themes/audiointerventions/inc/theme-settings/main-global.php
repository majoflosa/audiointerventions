<?php

/**
 * Main Settings - Global settings
 */
$audint_theme_settings['main']['global'] = [
  'id'        => 'audint_settings_global',
  'title'     => 'General',
  'callback'  => 'audint_global_settings_cb',
  'page'      => 'audint_main_settings_page',
  'fields'    => [
    [
      'id'        => 'audint_global_logo',
      'title'     => 'Logo',
      'callback'  => 'audint_global_logo_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_global',
      'args'      => [],
    ]
  ]
];

function audint_global_settings_cb() {
  ?>
    <hr>
  <?php
}


function audint_global_logo_cb() {
  ?>
    <!-- @TODO: Use WP Media Library -->
    <!-- @TODO: add preview -->
    <input type="file" name="audint_main_settings[global_logo]" id="logo-input">
    <span class="description">Upload an image to use as logo</span>
  <?php
}