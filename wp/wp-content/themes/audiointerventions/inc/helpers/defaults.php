<?php

$audint_defaults = [
  // global
  'global'  => [
    'logo'  => ASSETS_URL . '/img/audio-interventions.png',
  ],
  // social
  'social'    => [
    'facebook'  => 'https://www.facebook.com/AudioInterventions239/',
    'instagram' => 'https://www.instagram.com/audiointerventions/',
  ],
  // contact
  'contact'   => [
    'address'   => '24201 S. Tamiami Trl. suite #1 \n Bonita Springs, FL 34134',
    'phone'     => '239-495-0586',
    'fax'       => '239-390-2150',
    'email'     => 'mario@audiointerventions.com',
  ],
  // schedule
  'hours' => [
    'Monday' => [ 
      'open'  => [ 'h' => 10, 'm' => 0, 'ampm' => 'AM' ],
      'close' => [ 'h' => 6, 'm' => 0, 'ampm' => 'PM' ],
    ],
    'Monday' => [ 
      'open'  => [ 'h' => 10, 'm' => 0, 'ampm' => 'AM' ],
      'close' => [ 'h' => 6, 'm' => 0, 'ampm' => 'PM' ],
    ],
    'Monday' => [ 
      'open'  => [ 'h' => 10, 'm' => 0, 'ampm' => 'AM' ],
      'close' => [ 'h' => 6, 'm' => 0, 'ampm' => 'PM' ],
    ],
    'Monday' => [ 
      'open'  => [ 'h' => 10, 'm' => 0, 'ampm' => 'AM' ],
      'close' => [ 'h' => 6, 'm' => 0, 'ampm' => 'PM' ],
    ],
    'Monday' => [ 
      'open'  => [ 'h' => 10, 'm' => 0, 'ampm' => 'AM' ],
      'close' => [ 'h' => 6, 'm' => 0, 'ampm' => 'PM' ],
    ],
    'Saturday' => [ 
      'open'  => [ 'h' => 9, 'm' => 0, 'ampm' => 'AM' ],
      'close' => [ 'h' => 3, 'm' => 0, 'ampm' => 'PM' ],
    ],
    'Sunday' => null,
  ]
  //
];

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
