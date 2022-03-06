<?php
/**
 * Meta box for gallery section of home page
 */
$audint_meta_boxes['home']['gallery'] = [
  'id'            => 'audint_home_gallery',
  'title'         => 'Gallery Section',
  'callback'      => 'audint_home_gallery_cb',
  'screen'        => 'page',
  'context'       => 'normal',
  'priority'      => 'default',
  'callback_args' => null,
];

$audint_defaults['home_gallery'] = [
  'heading' => 'Show Off Your New Sound System',
  'bicolor' => true,
  'colored_words' => '3,4,5',
  'text'  => 'when you choose us for products and installation designed to fit your lifestyle',
  'link'  => home_url() . '/photo-gallery/',
  'link_text' => 'Check out the Gallery',
  'link_type' => 'page',
  'link_new_tab'  => false,
  'image_1' => ASSETS_URL . 'img/show-off-1.jpg',
  'image_2' => ASSETS_URL . 'img/show-off-2.jpg',
  'image_3' => ASSETS_URL . 'img/show-off-3.jpg',
];

function audint_home_gallery_cb( $post ) {
  wp_nonce_field( 'audint_home_gallery_meta', 'audint_home_gallery_meta_nonce' );
  ?>
    <div class="outer">
      <p class="description">Settings for Gallery section of Home page.</p>
      <hr>

      <div class="meta-row audint-meta-row" id="audint-meta-home-gallery">
        <div class="meta-td audint-meta-td">

          <?php
            // section heading
            $gallery_heading_value = audint_get_meta_or_default( $post->ID, 'audint_home_gallery_heading', 'home_gallery', 'heading' );
            $gallery_heading_bicolor_value = audint_get_meta_or_default( $post->ID, 'audint_home_gallery_bicolor', 'home_gallery', 'bicolor' ) ? 'checked' : '';
            $gallery_heading_colored_words_value = audint_get_meta_or_default( $post->ID, 'audint_home_gallery_colored_words', 'home_gallery', 'colored_words' );
            $gallery_heading_args = [
              'text'  => [
                'label' => 'Heading.',
                'name'  => 'audint_home_gallery_heading',
                'id'  => 'audint_home_gallery_heading',
                'default_value' => audint_get_default( 'home_gallery', 'heading' ),
                'value' => $gallery_heading_value,
              ],
              'bicolor' => [
                'label' => '',
                'description' => 'Use red-colored words on heading?',
                'name'  => 'audint_home_gallery_bicolor',
                'id'  => 'audint_home_gallery_bicolor',
                'is_checked'  => $gallery_heading_bicolor_value,
              ],
              'words' => [
                'label' => '',
                'description' => 'Click on the words you want displayed in red.',
                'name'  => 'audint_home_gallery_colored_words',
                'id'  => 'audint_home_gallery_colored_words',
                'value' => $gallery_heading_colored_words_value,
              ],
            ];
            audint_meta_bicolor_text( $gallery_heading_args );
          ?>
          
          <?php
            // section text
            $gallery_text_value = audint_get_meta_or_default( $post->ID, 'audint_home_gallery_text', 'home_gallery', 'text' );
            $gallery_text_args = [
              'label' => 'Text under heading',
              'name'  => 'audint_home_gallery_text',
              'id'  => 'audint_home_gallery_text',
              'default_value' => audint_get_default( 'home_gallery', 'text' ),
              'value' => $gallery_text_value,
              'rows'  => 3,
              'recommended_length'  => '80',
            ];
            audint_meta_textarea( $gallery_text_args );
          ?>
          
          <?php
            // link
            $gallery_link_value = audint_get_meta_or_default( $post->ID, 'audint_home_gallery_link', 'home_gallery', 'link');
            $gallery_link_type_value = audint_get_meta_or_default( $post->ID, 'audint_home_gallery_link_type', 'home_gallery', 'link_type');
            $gallery_link_text_value = audint_get_meta_or_default( $post->ID, 'audint_home_gallery_link_text', 'home_gallery', 'link_text');
            $gallery_link_new_tab_value = audint_get_meta_or_default( $post->ID, 'audint_home_gallery_link_new_tab', 'home_gallery', 'link_new_tab');
            $gallery_link_args = [
              'label' => 'Section Link.',
              'description' => 'Set a link to display under the text. Choose "none" to omit.',
              'url' => [
                'name'  => 'audint_home_gallery_link',
                'id'  => 'audint_home_gallery_link',
                'default_value' => audint_get_default( 'home_gallery', 'link' ),
                'value' => $gallery_link_value,
                'type'  => $gallery_link_type_value,
              ],
              'text'  => [
                'name'  => 'audint_home_gallery_link_text',
                'id'  => 'audint_home_gallery_link_text',
                'default_value' => audint_get_default( 'home_gallery', 'link_text' ),
                'value' => $gallery_link_text_value,
              ],
              'new_tab' => [
                'name'  => 'audint_home_gallery_link_new_tab',
                'id'  => 'audint_home_gallery_link_new_tab',
                'default_value' => audint_get_default( 'home_gallery', 'link_new_tab' ),
                'value' => $gallery_link_new_tab_value,
              ],
            ];
            audint_meta_link( $gallery_link_args )
          ?>
          
          <?php
            // images
            $gallery_image_keys = ['image_1', 'image_2', 'image_3'];
            foreach($gallery_image_keys as $key) :
              $gallery_image_args = [
                'label' => ucfirst( str_replace( '_', ' ', $key ) ),
                'name'  => 'audint_home_gallery_' . $key,
                'id'  => 'audint_home_gallery_' . $key,
                'default_value' => audint_get_default( 'home_gallery', $key ),
                'value' => audint_get_meta_or_default( $post->ID, 'audint_home_gallery_' . $key, 'home_gallery', $key ),
              ];
              audint_meta_media_image( $gallery_image_args );
            endforeach;
          ?>

        </div>
      </div>
    </div>
  <?php
}

function audint_home_gallery_save_meta( $post_id ) {

}
add_action( 'save_post', 'audint_home_gallery_save_meta' );
