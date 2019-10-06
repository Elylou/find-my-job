<footer class="site-footer">
<a id="button"></a>

    <div class="site-footer__inner container container--narrow">

      <div class="group">

        <div class="site-footer__col-one">
          <h1 class="school-logo-text school-logo-text--alt-color"><a href="<?php echo site_url() ?>"><strong>Find My Job</strong> 	&#x1F50D; </a></h1>
          <p> <strong>Adresse:</strong> 10 rue de la paix <br> 75000 Paris </p>
          <p> <strong>Téléphone:</strong> 06 00 80 20 50 </p>
          <p> <strong>Email:</strong> contact@findmyjob.co </p>
        </div>

        <div class="site-footer__col-two-three-group">
          <div class="site-footer__col-two">
            <h3 class="headline headline--small">Plan du site</h3>
            <nav class="nav-list">
            <?php
                            	wp_nav_menu( array(
                            		'theme_location' => 'footer-list',
                            		'container_class' => 'class-nav-list' ) );
                            ?>
             <!-- <ul>
                <li><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
                <li><a href="#">Programs</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Campuses</a></li>
              </ul> -->
            </nav>
          </div>
 

          <div class="site-footer__col-three">
            <h3 class="headline headline--small">Mentions légales</h3>
            <nav class="nav-list">

            <?php
                            	wp_nav_menu( array(
                            		'theme_location' => 'privacy',
                            		'container_class' => 'class-nav-list' ) );
                            ?>
            <!--
              <ul>
                <li><a href="#">Legal</a></li>
                <li><a href="<?php echo site_url('/privacy-policy') ?>">Privacy</a></li>
                <li><a href="#">Careers</a></li>
              </ul>-->
            </nav>
          </div>
        </div>

        <div class="site-footer__col-four">
          <h3 class="headline headline--small">Suivez nous !</h3>
          <nav>
            <ul class="min-list social-icons-list group">
              <li><a href="#" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </nav>
        </div>
      </div>

    </div>
  </footer>
  <script>
    function dark() {
        if (document.body.style.backgroundColor == 'rgb(255, 255, 255)') {

                document.body.style.backgroundColor = '#333';
        }
        else {
                document.body.style.backgroundColor = 'rgb(255, 255, 255)';
        }
    }
    </script>

<?php wp_footer(); ?>
</body>
</html>