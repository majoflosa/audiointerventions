<?php

/**
 * Register Gallery post type
 */
function audint_register_gallery() {
  $slug = 'galleries';
  $singular = 'Gallery';
  $plural = 'Galleries';

  $settings = [
    'description' => 'Each gallery is a collection of images that can be used in posts and pages.',
    'menu_position' => 5,
    'menu_icon' => 'dashicons-format-gallery',
    'supports' => array(
      'title', 'editor', 'revisions', 'author', 'custom-fields',
    ),
    // 'taxonomies' => array(),
  ];

  audint_register_post_type( $slug, $settings, $plural, $singular );
}
add_action( 'init', 'audint_register_gallery' );
