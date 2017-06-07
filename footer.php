</div> 
  <footer class="site__footer">
    <div class="lace clear"><a href="" class="site__logo">  
    <?php function theme_prefix_the_custom_logo() {
    	if ( function_exists( 'the_custom_logo' ) ) {
		    the_custom_logo();
	     }
    } ?> Barcoding</a>

    <nav class="nav nav-social">
      <?php wp_nav_menu( array('theme_location' => 'socialmedia-menu', 'container' => false , 'items_wrap'  => '<ul id="" class="" >%3$s</ul>','link_after'    => '</span>',						'link_before'     => '<span class="bottle"><svg class="symbol symbol-rating-full"><use xlink:href="#icon-rating-full"></use></svg></span><span class="visible-for-screen-readers">', 'fallback_cb'    => '', ) ); ?>
    </div>
    <div class="sole clear">
      <div class="tread">
          <nav class="nav nav-secondary-main">
            <?php wp_nav_menu( array('theme_location' => 'main-menu','container' => false ,'items_wrap'  => '<ul id="" class="" >%3$s</ul>' ) ); ?>
          </nav>
      </div>
      <div class="tread">
          <nav class="nav nav-bulleted nav-action">
            <?php wp_nav_menu( array('theme_location' => 'footr-menu','container' => false ,'items_wrap'  => '<ul id="" class="" >%3$s</ul>' ) ); ?>
            </nav>
          <nav class="nav nav-bulleted nav-legal">
            <?php wp_nav_menu( array('theme_location' => 'footc-menu','container' => false ,'items_wrap'  => '<ul id="" class="" >%3$s</ul>' ) ); ?>              
          </nav>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/build/main.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/build/site.js"></script>
</body>
</html>