<?php
/**
 * Meta box for Gallery images
 */

$audint_meta_boxes['galleries']['images'] = [
  'id' => 'audint_galleries_images',
  'title' => 'Gallery Images',
  'callback' => 'audint_galleries_images_cb',
  'screen' => 'galleries',
  'context' => 'normal',
  'priority' => 'default',
  'callback_args' => null,
];

$audint_defaults['galleries_images'] = [
  'images'  => '',
];

function audint_galleries_images_cb( $post ) {
    wp_nonce_field( 'audint_galleries_images_meta', 'audint_galleries_images_meta_nonce' );
  ?>

  <div class="outer">
    <p class="description">Select images to display in this gallery.</p>
    <hr>

    <div class="meta-row audint-meta-row" id="audint-meta-galleries-images">
      <div class="meta-td audint-meta-td">

      <?php
        $galleries_images_value = audint_get_meta_or_default( $post->ID, 'audint_galleries_images_images', 'galleries', 'images' );
        $galleries_images_args = [
          'label' => 'Images.',
          'description' => 'Select images to display in this gallery.',
          'name' => 'audint_galleries_images_images',
          'id' => 'audint_galleries_images_images',
          'value' => $galleries_images_value,
        ];
        audint_meta_media_images( $galleries_images_args );
      ?>

      </div>
    </div>
  </div>

  <?php
}