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