<?php

/**
 * Main Settings - Hours settings
 */
$audint_defaults['hours'] = [
  'monday' => '10:00 - 6:00',
  'tuesday' => '10:00 - 6:00',
  'wednesday' => '10:00 - 6:00',
  'thursday' => '10:00 - 6:00',
  'friday' => '10:00 - 6:00',
  'saturday' => '9:00 - 3:00',
  'sunday' => 'Closed',
];

$audint_theme_settings['main']['hours'] = [
  'id'        => 'audint_settings_hours',
  'title'     => 'Hours',
  'callback'  => 'audint_hours_settings_cb',
  'page'      => 'audint_main_settings_page',
  'fields'    => [
    [
      'id'        => 'audint_hours_monday',
      'title'     => 'Monday',
      'callback'  => 'audint_hours_monday_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_hours',
      'args'      => [],
    ],
    [
      'id'        => 'audint_hours_tuesday',
      'title'     => 'Tuesday',
      'callback'  => 'audint_hours_tuesday_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_hours',
      'args'      => [],
    ],
    [
      'id'        => 'audint_hours_wednesday',
      'title'     => 'Wednesday',
      'callback'  => 'audint_hours_wednesday_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_hours',
      'args'      => [],
    ],
    [
      'id'        => 'audint_hours_thursday',
      'title'     => 'Thursday',
      'callback'  => 'audint_hours_thursday_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_hours',
      'args'      => [],
    ],
    [
      'id'        => 'audint_hours_friday',
      'title'     => 'Friday',
      'callback'  => 'audint_hours_friday_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_hours',
      'args'      => [],
    ],
    [
      'id'        => 'audint_hours_saturday',
      'title'     => 'Saturday',
      'callback'  => 'audint_hours_saturday_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_hours',
      'args'      => [],
    ],
    [
      'id'        => 'audint_hours_sunday',
      'title'     => 'Sunday',
      'callback'  => 'audint_hours_sunday_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_hours',
      'args'      => [],
    ],
  ],
];

function audint_hours_settings_cb() {
  ?>
    <p class="description">Hours for each day will display the text entered in each field verbatim.</p>
    <hr>
  <?php
}

function audint_hours_monday_cb() {
  ?>
    <input type="text" name="audint_main_settings[hours_monday]" placeholder="10:00am - 6:00pm">
  <?php
}
function audint_hours_tuesday_cb() {
  ?>
    <input type="text" name="audint_main_settings[hours_tuesday]" placeholder="10:00am - 6:00pm">
  <?php
}
function audint_hours_wednesday_cb() {
  ?>
    <input type="text" name="audint_main_settings[hours_wednesday]" placeholder="10:00am - 6:00pm">
  <?php
}
function audint_hours_thursday_cb() {
  ?>
    <input type="text" name="audint_main_settings[hours_thursday]" placeholder="10:00am - 6:00pm">
  <?php
}
function audint_hours_friday_cb() {
  ?>
    <input type="text" name="audint_main_settings[hours_friday]" placeholder="10:00am - 6:00pm">
  <?php
}
function audint_hours_saturday_cb() {
  ?>
    <input type="text" name="audint_main_settings[hours_saturday]" placeholder="9:00am - 3:00pm">
  <?php
}
function audint_hours_sunday_cb() {
  ?>
    <input type="text" name="audint_main_settings[hours_sunday]" placeholder="Closed">
  <?php
}