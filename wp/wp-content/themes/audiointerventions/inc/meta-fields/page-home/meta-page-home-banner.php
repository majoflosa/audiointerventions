<?php
/**
 * Meta box for home page banner
 */
$audint_meta_boxes['home']['banner'] = [
  'id'  => 'audint_home_banner',
  'title' => 'Main Banner',
  'callback'  => 'audint_home_banner_cb',
  'screen'  => 'page',
  'context' => 'normal',
  'priority'  => 'default',
  'callback_args' => null,
];

$audint_defaults['home_banner'] = [
  'heading'       => 'Your Personalized Car Audio Awaits',
  'bicolor'       => true,
  'colored_words' => '1',
  'text'          => "Have a car audio system built to your specifications using top grade components. Unlike chain audio dealers, we'll give you exactly what you want.",
  'image'         => ASSETS_URL . 'img/42-banner.jpg',
  'display_hours' => true,
];

function audint_home_banner_cb( $post ) {
    wp_nonce_field( 'audint_home_banner_meta', 'audint_home_banner_meta_nonce' );
  ?>
  
  <div class="outer">
    <p class="description">Settings for main banner shown on home page.</p>
    <hr>

    <div class="meta-row audint-meta-row" id="audint-meta-home-banner">
      <div class="meta-td audint-meta-td">

        <?php
          // Banner Heading
          $heading_value = get_post_meta( $post->ID, 'audint_home_banner_heading', true);
          $heading_value = '' === $heading_value ? audint_get_default( 'home_banner', 'heading' ) : $heading_value;
          $is_bicolor_heading = get_post_meta( $post->ID, 'audint_home_banner_heading_bicolor', true);
          $is_bicolor_heading = '' === $is_bicolor_heading
            ? audint_get_default( 'home_banner', 'bicolor' ) 
            : $is_bicolor_heading;
          $is_bicolor_checked = $is_bicolor_heading ? 'checked' : '';
          $colored_words_value = get_post_meta( $post->ID, 'audint_home_banner_colored_words', true );
          $colored_words_value = '' === $colored_words_value
            ? audint_get_default( 'home_banner', 'colored_words' )
            : $colored_words_value;
          $colored_heading_args = [
            'text'    => [
              'label' => 'Heading.',
              'default_value' => audint_get_default( 'home_banner', 'heading' ),
              'name'  => 'audint_home_banner_heading',
              'id'    => 'audint_home_banner_heading',
              'value' => $heading_value
            ],
            'bicolor' => [
              'label' => '',
              'description' => 'Use red-colored words on heading?',
              'name'  => 'audint_home_banner_heading_bicolor',
              'id'    => 'audint_home_banner_heading_bicolor',
              'is_checked'  => $is_bicolor_checked,
            ],
            'words'   => [
              'label' => '',
              'description' => 'Click on the words you want displayed in red.',
              'name'  => 'audint_home_banner_colored_words',
              'id'  => 'audint_home_banner_colored_words',
              'value' => $colored_words_value,
            ],
          ];
          audint_meta_bicolor_text( $colored_heading_args );
        ?>
        

        <?php
          // banner text
          $banner_text_value = get_post_meta( $post->ID, 'audint_home_banner_text', true );
          $banner_text_value = '' === $banner_text_value ? audint_get_default( 'home_banner', 'text' ) : $banner_text_value;
          $banner_text_field_args = [
            'label' => 'Text under heading.',
            'name'  => 'audint_home_banner_text',
            'id'    => 'audint_home_banner_text',
            'value' => $banner_text_value,
            'default_value' => audint_get_default( 'home_banner', 'text' ),
            'rows'  => 5,
            'recommended_length'  => '125 - 150'
          ];
          audint_meta_textarea( $banner_text_field_args );
        ?>

        <?php
          // image
          $banner_image_value = get_post_meta( $post->ID, 'audint_home_banner_background_image', true);
          $banner_image_value = '' === $banner_image_value
            ? audint_get_default( 'home_banner', 'image' )
            : $banner_image_value;
        ?>
        <div class="audint-meta-field-group inline js-media-library-fields">
          <label for="audint_home_banner_background_image" class="audint-meta-field-group__left">
            <strong>Banner image.</strong> <span>(If blank, defaults to <a href="<?php echo audint_get_default( 'home_banner', 'image' ); ?>" target="_blank">this image</a>.)</span>
          </label>
          <div class="audint-meta-field-group__right grow">
            <button id="audint_home_banner_image_button" class="is-primary js-media-library-fields__button">Choose Image</button>
            <div id="audint_home_banner_image_preview" class="audint-meta-image-preview js-media-library-fields__preview-wrap">
              <?php if ( $banner_image_value === audint_get_default( 'home_banner', 'image' ) ) : ?>
                <img class="js-media-library-fields__preview-img">
              <?php else : ?>
                <img src="<?php echo $banner_image_value; ?>" class="js-media-library-fields__preview-img">
              <?php endif; ?>
              <button class="audint-meta-image-remove js-media-library-fields__remove">X Remove</button>
            </div>
            <input type="text" name="audint_home_banner_background_image" id="audint_home_banner_background_image" class="js-media-library-fields__input" value="<?php echo $banner_image_value; ?>">
          </div>
        </div>

        <?php
          // display hours?
          $display_hours_value = get_post_meta( $post->ID, 'audint_home_banner_display_hours', true );
          $display_hours_value = '' === $display_hours_value
            ? audint_get_default( 'home_banner', 'image' )
            : $display_hours_value;
          $display_hours_checked = $display_hours_value ? 'checked' : '';
          $display_hours_args = [
            'label' => '',
            'description' => 'Display hours section under banner?',
            'input_type'  => 'radio',
            'options'     => [
              'Yes' => [
                'name'  => 'audint_home_banner_display_hours[]',
                'id'    => 'audint_home_banner_display_hours_1',
                'value' => 1,
                'is_checked'  => !!$display_hours_value == 1,
              ],
              'No' => [
                'name'  => 'audint_home_banner_display_hours[]',
                'id'    => 'audint_home_banner_display_hours_0',
                'value' => 0,
                'is_checked'  => !!$display_hours_value == 0,
              ]
            ],
          ];
          audint_meta_checkboxes( $display_hours_args );
        ?>

      </div>
    </div>
  </div>

  <?php
}

