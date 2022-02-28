<?php
/**
 * Functions for outputting custom fields
 */

/**
 * Outputs simple text field.
 * 
 * args: label, description, name, id, value, default_value
 */
function audint_meta_text( $args ) {
?>

  <div class="audint-meta-field-group inline">
    <label for="<?php echo $args['name']; ?>" class="audint-meta-field-group__left">
      <strong><?php echo $args['label']; ?></strong>
      <?php if ( isset( $args['description'] ) ) : ?>
        <span><?php echo $args['description']; ?></span>
      <?php endif; ?>
      <?php if ( isset( $args['default_value'] ) ) : ?>
        <span>(If blank, defaults to <em>"<?php echo $args['default_value']; ?>"</em>)</span>
      <?php endif; ?>
    </label>
    <div class="audint-meta-field-group__right grow">
      <input type="text" name="<?php echo $args['name']; ?>" id="<?php echo $args['id']; ?>" value="<?php echo esc_html( $args['value'] ); ?>">
    </div>
  </div>

<?php
}

/**
 * Outputs textarea
 * 
 * args: label, description, name, id, value, default_value, rows, recommended_length
 */
function audint_meta_textarea( $args ) {
?>
  <div class="audint-meta-field-group inline">
    <label for="<?php echo $args['name']; ?>" class="audint-meta-field-group__left">
      <strong><?php echo $args['label']; ?></strong>
      <?php if ( isset( $args['description'] ) ) : ?>
        <span><?php echo $args['description']; ?></span>
      <?php endif; ?>
      <?php if ( isset( $args['default_value'] ) ) : ?>
        <span>(If blank, defaults to <em>"<?php echo $args['default_value']; ?>"</em>)</span>
      <?php endif; ?>
    </label>
    <div class="audint-meta-field-group__right grow js-character-count">
      <textarea name="<?php echo $args['name']; ?>" id="<?php echo $args['id']; ?>" rows="<?php echo $args['rows']; ?>" class="js-character-count__field"><?php echo esc_textarea( $args['value'] ); ?></textarea>
      <small>Character count: <strong class="js-character-count__label"><?php echo count($args['value']); ?></strong>
      <?php if ( isset( $args['recommended_length'] ) ) : ?>
        <span> | (Recommended: <?php echo $args['recommended_length']; ?>)</span>
      <?php endif; ?>
      </small>
    </div>
  </div>
<?php
}

/**
 * Outputs Checkbox(es) or Radio inputs
 * 
 * args: label, description, name, id, input_type, options[name, id, value, is_checked, label]
 */
function audint_meta_checkboxes( $args ) {
?>

  <div class="audint-meta-field-group inline">
    <label for="<?php echo $args['name']; ?>" class="audint-meta-field-group__left">
      <strong><?php echo $args['label']; ?></strong>
      <?php if ( isset( $args['description'] ) ) : ?>
        <span><?php echo $args['description']; ?></span>
      <?php endif; ?>
    </label>
    <div class="audint-meta-field-group__right grow">
      <?php foreach ($args['options'] as $option_key => $option) : ?>
        <div class="audint-meta-checkbox-wrap">
          <input type="<?php echo $args['input_type']; ?>" name="<?php echo $option['name']; ?>" id="<?php echo $option['id']; ?>" <?php echo $option['is_checked'] ? 'checked' : ''; ?> value="<?php echo $option['value']; ?>">
          <span><?php echo $option_key; ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

<?php
}

/**
 * Outputs text, checkbox, and words list for bicolor text
 * 
 * $args: 
 *    text[label, description, name, id, value, default_value]
 *    bicolor[label, description, name, id, is_checked]
 *    words[label, description, name, id, value]
 */
