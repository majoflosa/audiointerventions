<?php

/**
 * Returns a default value, or null if not set.
 * 
 * @param $group_name   string
 * @param $option_name  string
 */
function audint_get_default( $group_name, $option_name ) {
  global $audint_defaults;

  if ( ! isset( $audint_defaults[$group_name] ) ) return null;
  if ( ! isset( $audint_defaults[$group_name][$option_name] ) ) return null;

  return $audint_defaults[$group_name][$option_name];
}

/**
 * Returns a default group, or null if not set.
 * 
 * @param $group_name
 */
function audint_get_default_group( $group_name ) {
  global $audint_defaults;

  if ( ! isset ( $audint_defaults[$group_name] ) ) return null;

  return $audint_defaults[$group_name];
}

/**
 * Tries to get an option; returns it if set, otherwise returns default; if neither is set, returns null.
 * 
 * @param $group_name   string
 * @param $option_name  string
 */
function audint_get_option_or_default( $group_name, $option_name ) {
  global $audint_defaults;

  $option_value = get_option( $group_name . '_' . $option_name, 'option_not_set' );

  if ( $option_value === 'option_not_set' ) {
    return audint_get_default( $group_name, $option_name );
  }

  return $option_value;
}
