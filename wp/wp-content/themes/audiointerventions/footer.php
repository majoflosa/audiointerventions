<?php
/**
 * Main site footer
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

<footer class="footer">
    <div class="footer__top">
      <nav class="footer__nav">
        <a class="footer__nav-link">Home</a>
        <a href="./about-us/" class="footer__nav-link">About Us</a>
        <a href="./products" class="footer__nav-link">Products</a>
        <a href="./services/" class="footer__nav-link">Services</a>
        <a href="./photo-gallery/" class="footer__nav-link">Photos</a>
        <a href="./contact-us/" class="footer__nav-link">Contact Us</a>
      </nav>

      <div class="footer__social">
        <?php
          foreach ( $social_links as $social => $url ) :
            if ( $url ) :
        ?>
          <a href="<?php echo $url; ?>" target="_blank" title="Find Audio Interventions on <?php echo $social; ?>" class="footer__social-link">
            <?php get_template_part( 'partials/svg/' . $social ); ?>
          </a>
        <?php
            endif;
          endforeach;
        ?>
      </div>
    </div>

    <div class="footer__middle">
      <div class="footer__widgets">

        <div class="footer__widget footer__widget-logo">
          <h4 class="footer__widget-title">
            <img src="<?php echo $logo; ?>" alt="Audio Interventions Logo">
          </h4>
          <div class="footer__widget-logo-text">
            <p><?php echo bloginfo( 'description' ); ?></p>
            <span class="service">Auto Services - </span>
            <span class="service">Home Services - </span>
            <span class="service">Marine Services</span>
          </div>
        </div>

        <div class="footer__widget footer__widget-contact">
          <h4 class="footer__widget-title">Contact Us</h4>
          <div class="footer__widget-contact-info">
            <p>
              24201 S. Tamiami Trl. suite #1<br>
              Bonita Springs, FL 34134
            </p>
            <p><strong>Phone:</strong> 239-495-0586</p>
            <p><strong>Fax:</strong> 239-390-2150</p>
            <p><strong>Email:</strong> mario@audiointerventions.com</p>
          </div>
        </div>

        <div class="footer__widget footer__widget-hours">
          <h4 class="footer__widget-title">Our Hours</h4>
          <ul class="footer__widget-hours-list">
            <li>
              <span class="day">Monday</span>
              <span class="hours">10:00-6:00</span>
            </li>
            <li>
              <span class="day">Tuesday</span>
              <span class="hours">10:00-6:00</span>
            </li>
            <li>
              <span class="day">Wednesday</span>
              <span class="hours">10:00-6:00</span>
            </li>
            <li class="current">
              <span class="day day">Thursday</span>
              <span class="hours">10:00-6:00</span>
            </li>
            <li>
              <span class="day">Friday</span>
              <span class="hours">10:00-6:00</span>
            </li>
            <li>
              <span class="day">Saturday</span>
              <span class="hours">9:00-3:00</span>
            </li>
            <li>
              <span class="day">Sunday</span>
              <span class="hours">Closed</span>
            </li>
          </ul>
        </div>

        <div class="footer__widget footer__widget-facebook">
          <h4 class="footer__widget-title">Facebook</h4>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=317322608312190";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
          <div class="fb-like-box fb_iframe_widget" data-href="https://www.facebook.com/pages/Audio-Interventions/249577625626?sk=timeline&amp;ref=page_internal" data-width="268" data-show-faces="true" data-colorscheme="dark" data-stream="false" data-border-color="#000000" data-header="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=317322608312190&amp;color_scheme=dark&amp;container_width=270&amp;header=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FAudio-Interventions%2F249577625626%3Fsk%3Dtimeline%26ref%3Dpage_internal&amp;locale=en_US&amp;sdk=joey&amp;show_faces=true&amp;stream=false&amp;width=268"><span style="vertical-align: bottom; width: 268px; height: 130px;"><iframe name="f39d10da6a2d384" width="268px" height="1000px" data-testid="fb:like_box Facebook Social Plugin" title="fb:like_box Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/plugins/like_box.php?app_id=317322608312190&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df821dfabe080cc%26domain%3Daudiointerventions.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Faudiointerventions.com%252Ff3e827555f75d2c%26relation%3Dparent.parent&amp;color_scheme=dark&amp;container_width=270&amp;header=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FAudio-Interventions%2F249577625626%3Fsk%3Dtimeline%26ref%3Dpage_internal&amp;locale=en_US&amp;sdk=joey&amp;show_faces=true&amp;stream=false&amp;width=268" style="border: none; visibility: visible; width: 268px; height: 130px;" class=""></iframe></span></div>
        </div>

      </div>
    </div>

    <div class="footer__bottom">
      <div class="footer__left">
        <span>&copy; Copyright <?php echo date( 'Y', time() ); ?></span>
      </div>
      <div class="footer__right">
        <span>Audio Interventions. All rights reserved.</span>
      </div>
    </div>
  </footer>

<?php wp_footer(); ?>
</body>
</html>