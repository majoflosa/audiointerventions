<?php
$is_dev = $_SERVER['HTTP_HOST'] !== 'audiointerventions.com';
$is_prod = !$is_dev;

define( 'ENV_IS_DEV', $is_dev );
define( 'ENV_IS_PROD', $is_prod );

if ( $is_dev ) {
    $theme_url = 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes/audiointerventions';
} else {
    $theme_url = get_template_directory_uri();
}
define( 'THEME_URL', $theme_url );
define( 'ASSETS_URL', $theme_url . '/assets/');

// general theme setup
require_once 'inc/enqueue.php';
require_once 'inc/theme-setup.php';
require_once 'inc/walkers/walker-header-nav.php';

// custom posts and taxonomies
// theme options
$audint_theme_settings = [];
require_once 'inc/theme-settings/main-settings.php';
require_once 'inc/theme-settings/main-social.php';

// meta boxes
// taxonomy meta
// helpers
require_once 'inc/helpers/defaults.php';

// actions
// filters
