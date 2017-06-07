<?php /* Template Name: Solutions */ ?>

<?php get_header(); ?>

    <main class="clear">

      <div class="grid">

         <?php get_sidebar(); ?>

        <div class="col-large-8 col-wooser-9">

          <div class="main-content">

              <div class="hero hero--mask hero--default">

                <div class="compartment">

                  <h1 class="hero__title">Solutions</h1>

                </div><img src="<?php echo get_template_directory_uri(); ?>/assets/images/interior.jpg" alt="undefined">

              </div>

            <div class="section">

              <div class="compartment">

                <div class="nav-tier-container">

                  <button class="nav-tier-switch"> <span>Page Menu</span>

                      <svg class="symbol symbol-chevron-down">

                        <use xlink:href="#chevron-down"></use>

                      </svg>

                  </button>

                  <nav class="nav nav-tier nav-tier--clone">

                   <?php wp_nav_menu( array('theme_location' => 'sidebar-menu','container' => false ,'items_wrap'  => '<ul id="" class="" >%3$s</ul>', 'fallback_cb'    => '',) ); ?>

                  </nav>

                </div>
    
<?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> 

                <p class="lead-in"><?php the_content(); ?> </p>
                <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>

                <div class="silk-harmonica silk-harmonica--expanded silk-harmonica--solutions">

                  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Solutions: Post Showcase') ) : ?>

                  <?php endif; ?>

                </div>
                

                <div class="flag">
                  <h3>You Might Also Like...</h3>
                </div>

                <div class="grid">
                  <?php dynamic_sidebar( 'Solutions: Related Posts Bar' ); ?>
                </div>        

              </div>

            </div>

          </div>

        </div>

      </div>

    </main>  

  <?php get_footer(); ?>

