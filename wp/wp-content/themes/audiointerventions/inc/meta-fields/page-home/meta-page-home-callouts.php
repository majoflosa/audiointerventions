<?php
/**
 * Meta box for home page callouts sections
 */
$audint_meta_boxes['home']['callouts'] = [
  'id'            => 'audint_home_callouts',
  'title'         => 'Callout Sections',
  'callback'      => 'audint_home_callouts_cb',
  'screen'        => 'page',
  'context'       => 'normal',
  'priority'      => 'default',
  'callback_args' => null,
];

$audint_defaults['home_callouts'] = [
  'heading'         => 'Why Audio Interventions',
  // callout 1
  'callout_1_title' => 'Work Directly with Experts',
  'callout_1_bicolor' => true,
  'callout_1_colored_words' => '2,3',
  'callout_1_body'  => '<p>From a personal consultation to knowledgeable advice, we will give you the attention to detail that you deserve.</p><p>Every element of your car\'s audio system, including the stereo, CD player, subwoofer and amplifiers will be just what you imagined. It will be installed precisely with fabricated elements if needed.</p>',
  'callout_1_link'  => '/services',
  'callout_1_image'  => ASSETS_URL . 'img/car-stereo.jpg',
  'callout_1_image_position'  => 'right',
  'callout_1_style'  => 'dark',
  // callout 2
  'callout_2_title' => 'Get Only Top Brand Equipment',
  'callout_2_bicolor' => true,
  'callout_2_colored_words' => '2,3,4',
  'callout_2_body'  => '<p>We offer top brand names like JL Audio, Focal and Dynaudio products are offered at competitive prices for both products and installation.</p><p>You\'ll feel confident leaving your car in our capable hands when you see our top-notch facilities and our high-quality completed work.</p>',
  'callout_2_link'  => '/products',
  'callout_2_image'  => ASSETS_URL . 'img/jl-audio.jpg',
  'callout_2_image_position'  => 'left',
  'callout_2_style'  => 'white',
  // callout 3
  'callout_3_title' => 'Expert Facilities and Technicians',
  'callout_3_bicolor' => true,
  'callout_3_colored_words' => '0',
  'callout_3_body'  => '<p>Tour our facility, which houses a cabinet-grade woodworking facility, composite fabrication equipment and electronic diagnostics.</p><p>We can fabricate custom paneling and mounting brackets, integrate them into your factory wiring and even create factory-like wiring harnesses so that your factory wiring remains true to its original design.</p>',
  'callout_3_link'  => '/about-us',
  'callout_3_image'  => ASSETS_URL . 'img/boat-audio.jpg',
  'callout_3_image_position'  => 'left',
  'callout_3_style'  => 'dark',
];

