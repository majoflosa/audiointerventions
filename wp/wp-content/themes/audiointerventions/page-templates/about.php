<?php
/**
 * Template Name: About
 */

get_header();
?>

<!-- = = = = = = = = = = = = = = = = = = = = =
  BEGIN HERO
= = = = = = = = = = = = = = = = = = = = = = -->
<?php
  $about_hero_image = audint_get_meta_or_default( get_the_ID(), 'audint_about_hero_image', 'about_hero', 'image' );
  $about_hero_heading = audint_get_meta_or_default( get_the_ID(), 'audint_about_hero_heading', 'about_hero', 'heading' );
  $about_hero_hours = audint_get_meta_or_default( get_the_ID(), 'audint_about_hero_display_hours', 'about_hero', 'display_hours' );
?>
<div class="section-wrap section-wrap--bg-img section-wrap--big bg-overlay" style="background-image: url('<?php echo $about_hero_image; ?>');">
  <div class="section-wrap__inner">

    <header class="section-header">
      <h2 class="section-header__title section-header__title--center section-header__title--big">
        <?php echo $about_hero_heading; ?>
      </h2>
    </header>

  </div>
</div>
<!-- = = = = = = = = = = = = = = = = = = = = =
  BEGIN HOURS BANNER
= = = = = = = = = = = = = = = = = = = = = = -->
<?php if ( $about_hero_hours ) : ?>
<div class="hours-banner">
  <div class="hours-banner__left">
    <strong class="hours-banner__label">Our Hours</strong>
    <div class="hours-banner__days">
      <span class="hours-banner__day">Mon - Fri</span>
      <!-- <span class="hours-banner__day">Tue</span>
      <span class="hours-banner__day">Wed</span>
      <span class="hours-banner__day">Thu</span>
      <span class="hours-banner__day">Fri</span> -->
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
    BEGIN SIMPLE TEXT
  = = = = = = = = = = = = = = = = = = = = = = -->
  <?php
    $body_heading = audint_get_meta_or_default( get_the_ID(), 'audint_about_body_heading', 'about_body', 'heading' );
    $body_content = audint_get_meta_or_default( get_the_ID(), 'audint_about_body_content', 'about_body', 'content' );
    $body_gallery = audint_get_meta_or_default( get_the_ID(), 'audint_about_body_gallery', 'about_body', 'gallery' );
  ?>
  <div class="section-wrap section-wrap--light">
    <div class="section-wrap__inner constraint-lg">

      <div class="text-block">
        <header class="text-block__header">
          <h2 class="text-block__title"><?php echo $body_heading; ?></h2>
        </header>
        <div class="text-block__body">
          <?php echo $body_content; ?>
        </div>
      </div>

    </div>
  </div>





  <!-- = = = = = = = = = = = = = = = = = = = = =
    BEGIN ABOUT GALLERY
  = = = = = = = = = = = = = = = = = = = = = = -->
  <?php if ( $body_gallery ) : ?>
  <div class="about-us-gallery">
    <div class="photo-gallery">
      <div class="photo-gallery__item">
        <a href="#" class="photo-gallery__item-thumb" style="background-image: url('../img/car-stereo.jpg');"></a>
        <div class="photo-gallery__item-overlay">
          <p class="photo-gallery__item-caption">Optional caption goes here.</p>
          <button class="photo-gallery__item-btn">Expand</button>
        </div>
      </div>
      <div class="photo-gallery__item">
        <a href="#" class="photo-gallery__item-thumb" style="background-image: url('../img/jl-audio.jpg');"></a>
        <div class="photo-gallery__item-overlay">
          <p class="photo-gallery__item-caption">Optional caption goes here.</p>
          <button class="photo-gallery__item-btn">Expand</button>
        </div>
      </div>
      <div class="photo-gallery__item">
        <a href="#" class="photo-gallery__item-thumb" style="background-image: url('../img/boat-audio.jpg');"></a>
        <div class="photo-gallery__item-overlay">
          <p class="photo-gallery__item-caption">Optional caption goes here.</p>
          <button class="photo-gallery__item-btn">Expand</button>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>



<!-- = = = = = = = = = = = = = = = = = = = = =
  BEGIN AWARDS SECTION
= = = = = = = = = = = = = = = = = = = = = = -->
<section class="section-wrap section-wrap--gray about-us-awards">
  <div class="section-wrap__inner">

    <header class="section-header">
      <h2 class="section-header__title section-header__title--center">The <span class="color-primary">Best Audio Service</span> and <span class="color-primary">Products</span></h2>
    </header>

    <div class="awards">
      <ul class="awards__list check-list check-list--bg-round">
        <li class="awards__list-item check-list__item">Attention to Detail</li>
        <li class="awards__list-item check-list__item">Craftsmanship</li>
        <li class="awards__list-item check-list__item">Help Comparing and Selecting</li>
        <li class="awards__list-item check-list__item">Complete Consultation</li>
        <li class="awards__list-item check-list__item">High-quality Products</li>
        <li class="awards__list-item check-list__item">Fabrication Equipment</li>
        <li class="awards__list-item check-list__item">Electronic Diagnostic Equipment</li>
      </ul>

      <div class="awards__badges">
        <div class="awards__badge">
          <img src="https://audiointerventions.com/wp-content/uploads/2014/06/poll-2011.gif" alt="">
          <div class="grid-flag" style="background-image: url('../img/grid-flag.svg');"></div>
        </div>
        <div class="awards__badge">
          <img src="https://audiointerventions.com/wp-content/uploads/2014/06/poll-2012.gif" alt="">
          <div class="grid-flag" style="background-image: url('../img/grid-flag.svg');"></div>
        </div>
        <div class="awards__badge">
          <img src="https://audiointerventions.com/wp-content/uploads/2014/06/poll-2013.gif" alt="">
          <div class="grid-flag" style="background-image: url('../img/grid-flag.svg');"></div>
        </div>
        <div class="awards__badge">
          <img src="https://audiointerventions.com/wp-content/uploads/2014/06/bonitas-best.gif" alt="">
          <div class="grid-flag" style="background-image: url('../img/grid-flag.svg');"></div>
        </div>
      </div>
    </div>

  </div>
</section>



<?php

get_footer();
?>
