<?php
/**
 * Template Name: Home
 */

get_header();
?>

<!-- = = = = = = = = = = = = = = = = = = = = =
  BEGIN HERO BANNER
= = = = = = = = = = = = = = = = = = = = = = -->
<?php
  $hero_image = audint_get_meta_or_default( get_the_ID(), 'audint_home_banner_background_image', 'home_banner', 'image' );
  $hero_heading = audint_get_meta_or_default( get_the_ID(), 'audint_home_banner_heading', 'home_banner', 'heading' );
  $hero_is_bicolor = audint_get_meta_or_default( get_the_ID(), 'audint_home_banner_heading_bicolor', 'home_banner', 'bicolor' );
  $hero_colored_words = audint_get_meta_or_default( get_the_ID(), 'audint_home_banner_colored_words', 'home_banner', 'colored_words' );
  $hero_text = audint_get_meta_or_default( get_the_ID(), 'audint_home_banner_text', 'home_banner', 'text' );
  $hero_display_hours = audint_get_meta_or_default( get_the_ID(), 'audint_home_banner_display_hours', 'home_banner', 'display_hours' );
?>
<div class="hero">
  <div class="hero__img" style="background-image: url('<?php echo $hero_image; ?>');"></div>
  <div class="hero__inner constraint-lg">
    <div class="hero__content">
      <h1 class="hero__title">
        <?php if ( $hero_is_bicolor ) :
          $words = explode( ' ', $hero_heading );
          $hero_colored_words_arr = explode( ',', $hero_colored_words );
          $words_index = 0;
        ?>
          <?php foreach ($words as $word) : ?>
            <?php if ( in_array( $words_index, $hero_colored_words_arr, false ) ) : ?>
              <span class="color-primary"><?php echo $word . ' '; ?></span>
            <?php else : ?>
              <?php echo $word . ' '; ?>
            <?php endif;
            $words_index++;
          endforeach; ?>
        <?php else : ?>
          <?php echo $hero_heading; ?>
        <?php endif; ?>
      </h1>
      <p class="hero__tagline"><?php echo $hero_text; ?></p>
    </div>
  </div>
  <div class="grid-flag" style="background-image: url('./img/grid-flag.svg');"></div>
</div>

<!-- = = = = = = = = = = = = = = = = = = = = =
  BEGIN HOURS BANNER
= = = = = = = = = = = = = = = = = = = = = = -->
<?php if ( $hero_display_hours ) : ?>
<div class="hours-banner">
  <div class="hours-banner__left">
    <strong class="hours-banner__label">Our Hours</strong>
    <div class="hours-banner__days">
      <span class="hours-banner__day">Mon - Fri</span>
      <span class="hours-banner__hour">10:00 - 6:00</span>
    </div>
    <div class="hours-banner__days">
      <span class="hours-banner__day">Sat</span>
      <span class="hours-banner__hour">9:00 - 3:00</span>
    </div>
    <div class="hours-banner__days">
      <span class="hours-banner__day">Sun</span>
      <span class="hours-banner__hour">Closed</span>
    </div>
  </div>
  <div class="hours-banner__right">
    <span class="hours-banner__phone">Phone</span>
    <strong>239-495-0586</strong>
  </div>
</div>
<?php endif; ?>

<!-- = = = = = = = = = = = = = = = = = = = = =
  BEGIN CALLOUT SECTIONS
= = = = = = = = = = = = = = = = = = = = = = -->
<?php
  $home_callouts = [
    'heading' => audint_get_meta_or_default( get_the_ID(), 'audint_home_callouts_heading', 'home_callouts', 'heading' ),
    'callouts' => [],
  ];
  $home_callout_keys = ['callout_1', 'callout_2', 'callout_3'];
  foreach( $home_callout_keys as $key ) :
    $home_callouts['callouts'][$key] = [
      'title' => audint_get_meta_or_default( get_the_ID(), 'audint_home_' . $key . '_title', 'home_callouts', $key . '_title' ),
      'bicolor' => audint_get_meta_or_default( get_the_ID(), 'audint_home_' . $key . '_bicolor', 'home_callouts', $key . '_bicolor' ),
      'colored_words' => audint_get_meta_or_default( get_the_ID(), 'audint_home_' . $key . '_colored_words', 'home_callouts', $key . '_colored_words' ),
      'body' => audint_get_meta_or_default( get_the_ID(), 'audint_home_' . $key . '_body', 'home_callouts', $key . '_body' ),
      'link_type' => audint_get_meta_or_default( get_the_ID(), 'audint_home_' . $key . '_link_type', 'home_callouts', $key . '_link_type' ),
      'link' => audint_get_meta_or_default( get_the_ID(), 'audint_home_' . $key . '_link', 'home_callouts', $key . '_link' ),
      'link_text' => audint_get_meta_or_default( get_the_ID(), 'audint_home_' . $key . '_link_text', 'home_callouts', $key . '_link_text' ),
      'link_new_tab' => audint_get_meta_or_default( get_the_ID(), 'audint_home_' . $key . '_link_new_tab', 'home_callouts', $key . '_link_new_tab' ),
      'image' => audint_get_meta_or_default( get_the_ID(), 'audint_home_' . $key . '_image', 'home_callouts', $key . '_image' ),
      'layout' => audint_get_meta_or_default( get_the_ID(), 'audint_home_' . $key . '_image_position', 'home_callouts', $key . '_image_position' ),
      'style' => audint_get_meta_or_default( get_the_ID(), 'audint_home_' . $key . '_style', 'home_callouts', $key . '_style' ),
    ];
  endforeach;
