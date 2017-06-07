<div class="col-large-4 col-wooser-3 nav-tier-bubble">

          <nav class="nav nav-tier">



          <?php /* wp_nav_menu( array('theme_location' => 'sidebar-menu','container' => false ,'items_wrap'  => '<ul id="" class="" >%3$s</ul>', 'fallback_cb'    => '',) ); */?>

          <?php wp_nav_menu( array('theme_location' => 'sidebar-menu','menu_id' => 'menu-top-items',	'menu_class' => 'menu-top-items','link_after' => '<span class="screen-reader-text">', 'link_before'=> '<svg class="symbol symbol-none"><use xlink:href="#icon-none"></use></svg><span>','fallback_cb' => '',) );?>

          </nav>

        </div>