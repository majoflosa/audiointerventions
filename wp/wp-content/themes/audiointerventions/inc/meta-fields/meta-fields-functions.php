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
