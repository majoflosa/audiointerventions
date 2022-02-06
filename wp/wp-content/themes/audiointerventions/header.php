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

  <header class="header">
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
          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-facebook-f fa-w-10 fa-7x"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" class=""></path></svg>
        </a>
        <a href="#" class="header__social-link">
          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-instagram fa-w-14 fa-7x"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" class=""></path></svg>
        </a>
        <a href="#" class="header__social-link">
          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-youtube fa-w-18 fa-7x"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" class=""></path></svg>
        </a>
      </div>
    </div>
    <div class="grid-flag" style="background-image: url('<?php echo ASSETS_URL . './img/grid-flag.svg'; ?>');"></div>
  </header>

  <nav style="position: absolute; top: 0; right: 0; background: black; color: white; z-index: 999; border: 1px solid white;">
  <?php 
    $args = array(
        'theme_location' => 'main_menu',
        'container' => 'nav',
        'container_class' => 'header__nav',
        'menu_class' => 'menu header__nav-menu',
        // 'walker' => new Rem_Walker_Nav_Menu(),
    );
    wp_nav_menu( $args ); 
    ?>
  </nav>

