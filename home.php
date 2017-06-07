<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

	<main class="clear">
      <?php dynamic_sidebar( 'Home: Spotlight' ); ?>  
      <div class="halfway-section">

      <?php dynamic_sidebar( 'Home: Halfway' ); ?>  
      </div>


      
      <div class="grid halfway-section">
        <div class="col-aldnoah-6">
          <div class="callout callout--blue callout--larger hero"><a href="" class="callout__details">
              <h3 class="mini">Blog</h3>
              <h2 class="larger">Walmart Using Drones in Quest to Outperform Amazon</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt urna vitae mauris rutrum interdum. Suspendisse eu lectus a leo tempor rhoncus. Cras lobortis vitae orci vitae finibus Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt urna vitae mauris rutrum interdum. Suspendisse eu lectus a leo tempor rhoncus. Cras lobortis vitae orci vitae finibus</p></a>
              <div class="callout__share">
                <h3 class="mini"><span>Share +</span></h3>
                <nav class="nav nav-social">
                   <?php wp_nav_menu( array('theme_location' => 'socialmedia-menu', 'container' => false , 'items_wrap'  => '<ul id="" class="" >%3$s</ul>','link_after'    => '</span>',           'link_before'     => '<span class="bottle"><svg class="symbol symbol-rating-full"><use xlink:href="#icon-rating-full"></use></svg></span><span class="visible-for-screen-readers">', 'fallback_cb'    => '', ) ); ?>
                </nav>
              </div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero.jpg" alt="undefined">
          </div>
        </div>
        <div class="col-aldnoah-6">
          <div class="grid">
            <div class="col-medium-6">
              <div class="callout callout--orange"><a href="" class="callout__details">
                  <h3 class="mini">Whitepapers</h3>
                  <h2 class="larger">Asset, Patient Tracking Technology Jockeys for Bottom-line Position.</h2></a>
                  <div class="callout__share">
                    <h3 class="mini"><span>Share +</span></h3>
                    <nav class="nav nav-social">
                       <?php wp_nav_menu( array('theme_location' => 'socialmedia-menu', 'container' => false , 'items_wrap'  => '<ul id="" class="" >%3$s</ul>','link_after'    => '</span>',           'link_before'     => '<span class="bottle"><svg class="symbol symbol-rating-full"><use xlink:href="#icon-rating-full"></use></svg></span><span class="visible-for-screen-readers">', 'fallback_cb'    => '', ) ); ?>
                    </nav>
                  </div>
              </div>
            </div>
            <div class="col-medium-6">
              <div class="callout callout--gray"><a href="" class="callout__details">
                  <h3 class="mini">Events</h3>
                  <h2 class="larger">Annual Barcoding, Inc. Executive Forum</h2>
                  <h2 class="larger">9.12.16</h2></a>
                  <div class="callout__share">
                    <h3 class="mini"><span>Share +</span></h3>
                    <nav class="nav nav-social">
                       <?php wp_nav_menu( array('theme_location' => 'socialmedia-menu', 'container' => false , 'items_wrap'  => '<ul id="" class="" >%3$s</ul>','link_after'    => '</span>',           'link_before'     => '<span class="bottle"><svg class="symbol symbol-rating-full"><use xlink:href="#icon-rating-full"></use></svg></span><span class="visible-for-screen-readers">', 'fallback_cb'    => '', ) ); ?>
                    </nav>
                  </div>
              </div>
            </div>
            <div class="col-flush">
              <div class="callout callout--dark-blue callout--featured"><a href="" class="callout__details">
                  <h3 class="mini">Featured Partner</h3>
                  <div class="callout__logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/honeywell-white.png" alt="undefined">
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt urna vitae mauris rutrum interdum. Suspendisse eu lectus a leo tempor rhoncus. Cras lobortis vitae orci vitae finibus</p></a>
                  <div class="callout__share">
                    <h3 class="mini"><span>Share +</span></h3>
                    <nav class="nav nav-social">
                       <?php wp_nav_menu( array('theme_location' => 'socialmedia-menu', 'container' => false , 'items_wrap'  => '<ul id="" class="" >%3$s</ul>','link_after'    => '</span>',           'link_before'     => '<span class="bottle"><svg class="symbol symbol-rating-full"><use xlink:href="#icon-rating-full"></use></svg></span><span class="visible-for-screen-readers">', 'fallback_cb'    => '', ) ); ?>
                    </nav>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="halfway-section">
        <?php dynamic_sidebar( 'Home: Bottom' ); ?>
        <div class="sign-up">
          <div class="compartment">
            <div class="sign-up__bubble">
              <h2>Sign up for our newsletter:</h2>
              <div class="sign-up__form">
                <input type="text" placeholder="Email Address">
                <input type="submit" value="Sign Up" class="button">
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

<?php get_footer(); ?>