function audint_meta_bicolor_text( $args ) {
  ?>

  <div class="js-bicolor-text">
    <div class="audint-meta-field-group inline">
      <label for="<?php echo $args['text']['name']; ?>" class="audint-meta-field-group__left">
        <strong><?php echo $args['text']['label']; ?></strong>
        <?php if ( isset( $args['text']['description'] ) ) : ?>
          <span> <?php echo $args['text']['description']; ?></span>
        <?php endif; ?>
        <?php if ( isset( $args['text']['default_value'] ) ) : ?>
          <span> (If blank, defaults to <em>"<?php echo $args['text']['default_value']; ?>"</em>)</span>
        <?php endif; ?>
      </label>
      <div class="audint-meta-field-group__right grow">
        <input type="text" name="<?php echo $args['text']['name']; ?>" id="<?php echo $args['text']['id']; ?>" value="<?php echo esc_html( $args['text']['value'] ); ?>" class="js-bicolor-text__text-input" autocomplete="off">
      </div>
    </div>

    <div class="audint-meta-field-group inline">
      <label for="<?php echo $args['bicolor']['name']; ?>" class="audint-meta-field-group__left">
        <strong><?php echo $args['bicolor']['label']; ?></strong>
        <?php if ( isset( $args['bicolor']['description'] ) ) : ?>
          <span> <?php echo $args['bicolor']['description']; ?></span>
        <?php endif; ?>
      </label>
      <div class="audint-meta-field-group__right grow">
        <input type="checkbox" name="<?php echo $args['bicolor']['name']; ?>" id="<?php echo $args['bicolor']['id']; ?>" value="1" <?php echo $args['bicolor']['is_checked']; ?> class="js-bicolor-text__checkbox-input">
      </div>
    </div>

    <div class="audint-meta-field-group inline audint-meta-colored-words-wrap js-bicolor-text__words-wrap">
      <label for="<?php echo $args['words']['name']; ?>" class="audint-meta-field-group__left">
        <strong><?php echo $args['words']['label']; ?></strong>
        <?php if ( isset( $args['words']['description'] ) ) : ?>
          <span> <?php echo $args['words']['description']; ?></span>
        <?php endif; ?>
      </label>
      <div class="audint-meta-field-group__right grow">
        <div class="audint-home-banner-heading-words js-bicolor-text__words"></div>
        <input type="hidden" name="<?php echo $args['words']['name']; ?>" id="<?php echo $args['words']['id']; ?>" class="js-bicolor-text__words-input" value="<?php echo $args['words']['value']; ?>" />
      </div>
    </div>

  </div>

  <?php
}

/**
 * Outputs Image field with WP Media Uploader
 * 
 * $args: label, description, name, id, default_value, value
 */
function audint_meta_media_image( $args ) {
  ?>

  <div class="audint-meta-field-group inline js-media-library-fields">
    <label for="<?php echo $args['name']; ?>" class="audint-meta-field-group__left">
      <strong><?php echo $args['label']; ?></strong>
      <?php if ( isset( $args['description'] ) ) : ?>
        <span><?php echo $args['description']; ?></span>
      <?php endif; ?>
      <?php if ( isset( $args['default_value'] ) ) : ?>
        <span>(If blank, defaults to <a href="<?php echo $args['default_value']; ?>" target="_blank">this image</a>.)</span>
      <?php endif; ?>
    </label>
    <div class="audint-meta-field-group__right grow">
      <div class="audint-meta-image-preview js-media-library-fields__preview-wrap">
        <img src="<?php echo $args['value']; ?>" class="js-media-library-fields__preview-img">
        <button class="audint-meta-image-remove js-media-library-fields__remove">X Remove</button>
      </div>
      <button class="audint-meta-image-button button button-primary js-media-library-fields__button">Choose Image</button>
      <input type="text" name="<?php echo $args['name']; ?>" id="<?php echo $args['id']; ?>" class="js-media-library-fields__input" value="<?php echo $args['value']; ?>">
    </div>
  </div>

  <?php
}


/**
 * Outputs a rich text editor field
 */
function audint_meta_wp_editor( $args ) {
  ?>

  <div class="audint-meta-field-group inline">
    <label for="audint_home_callout_1_body" class="audint-meta-field-group__left">
      <strong><?php echo $args['label']; ?></strong>
      <?php if ( isset( $args['description'] ) ) : ?>
        <span><?php echo $args['description']; ?></span>
      <?php endif; ?>
      <?php if ( isset( $args['default_value'] ) ) : ?>
        <span> (If blank, defaults to <em>"<?php echo $args['default_value']; ?>"</em>)</span>
      <?php endif; ?>
    </label>
    <div class="audint-meta-field-group__right grow">
      <?php wp_editor( $args['value'], $args['id'], $args['wp_editor_settings'] ); ?>
    </div>
  </div>

  <?php
}
