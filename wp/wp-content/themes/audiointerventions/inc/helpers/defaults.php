<?php

$audint_defaults = [
  // social
  'facebook'  => 'https://www.facebook.com/AudioInterventions239/',
  'instagram' => 'https://www.instagram.com/audiointerventions/',
  'youtube'   => '',
  'social'    => [
    'facebook'  => 'https://www.facebook.com/AudioInterventions239/',
    'instagram' => 'https://www.instagram.com/audiointerventions/',
    'youtube'   => '',
  ],
  // contact
  'address'   => '24201 S. Tamiami Trl. suite #1 \n Bonita Springs, FL 34134',
  'phone'     => '239-495-0586',
  'fax'       => '239-390-2150',
  'email'     => 'mario@audiointerventions.com',
  'contact'   => [
    'address'   => '24201 S. Tamiami Trl. suite #1 \n Bonita Springs, FL 34134',
    'phone'     => '239-495-0586',
    'fax'       => '239-390-2150',
    'email'     => 'mario@audiointerventions.com',
  ],
  // schedule
  'schedule' => [
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

function audint_get_default( $key ) {
  global $audint_defaults;

  return $audint_defaults[$key] ? $audint_defaults[$key] : null;
}