?>
<section class="section-wrap section-wrap--full-width why-us-section">
  <div class="section-wrap__inner">

    <header class="section-header">
      <h2 class="section-header__title section-header__title--center section-header__title--big">
        <?php echo $home_callouts['heading']; ?>
      </h2>
    </header>

    <?php foreach ($home_callouts['callouts'] as $key => $callout) : ?>
      <?php
        $article_classes = 'feature-callout';
        $article_classes .= $callout['layout'] === 'left' ? ' feature-callout--reverse' : '';
        $article_classes .= $callout['style'] === 'light' ? ' feature-callout--light' : '';
        $title_classes = 'feature-callout__title type-title-2';
        $title_classes .= $callout['style'] === 'dark' ? ' color-lightest' : ' color-darkest';
        $body_classes = 'feature-callout__body type-body-2';
        $body_classes .= $callout['style'] === 'dark' ? ' color-light' : ' color-dark';
      ?>
      <article class="<?php echo $article_classes; ?>">
        <div class="feature-callout__content">
          <div class="feature-callout__content-inner">
            <header class="feature-callout__header">
              <h2 class="<?php echo $title_classes; ?>">
              <?php if ( $callout['bicolor'] ) :
                $words = explode( ' ', $callout['title'] );
                $title_colored_words_arr = explode( ',', $callout['colored_words'] );
                $words_index = 0;
              ?>
                <?php foreach ( $words as $word ) : ?>
                  <?php if ( in_array( $words_index, $title_colored_words_arr, false) ) : ?>
                    <span class="color-primary"><?php echo $word . ' '; ?></span>
                  <?php else : ?>
                    <?php echo $word . ' '; ?>
                  <?php endif; ?>
                <?php $words_index++; endforeach; ?>
              <?php else : ?>
                <?php echo $callout['title']; ?>
              <?php endif; ?>
              </h2>
            </header>
            <main class="<?php echo $body_classes; ?>">
              <?php echo $callout['body']; ?>
            </main>
            <footer class="feature-callout__footer">
              <a
                href="<?php echo $callout['link']; ?>"
                <?php echo $callout['link_new_tab'] ? 'target="_blank"' : ''; ?>
                class="feature-callout__cta-btn">
                <?php echo $callout['link_text']; ?> »
              </a>
            </footer>
          </div><!-- end content-inner -->
          <div class="grid-flag" style="background-image: url('<?php echo ASSETS_URL; ?>/img/grid-flag.svg');"></div>
        </div>
        <div class="feature-callout__image" style="background-image: url('<?php echo $callout["image"]; ?>');"></div>
      </article>
    <?php endforeach; ?>

  </div>
</section>


<!-- = = = = = = = = = = = = = = = = = = = = =
  BEGIN SHOW OFF SECTION
= = = = = = = = = = = = = = = = = = = = = = -->
<section class="section-wrap section-wrap--gray show-off-section">
  <div class="section-wrap__inner">
    
    <div class="grid show-off">
      <div class="grid__cell col-6">
        <div class="show-off__left">
          <div class="show-off__left-content">
            <h2 class="show-off__title">Show off your <span class="color-primary">new sound system</span></h2>
            <p class="show-off__text">when you choose us for products and installation designed to fit your lifestyle</p>
            <div>
              <a href="#" class="show-off__cta">Check out the Gallery »</a>
            </div>
          </div>
        </div>
      </div>

      <div class="grid__cell col-6">
        <div class="show-off__right">
          <div class="show-off__right-content">
            <div class="show-off__img-wrap first">
              <img src="./img/show-off-1.jpg" alt="">
            </div>
            <div class="show-off__img-wrap second">
              <img src="./img/show-off-2.jpg" alt="">
            </div>
            <div class="show-off__img-wrap third">
              <img src="./img/show-off-3.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="grid-flag" style="background-image: url('./img/grid-flag.svg');"></div>

  </div>
</section>


<!-- = = = = = = = = = = = = = = = = = = = = =
  BEGIN HERO
= = = = = = = = = = = = = = = = = = = = = = -->
<div class="section-wrap section-wrap--bg-img section-wrap--big bg-overlay" style="background-image: url('./img/25-banner.jpg');">
  <div class="section-wrap__inner">

    <header class="section-header">
      <h2 class="section-header__title section-header__title--center">Enjoy every minute you spend in your vehicle. Invest in the best sound system available.</h2>
      <p class="section-header__title section-header__title--big section-header__title--center"><span class="color-primary">239-495-0586</span></p>
    </header>

  </div>
</div>


<?php

get_footer();
?>
