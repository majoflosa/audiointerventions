<?php
/**
 * Meta boxes / Custom fields for About Us page template
 */
$audint_meta_boxes['about'] = [];

require_once 'meta-page-about-hero.php';

function audint_about_meta_boxes() {
  global $post;
  if ( ! audint_admin_is_page_template( 'about.php', $post->ID ) ) {
    return;
  }

  global $audint_meta_boxes;

  foreach ($audint_meta_boxes['about'] as $meta_box_key => $meta_box) {
    add_meta_box( $meta_box['id'], $meta_box['title'], $meta_box['callback'], $meta_box['screen'], $meta_box['context'], $meta_box['priority'] );
  }
}
add_action( 'add_meta_boxes', 'audint_about_meta_boxes' );
