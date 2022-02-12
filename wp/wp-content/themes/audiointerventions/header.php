<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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

  <!-- <header class="header">
    <div class="header__left">
      <img src="<?php echo ASSETS_URL . '/img/audio-interventions.png'; ?>" alt="Logo">
    </div>
    <div class="header__right">
      <nav class="nav">
        <a class="nav__link active">Home</a>
        <a href="./about-us/" class="nav__link">About Us</a>
        <a href="./products/" class="nav__link">Products</a>
        <a href="./services/" class="nav__link">Services</a>
        <a href="./photo-gallery/" class="nav__link">Photo Gallery</a>
        <a href="./contact-us/" class="nav__link">Contact Us</a>
      </nav>
      <div class="header__social">
        <a href="#" class="header__social-link">
          <?php get_template_part( 'partials/svg/facebook' ); ?>
        </a>
        <a href="#" class="header__social-link">
          <?php get_template_part( 'partials/svg/instagram' ); ?>
        </a>
        <a href="#" class="header__social-link">
          <?php get_template_part( 'partials/svg/youtube' ); ?>
        </a>
      </div>
    </div>
    <div class="grid-flag" style="background-image: url('<?php echo ASSETS_URL . './img/grid-flag.svg'; ?>');"></div>
  </header> -->
  
  <header class="header">
    <div class="header__left">
      <img src="<?php echo ASSETS_URL . '/img/audio-interventions.png'; ?>" alt="Logo">
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
        <a href="#" class="header__social-link">
          <?php get_template_part( 'partials/svg/facebook' ); ?>
        </a>
        <a href="#" class="header__social-link">
          <?php get_template_part( 'partials/svg/instagram' ); ?>
        </a>
        <a href="#" class="header__social-link">
          <?php get_template_part( 'partials/svg/youtube' ); ?>
        </a>
      </div>
    </div>
    <div class="grid-flag" style="background-image: url('<?php echo ASSETS_URL . './img/grid-flag.svg'; ?>');"></div>
  </header>

  <nav style="position: absolute; top: 0; right: 0; background: black; color: white; z-index: 999; border: 1px solid white; display: none;">
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
  </nav>