// validate, sanitize, save
function audint_home_banner_save_meta( $post_id ) {
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = audint_is_valid_nonce( 'audint_home_banner_meta', 'audint_home_banner_meta_nonce' );
  $has_capability = current_user_can( 'edit_posts' );

  if ( $is_autosave || $is_revision || !$is_valid_nonce || !$has_capability ) {
    return;
  }

  // heading
  $heading = isset( $_POST['audint_home_banner_heading'] ) 
    ? $_POST['audint_home_banner_heading']
    : audint_get_default( 'home_banner', 'heading' );
  $sanitized_heading = trim(sanitize_text_field( $heading ) );
  update_post_meta( $post_id, 'audint_home_banner_heading', $sanitized_heading );
  
  // use bicolor
  $is_bicolor = isset( $_POST['audint_home_banner_heading_bicolor'] ) ? 1 : 0;
  update_post_meta( $post_id, 'audint_home_banner_heading_bicolor', $is_bicolor );
  
  // colored words
  $colored_words = isset( $_POST['audint_home_banner_colored_words'] )
    ? $_POST['audint_home_banner_colored_words']
    : '';
  $sanitized_words = trim(sanitize_text_field( $colored_words ) );
  update_post_meta( $post_id, 'audint_home_banner_colored_words', $sanitized_words );

  // text
  $banner_text = isset( $_POST['audint_home_banner_text'] )
    ? $_POST['audint_home_banner_text']
    : audint_get_default( 'home_banner', 'text' );;
  $sanitized_banner_text = trim(sanitize_textarea_field( $banner_text ) );
  update_post_meta( $post_id, 'audint_home_banner_text', $sanitized_banner_text );

  // image
  $banner_image = isset( $_POST['audint_home_banner_background_image'] )
    ? $_POST['audint_home_banner_background_image']
    : audint_get_default( 'home_banner', 'image' );
  $sanitized_banner_image = trim(esc_url_raw( $banner_image ));
  update_post_meta( $post_id, 'audint_home_banner_background_image', $sanitized_banner_image );
  
  // display hours
  $display_hours = isset( $_POST['audint_home_banner_display_hours'] )
    ? $_POST['audint_home_banner_display_hours'][0]
    : audint_get_default( 'home_banner', 'display_hours' );
  update_post_meta( $post_id, 'audint_home_banner_display_hours', $display_hours );
}
add_action( 'save_post', 'audint_home_banner_save_meta' );
