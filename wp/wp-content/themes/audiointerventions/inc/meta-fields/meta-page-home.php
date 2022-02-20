<?php
/**
 * Meta boxes / Custom Fields for Home page template
 */
$audint_meta_boxes['home'] = [];
require_once 'page-home/meta-page-home-banner.php';


function audint_home_meta_boxes() {
  global $post;
  if ( ! audint_admin_is_page_template( 'home.php', $post->ID ) ) {
    return;
  }

  global $audint_meta_boxes;

  foreach ($audint_meta_boxes['home'] as $meta_box_key => $meta_box) {
    add_meta_box( $meta_box['id'], $meta_box['title'], $meta_box['callback'], $meta_box['screen'], $meta_box['context'], $meta_box['priority'] );
  }
}
add_action( 'add_meta_boxes', 'audint_home_meta_boxes' );

