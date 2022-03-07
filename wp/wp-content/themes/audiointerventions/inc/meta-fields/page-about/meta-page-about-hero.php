<?php
/**
 * Meta fields settings for About hero banner
 */
$audint_meta_boxes['about']['hero'] = [
  'id'            => 'audint_about_hero',
  'title'         => 'Main Banner',
  'callback'      => 'audint_about_hero_cb',
  'screen'        => 'page',
  'context'       => 'normal',
  'priority'      => 'default',
  'callback_args' => null,
];

$audint_defaults['about_hero'] = [
  'heading' => 'About Us',
  'image'   => ASSETS_URL . 'img/25-banner.jpg',
  'display_hours' => true,
];

function audint_about_hero_cb( $post ) {
  wp_nonce_field( 'audint_about_hero_meta', 'audint_about_hero_meta_nonce' );
  ?>
    <div class="outer">
      <p class="description">Settings for bottom banner of Home page.</p>

      <div class="meta-row audint-meta-row" id="audint-meta-about-hero">
        <div class="meta-td audint-meta-td">

        <?php
        // heading
        $hero_heading_value = audint_get_meta_or_default( $post->ID, 'audint_about_hero_heading', 'about_hero', 'heading' );
        $hero_heading_args = [
          'label' => 'Heading.',
          'name'  => 'audint_about_hero_heading',
          'id'  => 'audint_about_hero_heading',
          'default_value' => audint_get_default( 'about_hero', 'heading' ),
          'value' => $hero_heading_value,
        ];
        audint_meta_text( $hero_heading_args );
        ?>
        
        <?php
        // image
        $hero_image_value = audint_get_meta_or_default( $post->ID, 'audint_about_hero_image', 'about_hero', 'image' );
        $hero_image_args = [
          'label' => 'Image.',
          'description' => 'Choose image to display as banner background.',
          'name'  => 'audint_about_hero_image',
          'id'  => 'audint_about_hero_image',
          'default_value' => audint_get_default( 'about_hero', 'image' ),
          'value' => $hero_image_value,
        ];
        audint_meta_media_image( $hero_image_args );
        ?>
        
        <?php
        // display hours
        $hero_hours_value = audint_get_meta_or_default( $post->ID, 'audint_about_hero_display_hours', 'about_hero', 'display_hours' );
        $hero_hours_args = [
          'label' => '',
          'description' => 'Display hours section under banner?',
          'input_type'  => 'radio',
          'options' => [
            'Yes' => [
              'name'  => 'audint_about_hero_display_hours[]',
              'id'  => 'audint_about_hero_display_hours_1',
              'value' => 1,
              'is_checked'  => !!$hero_hours_value == 1,
            ],
            'No'  => [
              'name'  => 'audint_about_hero_display_hours[]',
              'id'  => 'audint_about_hero_display_hours_2',
              'value' => 0,
              'is_checked' => !!$hero_hours_value == 0,
            ],
          ],
        ];
        audint_meta_checkboxes( $hero_hours_args );
        ?>

        </div>
      </div>
    </div>
  <?php
}

function audint_about_hero_save_meta( $post_id ) {
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = audint_is_valid_nonce( 'audint_about_hero_meta', 'audint_about_hero_meta_nonce' );
  $has_capability = current_user_can( 'edit_posts' );

  if ( $is_autosave || $is_revision || !$is_valid_nonce || !$has_capability ) {
    return;
  }

  // heading
  $heading = isset( $_POST['audint_about_hero_heading'] )
    ? $_POST['audint_about_hero_heading']
    : audint_get_default( 'about_hero', 'heading' );
  $sanitized_heading = trim( sanitize_text_field( $heading ) );
  update_post_meta( $post_id, 'audint_about_hero_heading', $sanitized_heading );

  // image
  $image = isset( $_POST['audint_about_hero_image'] )
    ? $_POST['audint_about_hero_image']
    : audint_get_default( 'about_hero', 'image' );
  $sanitized_image = trim( sanitize_url( $image ) );
  update_post_meta( $post_id, 'audint_about_hero_image', $sanitized_image );

  // display hours
  $display_hours = isset( $_POST['audint_about_hero_display_hours'] )
    ? $_POST['audint_about_hero_display_hours'][0]
    : audint_get_default( 'about_hero', 'display_hours' );
  $sanitized_hours = in_array( $display_hours, [0, 1], false )
    ? $display_hours
    : audint_get_default( 'about_hero', 'display_hours' );
  update_post_meta( $post_id, 'audint_about_hero_display_hours', $sanitized_hours );
}
add_action( 'save_post', 'audint_about_hero_save_meta' );
