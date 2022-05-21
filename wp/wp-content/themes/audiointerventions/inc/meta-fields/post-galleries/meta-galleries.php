<?php
/**
 * Meta boxes for Gallery post types
 */

$audint_meta_boxes['galleries'] = [];

// require meta box
require_once 'meta-galleries-images.php';

function audint_galleries_meta_boxes() {
  global $post;
  if ( $_GET['post_type'] !== 'galleries' ) {
    return;
  }

  global $audint_meta_boxes;
  foreach ( $audint_meta_boxes['galleries'] as $meta_box_key => $meta_box ) {
    add_meta_box( $meta_box['id'], $meta_box['title'], $meta_box['callback'], $meta_box['screen'], $meta_box['context'], $meta_box['priority'] );
  }
}
add_action( 'add_meta_boxes', 'audint_galleries_meta_boxes' );
