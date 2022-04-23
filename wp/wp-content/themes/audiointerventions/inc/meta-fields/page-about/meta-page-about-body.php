<?php
/**
 * Meta fields settings for main content section of About page
 */
$audint_meta_boxes['about']['body'] = [
  'id'            => 'audint_about_body',
  'title'         => 'Main Text Content',
  'callback'      => 'audint_about_body_cb',
  'screen'        => 'page',
  'context'       => 'normal',
  'priority'      => 'default',
  'callback_args' => null,
];

$audint_defaults['about_body'] = [
  'heading' => 'Let Us Cater to Your Specific Needs',
  'content' => '<p>Our attention to detail and craftsmanship are what set Audio Interventions part from any other mobile electronics dealer. More than just a retails store or installation center, Audio Interventions is the definitive example of professionals who will consult with you to learn your desired expectations, compare and select the correct components, and answer any questions you may have.</p><p>Each vehicle is different, and every customer has his or her own set of expectations. With that in mind, part of Audio Intervention\'s quest for complete customer satisfaction begins with an initial consultation to understand your mobile electronic needs. Oncer your goals have been established, we will schedule an appointment for your vehicle, and you can comfortably leave your vehicle in our hands with the certainty that when you get it back, you will be completely satisfied. Finally, we will walk you through the system\'s functions after installation to make sure all of your questions are answered and you fully understand how your new system works.</p><p>At Audio Interventions, we believe that in order to achieve high levels of quality and customer satisfaction, it\'s important for us to have the proper facility. Audio Interventions is equipped with a cabinet-grade woodworking facility, composite fabrication equipment, electronic diagnostic equipment, and more. It\'s a commitment to quality workmanship that you won\'t find anywhere else. We know that great work begins with great people. That\'s why Audio Interventions provides its employees with an immaculate, well-equipped facility, and continued education in mobile electronics, to further set ourselves part from the competition.</p>',
  'gallery' => null,
];

function audint_about_body_cb( $post ) {
  wp_nonce_field( 'audint_about_body_meta', 'audint_about_body_meta_nonce' );
  ?>

    <div class="outer">
      <p class="description">Settings for main content section of About page.</p>

      <div class="meta-row audint-meta-row" id="audint-meta-about-hero">
        <div class="meta-td audint-meta-td">

        <?php
          // heading
          $body_heading_value = audint_get_meta_or_default( $post->ID, 'audint_about_body_heading', 'about_body', 'heading' );
          $body_heading_args = [
            'label' => 'Heading.',
            'name'  => 'audint_about_body_heading',
            'id'  => 'audint_about_body_heading',
            'default_value' => audint_get_default( 'about_body', 'heading' ),
            'value' => $body_heading_value,
          ];
          audint_meta_text( $body_heading_args );
        ?>

        <?php
          // content
          $body_content_value = audint_get_meta_or_default( $post->ID, 'audint_about_body_content', 'about_body', 'content' );
          $body_content_editor = [
            'media_buttons' => false,
            'drag_drop_upload' => false,
            'textarea_name' => 'audint_about_body_content',
            'textarea_rows' => 24,
          ];
          $body_content_args = [
            'label' => 'Content.',
            'description' => 'Main text content to display in about page.',
            'id'  => 'audint_about_body_content',
            'value' => $body_content_value,
            'default_value' => audint_get_default( 'about_body', 'content'),
            'show_default'  => false,
            'wp_editor_settings'  => $body_content_editor,
          ];
          audint_meta_wp_editor( $body_content_args );
        ?>

        <?php
          // gallery
          $body_gallery_value = audint_get_meta_or_default( $post->ID, 'audint_about_body_gallery', 'about_body', 'gallery' );
          $body_gallery_args = [
            'label' => 'Gallery.',
            'description' => 'Optionally display a set of images from your created galleries under main body of text. To omit, leave the "-- Select Gallery --" option.',
            'name'  => 'audint_about_body_gallery',
            'id'  => 'audint_about_body_gallery',
            'default_value' => audint_get_default( 'about_body', 'gallery'),
            'value' => $body_gallery_value,
          ];
          audint_meta_text( $body_gallery_args );
        ?>

        </div>
      </div>
    </div>

  <?php
}

function audint_about_body_save_meta( $post_id ) {
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = audint_is_valid_nonce( 'audint_about_body_meta', 'audint_about_body_meta_nonce' );
  $has_capability = current_user_can( 'edit_posts' );

  if ( $is_autosave || $is_revision || !$is_valid_nonce || !$has_capability ) {
    return;
  }

  // heading
  $heading = isset( $_POST['audint_about_body_heading'] )
    ? $_POST['audint_about_body_heading']
    : audint_get_default( 'about_body', 'heading' );
  $sanitized_heading = trim( sanitize_text_field( $heading ) );
  update_post_meta( $post_id, 'audint_about_body_heading', $sanitized_heading );

  // content
  $body_content = isset( $_POST['audint_about_body_content'] )
    ? $_POST['audint_about_body_content']
    : audint_get_default( 'about_body', 'content' );
  $sanitized_text = wp_kses_post( $body_content );
  update_post_meta( $post_id, 'audint_about_body_content', $sanitized_text );

  // gallery
  $gallery = isset( $_POST['audint_about_body_gallery'] )
    ? $_POST['audint_about_body_gallery']
    : audint_get_default( 'about_body', 'gallery' );
  $sanitized_gallery = trim( sanitize_text_field( $gallery ) );
  update_post_meta( $post_id, 'audint_about_body_gallery', $sanitized_gallery );

}
add_action( 'save_post', 'audint_about_body_save_meta' );
