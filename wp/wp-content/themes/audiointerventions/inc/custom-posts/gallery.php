<?php

/**
 * Register Gallery post type
 */
function audint_register_gallery() {
  $labels = [
    'name'          => 'Galleries',
    'singular_name' => 'Gallery',
    'add_new'       => 'Add New Gallery',
    'add_new_item'  => 'Add New Gallery',
    'edit_item'     => 'Edit Gallery',
    'new_item'      => 'New Gallery',
    'view_item'     => 'View Gallery',
    'view_items'    => 'View Galleries',
    'search_items'  => 'Search Galleries',
    'not_found'     => 'No Galleries found',
    'not_found_in_trash'  => 'No Galleries found in Trash',
    'all_items'     => 'All Galleries',
    'archives'      => 'Gallery Archives',
    'attributes'    => 'Gallery Attributes',
    'insert_into_item'  => 'Insert into Gallery',
    'uploaded_to_this_item' => 'Uploaded to this Gallery',
    'feature_image' => 'Featured Image',
    'set_featured_image' => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image' => 'Use as featured image',
    'menu_name' => 'Galleries',
    'filter_items_list' => 'Filter Galleries',
    'items_list_navigation' => 'Galleries list navigation',
    'items_list' => 'Galleries list',
    'item_published' => 'Gallery published.',
    'item_published_privately' => 'Gallery published privately.',
    'item_reverted_to_draft' => 'Gallery reverted to draft.',
    'item_scheduled' => 'Gallery scheduled.',
    'item_updated' => 'Gallery updated.'
  ];

  $args = [
    'label' => 'Gallery',
    'labels' => $labels,
    'description' => 'Each gallery is a collection of images that can be used in posts and pages.',
    'public' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'show_in_rest' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-format-gallery',
    'supports' => array(
      'title', 'editor', 'revisions', 'author', 'custom-fields',
    ),
    'taxonomies' => array(),
    'has_archive' => true,
    'rewrite' => array(
      'slug' => 'galleries',
      'with_front' => true,
      'feeds' => true,
      'pages' => true,
    ),
    'query_var' => 'galleries',
    'can_export' => true,
    'delete_with_user' => false,
  ];

  register_post_type( 'galleries', $args );
}
add_action( 'init', 'audint_register_gallery' );
