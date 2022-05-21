<?php
/** 
 * Helper functions related to custom post types
 */

function audint_register_post_type( $slug, $settings, $plural, $singular ) {
  $labels = [
    'name'                      => $plural,
    'singular_name'             => $singular,
    'add_new'                   => 'Add New ' . $singular,
    'add_new_item'              => 'Add New ' . $singular,
    'edit_item'                 => 'Edit ' . $singular,
    'new_item'                  => 'New ' . $singular,
    'view_item'                 => 'View ' . $singular,
    'view_items'                => 'View ' . $plural,
    'search_items'              => 'Search ' . $plural,
    'not_found'                 => 'No ' . $plural . ' found',
    'not_found_in_trash'        => 'No ' . $plural . ' found in Trash',
    'all_items'                 => 'All ' . $plural,
    'archives'                  => $singular . ' Archives',
    'attributes'                => $singular . ' Attributes',
    'insert_into_item'          => 'Insert into ' . $singular,
    'uploaded_to_this_item'     => 'Uploaded to this ' . $singular,
    'feature_image'             => 'Featured Image',
    'set_featured_image'        => 'Set featured image',
    'remove_featured_image'     => 'Remove featured image',
    'use_featured_image'        => 'Use as featured image',
    'menu_name'                 => $plural,
    'filter_items_list'         => 'Filter ' . $plural,
    'items_list_navigation'     => $plural . ' list navigation',
    'items_list'                => $plural . ' list',
    'item_published'            => $singular . ' published.',
    'item_published_privately'  => $singular . ' published privately.',
    'item_reverted_to_draft'    => $singular . ' reverted to draft.',
    'item_scheduled'            => $singular . ' scheduled.',
    'item_updated'              => $singular . ' updated.'
  ];

  $args = [
    'label'                 => $singular,
    'labels'                => $labels,
    'description'           => isset( $settings['description'] ) ? $settings['description'] : '',
    'public'                => isset( $settings['public'] ) ? $settings['public'] : true,
    'hierarchical'          => isset( $settings['hierarchical'] ) ? $settings['hierarchical'] : false,
    'exclude_from_search'   => isset( $settings['exclude_from_search'] ) ? $settings['exclude_from_search'] : false,
    'publicly_queryable'    => isset( $settings['publicly_queryable'] ) ? $settings['publicly_queryable'] : true,
    'show_ui'               => isset( $settings['show_ui'] ) ? $settings['show_ui'] : true,
    'show_in_menu'          => isset( $settings['show_in_menu'] ) ? $settings['show_in_menu'] : true,
    'show_in_nav_menus'     => isset( $settings['show_in_nav_menus'] ) ? $settings['show_in_nav_menus'] : true,
    'show_in_admin_bar'     => isset( $settings['show_in_admin_bar'] ) ? $settings['show_in_admin_bar'] : true,
    'show_in_rest'          => isset( $settings['show_in_rest'] ) ? $settings['show_in_rest'] : true,
    'menu_position'         => isset( $settings['menu_position'] ) ? $settings['menu_position'] : null,
    'menu_icon'             => isset( $settings['menu_icon'] ) ? $settings['menu_icon'] : 'dashicons-admin-post',
    'supports'              =>isset( $settings['supports'] ) ? $settings['supports'] : ['title', 'editor', 'revisions', 'author', 'custom-fields', 'thumbnail'],
    // 'taxonomies' => array(),
    'has_archive'           => isset( $settings['has_archive'] ) ? $settings['has_archive'] : true,
    'rewrite'               => isset( $settings['rewrite'] ) ? $settings['rewrite'] : [
                                  'slug'        => $slug,
                                  'with_front'  => true,
                                  'feeds'       => true,
                                  'pages'       => true,
                                ],
    'query_var'             => isset( $settings['query_var'] ) ? $settings['query_var'] : $slug,
    'can_export'            => isset( $settings['can_export'] ) ? $settings['can_export'] : true,
    'delete_with_user'      => isset( $settings['delete_with_user'] ) ? $settings['delete_with_user'] : false,
  ];

  register_post_type( $slug, $args );
}
