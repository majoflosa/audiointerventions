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

    <div class="meta-row audint-meta-row">
      <div class="meta-td audint-meta-td">

        <div class="audint-meta-field-group inline">
          <label for="audint_home_banner_heading" class="audint-meta-field-group__left">
            <span>Heading</span>
          </label>
          <div class="audint-meta-field-group__right">
            <input type="text" name="audint_home_banner_heading" id="audint_home_banner_heading" />
          </div>
        </div>

        <div class="audint-meta-field-group inline">
          <label for="audint_home_banner_heading_bicolor" class="audint-meta-field-group__left">
            <span>Use red-colored words on heading?</span>
          </label>
          <div class="audint-meta-field-group__right">
            <input type="checkbox" name="audint_home_banner_heading_bicolor" id="audint_home_banner_heading_bicolor" />
          </div>
        </div>

        <div class="audint-meta-field-group inline">
          <label for="audint_home_banner_heading_colored_words" class="audint-meta-field-group__left">
            <span>Click on the words you want to display in red.</span>
          </label>
          <div class="audint-meta-field-group__right grow">
            <input type="hidden" name="audint_home_banner_heading_colored_words" id="audint_home_banner_heading_colored_words" />
          </div>
        </div>

        <div class="audint-meta-field-group inline">
          <label for="audint_home_banner_text" class="audint-meta-field-group__left">Text under heading <em>(Ideal character count of about 150, or about 25 words)</em></label>
          <div class="audint-meta-field-group__right grow">
            <textarea name="audint_home_banner_text" id="audint_home_banner_text" rows="3"></textarea>
          </div>
        </div>

        <div class="audint-meta-field-group inline">
          <label for="audint_home_banner_background_image" class="audint-meta-field-group__left">Choose image to display on the banner</label>
          <div class="audint-meta-field-group__right grow">
            <button class="is-primary">Choose Image</button>
            <div class="audint-meta-home-banner-preview"></div>
            <input type="hidden" name="audint_home_banner_background_image" id="audint_home_banner_background_image">
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