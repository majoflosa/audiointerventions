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

function audint_home_banner_cb( $post ) {
  // audint_print_r( get_post_meta( $post->ID, '_wp_page_template', true) );
  ?>
  
  <div class="outer">
    <p class="description">Settings for main banner shown on home page.</p>
    <hr>

    <div class="meta-row audint-meta-row js-bicolor-text" id="audint-meta-home-banner">
      <div class="meta-td audint-meta-td">

        <div class="audint-meta-field-group inline">
          <label for="audint_home_banner_heading" class="audint-meta-field-group__left">
            <span>Heading</span>
          </label>
          <div class="audint-meta-field-group__right grow">
            <input type="text" name="audint_home_banner_heading" id="audint_home_banner_heading" class="js-bicolor-text__text-input" autocomplete="off" value="Your Personalized Car Audio Awaits" />
          </div>
        </div>

        <div class="audint-meta-field-group inline">
          <label for="audint_home_banner_heading_bicolor" class="audint-meta-field-group__left">
            <span>Use red-colored words on heading?</span>
          </label>
          <div class="audint-meta-field-group__right">
            <input type="checkbox" name="audint_home_banner_heading_bicolor" id="audint_home_banner_heading_bicolor" class="js-bicolor-text__checkbox-input" checked />
          </div>
        </div>

        <div class="audint-meta-field-group inline js-bicolor-text__words-wrap" id="audint_home_banner_heading_words_wrap">
          <label for="audint_home_banner_heading_colored_words" class="audint-meta-field-group__left">
            <span>Click on the words you want to display in red.</span>
          </label>
          <div class="audint-meta-field-group__right grow">
            <div id="audint_home_banner_heading_words" class="audint-home-banner-heading-words js-bicolor-text__words"></div>
            <input type="hidden" name="audint_home_banner_heading_colored_words" id="audint_home_banner_heading_colored_words" class="js-bicolor-text__words-input" value="1" />
          </div>
        </div>

        <div class="audint-meta-field-group inline">
          <label for="audint_home_banner_text" class="audint-meta-field-group__left">Text under heading <em>(Ideal character count of about 150, or about 25 words)</em></label>
          <div class="audint-meta-field-group__right grow">
            <textarea name="audint_home_banner_text" id="audint_home_banner_text" rows="3"></textarea>
          </div>
        </div>

        <div class="audint-meta-field-group inline js-media-library-fields">
          <label for="audint_home_banner_background_image" class="audint-meta-field-group__left">Choose image to display on the banner</label>
          <div class="audint-meta-field-group__right grow">
            <button id="audint_home_banner_image_button" class="is-primary js-media-library-fields__button">Choose Image</button>
            <div id="audint_home_banner_image_preview" class="audint-meta-home-banner-preview js-media-library-fields__preview-wrap">
              <img class="js-media-library-fields__preview-img">
              <button class="js-media-library-fields__remove">Remove</button>
            </div>
            <input type="text" name="audint_home_banner_background_image" id="audint_home_banner_background_image" class="js-media-library-fields__input">
          </div>
        </div>

        <div class="audint-meta-field-group inline">
          <label for="audint_home_banner_display_hours" class="audint-meta-field-group__left">
            <span>Display hours section under banner?</span>
          </label>
          <div class="audint-meta-field-group__right">
            <input type="checkbox" name="audint_home_banner_display_hours" id="audint_home_banner_display_hours" />
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php
}