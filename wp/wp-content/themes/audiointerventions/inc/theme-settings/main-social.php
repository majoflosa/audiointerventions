<?php

/**
 * Main Settings - Social Media Settings section
 */
$audint_defaults['social'] = [
  'facebook'  => 'https://www.facebook.com/AudioInterventions239/',
  'instagram' => 'https://www.instagram.com/audiointerventions/',
];

$audint_theme_settings['main']['social'] = [
  'id'        => 'audint_settings_social',
  'title'     => 'Social Media',
  'callback'  => 'audint_social_settings_cb',
  'page'      => 'audint_main_settings_page',
  'fields'    => [
    [
      'id'        => 'audint_social_facebook',
      'title'     => 'Facebook',
      'callback'  => 'audint_social_facebook_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_social',
      'args'      => [],
    ],
    [
      'id'        => 'audint_social_instagram',
      'title'     => 'Instagram',
      'callback'  => 'audint_social_instagram_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_social',
      'args'      => [],
    ],
    [
      'id'        => 'audint_social_youtube',
      'title'     => 'YouTube',
      'callback'  => 'audint_social_youtube_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_social',
      'args'      => [],
    ],
    [
      'id'        => 'audint_social_linkedin',
      'title'     => 'LinkedIn',
      'callback'  => 'audint_social_linkedin_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_social',
      'args'      => [],
    ],
    [
      'id'        => 'audint_social_twitter',
      'title'     => 'Twitter',
      'callback'  => 'audint_social_twitter_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_social',
      'args'      => [],
    ],
    [
      'id'        => 'audint_social_display_in_header',
      'title'     => 'Display in Header',
      'callback'  => 'audint_social_display_in_header_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_social',
      'args'      => [],
    ],
    [
      'id'        => 'audint_social_display_in_footer',
      'title'     => 'Display in Footer',
      'callback'  => 'audint_social_display_in_footer_cb',
      'page'      => 'audint_main_settings_page',
      'section'   => 'audint_settings_social',
      'args'      => [],
    ],
  ]
];

function audint_social_settings_cb() {
  // this is the section desciption
  ?>
    <hr>
  <?php
}

function audint_social_facebook_cb() {
  ?>
    <input type="url" name="audint_main_settings[social_facebook]" placeholder="https://facebook.com/your-page" class="main-settings__text-input">
    <span class="description">URL of your Facebook page</span>
  <?php
}

function audint_social_instagram_cb() {
  ?>
    <input type="url" name="audint_main_settings[social_instagram]" placeholder="https://instagram.com/your-page" class="main-settings__text-input">
    <span class="description">URL of your Instagram page</span>
  <?php
}

function audint_social_youtube_cb() {
  ?>
    <input type="url" name="audint_main_settings[social_youtube]" placeholder="https://youtube.com/your-page" class="main-settings__text-input">
    <span class="description">URL of your YouTube page</span>
  <?php
}

function audint_social_linkedin_cb() {
  ?>
    <input type="url" name="audint_main_settings[social_linkedin]" placeholder="https://linkedin.com/your-page" class="main-settings__text-input">
    <span class="description">URL of your LinkedIn page</span>
  <?php
}

function audint_social_twitter_cb() {
  ?>
    <input type="url" name="audint_main_settings[social_twitter]" placeholder="https://twitter.com/your-page" class="main-settings__text-input">
    <span class="description">URL of your Twitter page</span>
  <?php
}

function audint_social_display_in_header_cb() {
  ?>
    <input type="checkbox" name="audint_main_settings[social_display_in_header]" class="main-settings__checkbox-input">
    <span class="description">Enable/disable social media links in main navigation bar</span>
  <?php
}

function audint_social_display_in_footer_cb() {
  ?>
    <input type="checkbox" name="audint_main_settings[social_display_in_footer]" class="main-settings__checkbox-input">
    <span class="description">Enable/disable social media links in footer navigation</span>
  <?php
}
