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

// helpers
// Each group of defaults are set in each settings file. (Ex: inc/theme-settings/main-global.php)
$audint_defaults = [];
require_once 'inc/helpers/defaults.php';

// custom posts and taxonomies
// theme options
$audint_theme_settings = [];
require_once 'inc/theme-settings/main-settings.php';
require_once 'inc/theme-settings/main-global.php';
require_once 'inc/theme-settings/main-hours.php';
require_once 'inc/theme-settings/main-social.php';

// meta boxes
$audint_meta_boxes = [];
require_once 'inc/meta-fields/meta-page-home.php';

// taxonomy meta

// actions
// filters


// other
function audint_print_r( $var ) {
    echo '<pre>';
    print_r( $var );
    echo '</pre>';
}

function audint_admin_is_page_template( $template, $id ) {
    global $post;
    if ( ! $id ) {
        $id = $post->ID;
    }

    $full_template = 'page-templates/' . $template;

    return $full_template === get_post_meta( $id, '_wp_page_template', true );
}

function audint_is_valid_nonce( $action, $name ) {
    if ( isset( $_POST[$name] ) && wp_verify_nonce( $_POST[$name], $action ) ) {
        return true;
    }

    return false;
}