function audint_home_callouts_cb( $post ) {
  wp_nonce_field( 'audint_home_callouts_meta', 'audint_home_callouts_meta_nonce' );
  ?>

  <div class="outer">
    <p class="description">Settings for Home page callouts</p>
    <hr>

    <div class="meta-row audint-meta-row js-bicolor-text" id="audint-meta-home-callouts">
      <div class="meta-td audint-meta-td">

        <?php
          // section heading
          $callouts_heading = audint_get_meta_or_default( $post->ID, 'audint_home_callouts_heading', 'home_callouts', 'heading' );
          $callouts_heading_args = [
            'label' => 'Main Callout Heading',
            'description' => 'Heading text for section containing all 3 callouts.',
            'name'  => 'audint_home_callouts_heading',
            'id'    => 'audint_home_callouts_heading',
            'value' => $callouts_heading,
            'default_value' => audint_get_default( 'home_callouts', 'heading' ),
          ];
          audint_meta_text( $callouts_heading_args );
        ?>

        <div class="audint-meta-callout-group">
          <h3 class="audint-meta-callout-header">Callout 1</h3>
          
          <?php
            // callout 1 title
            $callout_1_title_value = audint_get_meta_or_default( $post->ID, 'audint_home_callout_1_title', 'home_callouts', 'callout_1_title' );
          ?>
          <div class="audint-meta-field-group inline">
            <label for="audint_home_callout_1_title" class="audint-meta-field-group__left">
              <strong>Callout 1 Title</strong> <span>(If blank, defaults to <em>"<?php echo audint_get_default( 'home_callouts', 'callout_1_title'); ?>"</em>.)</span>
            </label>
            <div class="audint-meta-field-group__right grow">
              <input type="text" name="audint_home_callout_1_title" id="audint_home_callout_1_title" autocomplete="off" class="js-bicolor-text__text-input" value="<?php echo $callout_1_title_value; ?>">
            </div>
          </div>

          <?php
            // callout 1 bicolor
            $is_callout_1_bicolor = audint_get_meta_or_default( $post->ID, 'audint_home_callout_1_bicolor', 'home_callouts', 'callout_1_bicolor' );
            $is_callout_1_bicolor_checked = $is_callout_1_bicolor ? 'checked' : '';
          ?>
          <div class="audint-meta-field-group inline">
            <label for="audint_home_callout_1_bicolor" class="audint-meta-field-group__left">
              <span>Use red-colored words on title?</span>
            </label>
            <div class="audint-meta-field-group__right">
              <input type="checkbox" name="audint_home_callout_1_bicolor[]" id="audint_home_callout_1_bicolor" class="js-bicolor-text__checkbox-input" value="1" <?php echo $is_callout_1_bicolor_checked; ?> />
            </div>
          </div>

          <?php
            // callout 1 colored words
            $callout_1_colored_words_value = audint_get_meta_or_default( $post->ID, 'audint_home_callout_1_colored_words', 'home_callouts', 'callout_1_colored_words' );
          ?>
          <div class="audint-meta-field-group inline audint-meta-colored-words-wrap js-bicolor-text__words-wrap">
            <label for="audint_home_callout_1_colored_words" class="audint-meta-field-group__left">
              <span>Click on the words you want to display in red.</span>
            </label>
            <div class="audint-meta-field-group__right grow">
              <div id="audint_home_callout_1_words" class="audint-home-banner-heading-words js-bicolor-text__words"></div>
              <input type="hidden" name="audint_home_callout_1_colored_words" id="audint_home_callout_1_colored_words" class="js-bicolor-text__words-input" value="<?php echo $callout_1_colored_words_value; ?>" />
            </div>
          </div>

          <?php
            // callout 1 body text
            $callout_1_body_value = audint_get_meta_or_default( $post->ID, 'audint_home_callout_1_body', 'home_callouts', 'callout_1_body' );
          ?>
          <div class="audint-meta-field-group inline">
            <label for="audint_home_callout_1_body" class="audint-meta-field-group__left">
              <strong>Callout Text</strong>
            </label>
            <div class="audint-meta-field-group__right grow">
              <?php
                $wp_editor_settings = [
                  'media_buttons' => false,
                  'drag_drop_upload' => false,
                  'textarea_name' => 'audint_home_callout_1_body',
                  'textarea_rows' => 8,
                  'teeny' => true,
                ];
                wp_editor( $callout_1_body_value, 'audint_home_callout_1_body', $wp_editor_settings );
              ?>
            </div>
          </div>

          <?php
            // callout 1 link
            $callout_1_link_value = audint_get_meta_or_default( $post->ID, 'audint_home_callout_1_link', 'home_callouts', 'callout_1_link' );
          ?>
          <div class="audint-meta-field-group inline">
            <label for="audint_home_callout_1_link" class="audint-meta-field-group__left">
              <strong>Link</strong>
            </label>
            <div class="audint-meta-field-group__right grow">
              <div class="audint-meta-link-group">
                <div class="audint-meta-checkbox-wrap">
                  <input type="radio" value="page" checked>
                  <span>Page</span>
                </div>
                <div class="audint-meta-checkbox-wrap">
                  <input type="radio" value="post">
                  <span>Post</span>
                </div>
                <div class="audint-meta-checkbox-wrap">
                  <input type="radio" value="other">
                  <span>Custom</span>
                </div>
              </div>
              <input type="url" name="audint_home_callout_1_link" id="audint_home_callout_1_link" value="<?php echo $callout_1_link_value; ?>">
            </div>
          </div>
          
          <?php
            // callout 1 image
            $callout_1_link_image_value = audint_get_meta_or_default( $post->ID, 'audint_home_callout_1_image', 'home_callouts', 'callout_1_image' );
          ?>
          <div class="audint-meta-field-group inline js-media-library-fields">
            <label for="audint_home_callout_1_image" class="audint-meta-field-group__left">
              <strong>Image</strong>
            </label>
            <div class="audint-meta-field-group__right grow">
              <button id="audint_home_callout_1_image_button" class="is-primary js-media-library-fields__button">Choose Image</button>
              <div id="audint_home_callout_1_image_preview" class="audint-meta-image-preview js-media-library-fields__preview-wrap">
                <img src="<?php echo $callout_1_link_image_value; ?>" class="js-media-library-fields__preview-img">
                <button class="audint-meta-image-remove js-media-library-fields__remove">X Remove</button>
              </div>
              <input type="text" name="audint_home_callout_1_image" id="audint_home_callout_1_image" class="js-media-library-fields__input" value="<?php echo $callout_1_link_image_value; ?>">
            </div>
          </div>

          <?php 
            // callout 1 image position
            $callout_1_image_position_value = audint_get_meta_or_default( $post->ID, 'audint_home_callout_1_image_position', 'home_callouts', 'callout_1_image_position' );
          ?>
          <div class="audint-meta-field-group inline">
            <label for="audint_home_callout_1_image_position" class="audint-meta-field-group__left">
              <strong>Image position</strong>
            </label>
            <div class="audint-meta-field-group__right grow">
              <div class="audint-meta-checkbox-wrap">
                <input type="radio" name="audint_home_callout_1_image_position[]" id="audint_home_callout_1_image_position_1" value="left" <?php echo $callout_1_image_position_value === 'left' ? 'checked' : ''; ?>>
                <span>Left</span>
              </div>
              <div class="audint-meta-checkbox-wrap">
                <input type="radio" name="audint_home_callout_1_image_position[]" id="audint_home_callout_1_image_position_2" value="left" <?php echo $callout_1_image_position_value === 'right' ? 'checked' : ''; ?>>
                <span>Right</span>
              </div>
            </div>
          </div>
          
          <?php
            // callout 1 style
            $callout_1_style_value = audint_get_meta_or_default( $post->ID, 'audint_home_callout_1_style', 'home_callouts', 'callout_1_style' );
          ?>
          <div class="audint-meta-field-group inline">
            <label for="audint_home_callout_1_style" class="audint-meta-field-group__left">
              <strong>Style</strong>
            </label>
            <div class="audint-meta-field-group__right grow">
              <div class="audint-meta-checkbox-wrap">
                <input type="radio" name="audint_home_callout_1_style[]" id="audint_home_callout_1_style_1" value="dark" <?php echo $callout_1_style_value === 'dark' ? 'checked' : ''; ?>>
                <span>Dark</span>
              </div>
              <div class="audint-meta-checkbox-wrap">
                <input type="radio" name="audint_home_callout_1_style[]" id="audint_home_callout_1_style_2" value="light" <?php echo $callout_1_style_value === 'light' ? 'checked' : ''; ?>>
                <span>Light</span>
              </div>
            </div>
          </div>
        </div><!-- callout 1 fields -->

      </div>
    </div>

  </div><!-- outer -->

  <?php
}