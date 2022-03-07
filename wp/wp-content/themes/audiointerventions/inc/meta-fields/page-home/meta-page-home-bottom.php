<?php
/**
 * Meta fields settings for bottom banner of home page
 */
$audint_meta_boxes['home']['bottom'] = [
  'id'            => 'audint_home_bottom',
  'title'         =>  'Bottom Banner',
  'callback'      => 'audint_home_bottom_cb',
  'screen'        => 'page',
  'context'       => 'normal',
  'priority'      => 'default',
  'callback_args' => null,
];

$audint_defaults['home_bottom'] = [
  'heading' => 'Enjoy every minute you spend in your vehicle. Invest in the best sound system available.',
  'phone'   => '239-495-0586',
  'image'   => ASSETS_URL . 'img/25-banner.jpg',
];

function audint_home_bottom_cb( $post ) {
  wp_nonce_field( 'audint_home_bottom_meta', 'audint_home_bottom_meta_nonce' );
  ?>
    <div class="outer">
      <p class="description">Settings for bottom banner of Home page.</p>

      <div class="meta-row audint-meta-row" id="audint-meta-bottom">
        <div class="meta-td audint-meta-td">

        <?php
          // heading
          $bottom_heading_value = audint_get_meta_or_default( $post->ID, 'audint_home_bottom_heading', 'home_bottom', 'heading' );
          $bottom_heading_args = [
            'label' => 'Heading.',
            'description' => 'Main text to display as top line.',
            'name'  => 'audint_home_bottom_heading',
            'id'  => 'audint_home_bottom_heading',
            'default_value' => audint_get_default( 'home_bottom', 'heading' ),
            'value' => $bottom_heading_value,
          ];
          audint_meta_text( $bottom_heading_args );
        ?>
        
        <?php
          // phone
          $bottom_phone_value = audint_get_meta_or_default( $post->ID, 'audint_home_bottom_phone', 'home_bottom', 'phone' );
          $bottom_phone_args = [
            'label' => 'Phone Number.',
            'description' => 'Displays in large red text under the banner heading. (It can be any text, not just a phone number)',
            'name'  => 'audint_home_bottom_phone',
            'id'  => 'audint_home_bottom_phone',
            'default_value' => audint_get_default( 'home_bottom', 'phone' ),
            'value' => $bottom_phone_value,
          ];
          audint_meta_text( $bottom_phone_args );
        ?>
        
        <?php
          // image
          $bottom_image_value = audint_get_meta_or_default( $post->ID, 'audint_home_bottom_image', 'home_bottom', 'image' );
          $bottom_image_args = [
            'label' => 'Image.',
            'description' => 'Displays as background for the banner.',
            'name'  => 'audint_home_bottom_image',
            'id'  => 'audint_home_bottom_image',
            'default_value' => audint_get_default( 'home_bottom', 'image' ),
            'value' => $bottom_image_value,
          ];
          audint_meta_media_image( $bottom_image_args );
        ?>

        </div>
      </div>
    </div>
  <?php
}

function audint_home_bottom_save_meta( $post_id ) {
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = audint_is_valid_nonce( 'audint_home_bottom_meta', 'audint_home_bottom_meta_nonce' );
  $has_capability = current_user_can( 'edit_posts' );

  if ( $is_autosave || $is_revision || !$is_valid_nonce || !$has_capability ) {
    return;
  }

  // heading
  $bottom_heading = isset( $_POST['audint_home_bottom_heading'] )
    ? $_POST['audint_home_bottom_heading']
    : audint_get_default( 'home_bottom', 'heading');
  $sanitized_heading = trim( sanitize_text_field( $bottom_heading ) );
  update_post_meta( $post_id, 'audint_home_bottom_heading', $sanitized_heading );

  // phone
  $bottom_phone = isset( $_POST['audint_home_bottom_phone'] )
    ? $_POST['audint_home_bottom_phone']
    : audint_get_default( 'home_bottom', 'phone');
  $sanitized_phone = trim( sanitize_text_field( $bottom_phone ) );
  update_post_meta( $post_id, 'audint_home_bottom_phone', $sanitized_phone );

  // image
  $bottom_image = isset( $_POST['audint_home_bottom_image'] )
    ? $_POST['audint_home_bottom_image']
    : audint_get_default( 'home_bottom', 'image');
  $sanitized_image = trim( sanitize_url( $bottom_image ) );
  update_post_meta( $post_id, 'audint_home_bottom_image', $sanitized_image );

}
add_action( 'save_post', 'audint_home_bottom_save_meta' );
