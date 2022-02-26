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
          foreach ($words as $word) :
            if ( in_array( $words_index, $hero_colored_words_arr, false ) ) :
          ?>
            <span class="color-primary"><?php echo $word . ' '; ?></span>
          <?php else :
            echo $word . ' ';
          ?>
          <?php
            endif;
            $words_index++;
          endforeach;
        ?>
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
<section class="section-wrap section-wrap--full-width why-us-section">
  <div class="section-wrap__inner">

    <header class="section-header">
      <h2 class="section-header__title section-header__title--center section-header__title--big">Why Audio Interventions</h2>
    </header>

    <article class="feature-callout">
      <div class="feature-callout__content">
        <div class="feature-callout__content-inner">
          <header class="feature-callout__header">
            <h2 class="feature-callout__title type-title-2 color-lightest">Work Directly <span class="color-primary">with Experts</span></h2>
          </header>
          <main class="feature-callout__body type-body-2 color-light">
            <p>From a personal consultation to knowledgeable advice, we will give you the attention to detail that you deserve.</p>
            <p>Every element of your car's audio system, including the stereo, CD player, subwoofer and amplifiers will be just what you imagined. It will be installed precisely with fabricated elements if needed.</p>
          </main>
          <footer class="feature-callout__footer">
            <a href="#" class="feature-callout__cta-btn">Our Services »</a>
          </footer>
        </div>
        <div class="grid-flag" style="background-image: url('./img/grid-flag.svg');"></div>
      </div>
      <div class="feature-callout__image" style="background-image: url('./img/car-stereo.jpg');"></div>
    </article>
    
    <article class="feature-callout feature-callout--reverse feature-callout--light">
      <div class="feature-callout__content">
        <div class="feature-callout__content-inner">
          <header class="feature-callout__header">
            <h2 class="feature-callout__title type-title-2 color-darkest">Get Only <span class="color-primary">Top Brand Equipment</span></h2>
          </header>
          <main class="feature-callout__body type-body-2 color-dark">
            <p>We offer top brand names like JL Audio, Focal and Dynaudio products are offered at competitive prices for both products and installation.</p>
            <p>You'll feel confident leaving your car in our capable hands when you see our top-notch facilities and our high-quality completed work.</p>
          </main>
          <footer class="feature-callout__footer">
            <a href="#" class="feature-callout__cta-btn">Our Products »</a>
          </footer>
        </div>
        <div class="grid-flag" style="background-image: url('./img/grid-flag.svg');"></div>
      </div>
      <div class="feature-callout__image" style="background-image: url('./img/jl-audio.jpg');"></div>
    </article>

    <article class="feature-callout">
      <div class="feature-callout__content">
        <div class="feature-callout__content-inner">
          <header class="feature-callout__header">
            <h2 class="feature-callout__title type-title-2 color-lightest"><span class="color-primary">Expert</span> Facilities And Technicians</h2>
          </header>
          <main class="feature-callout__body type-body-2 color-light">
            <p>Tour our facility, which houses a cabinet-grade woodworking facility, composite fabrication equipment and electronic diagnostics.</p>
            <p>We can fabricate custom paneling and mounting brackets, integrate them into your factory wiring and even create factory-like wiring harnesses so that your factory wiring remains true to its original design.</p>
          </main>
          <footer class="feature-callout__footer">
            <a href="#" class="feature-callout__cta-btn">Learn More About Us »</a>
          </footer>
        </div>
        <div class="grid-flag" style="background-image: url('./img/grid-flag.svg');"></div>
      </div>
      <div class="feature-callout__image" style="background-image: url('./img/boat-audio.jpg');"></div>
    </article>

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
