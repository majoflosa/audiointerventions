<?php
/**
 * Outputs all custom fields for Callout Box
 */
function audint_meta_callout( $args ) {
  // bi-color title
  audint_meta_bicolor_text( $args['bicolor_title'] );

  // text
  audint_meta_wp_editor( $args['body_text'] );

  // link
  audint_meta_link( $args['link_fields'] );

  // image
  audint_meta_media_image( $args['image'] );

  // layout
  audint_meta_checkboxes( $args['layout'] );

  // style
  audint_meta_checkboxes( $args['style'] );
}