<?php
/**
 * Main site header
 */

$logo = audint_get_option_or_default( 'global', 'logo' );

$social_links = [
  'facebook'    => audint_get_option_or_default( 'social', 'facebook' ),
  'instagram'   => audint_get_option_or_default( 'social', 'instagram' ),
  'youtube'     => audint_get_option_or_default( 'social', 'youtube' ),
  'linkedin'    => audint_get_option_or_default( 'social', 'linkedin' ),
  'twitter'     => audint_get_option_or_default( 'social', 'twitter' ),
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo bloginfo( 'title' ) . wp_title(); ?></title>
  <?php wp_head(); ?>

  <script>
    window.audint = window.audint || {};
    window.audint.theme = {
      homeUrl: '<?php echo bloginfo( 'url' ); ?>',
      siteName: '<?php echo bloginfo( 'name' ); ?>',
      assetsPath: '<?php echo bloginfo( 'url' ); ?>/wp-content/themes/audiointerventions/assets/',
      ajaxUrl: '<?php echo bloginfo( 'url' ); ?>/wp-admin/admin-ajax.php',
      env: {
        mode: '<?php echo ENV_IS_PROD ? 'production' : 'development'; ?>',
        is_dev: <?php echo ENV_IS_DEV ? 'true' : 'false'; ?>,
        is_prod: <?php echo ENV_IS_PROD ? 'true' : 'false'; ?>,
      }
    };
  </script>

</head>
<body>

  <header class="header">
    <div class="header__left">
      <img src="<?php echo $logo; ?>" alt="Audio Interventions Logo">
    </div>
    <div class="header__right">
      <?php 
        $args = array(
            'theme_location' => 'main_menu',
            'container' => 'nav',
            'container_class' => 'header__nav',
            'menu_class' => 'menu header__nav-menu',
            'walker' => new Audint_Walker_Nav_Menu(),
        );
        wp_nav_menu( $args ); 
      ?>

      <div class="header__social">
        <?php
          foreach ( $social_links as $social => $url ) :
            if ( $url ) :
        ?>
              <a href="<?php echo $url; ?>" class="header__social-link" target="_blank" title="Find Audio Interventions on <?php echo ucfirst( $social ); ?>">
                <?php get_template_part( 'partials/svg/' . $social ); ?>
              </a>
        <?php 
            endif;
          endforeach;
        ?>
      </div>
    </div>
    <div class="grid-flag" style="background-image: url('<?php echo ASSETS_URL . './img/grid-flag.svg'; ?>');"></div>
  </header>
