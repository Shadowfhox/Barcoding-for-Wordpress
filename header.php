<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Barcoding</title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800|Oswald:400,700" rel="stylesheet">
    <?php wp_head();?>
  </head>

  <body>
    <div style="display: none;" class="sprite">
    <?php 
    	// Import svg icons.
	   get_template_part( 'svg-icons' );
    ?>
    </div>
		<header class="site__header">
      <nav class="nav nav-quick nav-quick--clone" role="navigation" aria-label="Top Menu">
		    <?php wp_nav_menu( array('theme_location' => 'top-menu','menu_id' => 'menu-top-items',	'menu_class' => 'menu-top-items','link_after' => '<span class="screen-reader-text">', 'link_before'=> '<svg class="symbol symbol-rating-full"><use xlink:href="#icon-rating-full"></use></svg><span>','fallback_cb' => '',) );?>       
      </nav>

      <div class="scarf clear"><a href="" class="site__logo">Barcoding</a>
        <button aria-hidden="true" class="drawer__trigger">Menu</button>
        <div class="silk-nav drawer">
          <div class="site-search">
            <div class="site-search__trigger">
              <div class="vertically-center">
                  <svg class="symbol symbol-search">
                    <use xlink:href="#search"></use>
                  </svg>
              </div>
            </div>
            <div class="site-search__details">
              <label for="site-search__text" class="visible-for-screen-readers">Search this site for:</label>
              <input placeholder="Search by keyword…" type="text" id="site-search__text" name="site-search__text" class="site-search__text">
              <input type="submit" value="go" aria-label="Query search" class="site-search__submit">
            </div>
          </div>
          <div class="silk-nav__controls"><a href="/" class="silk-nav__trigger silk-nav__trigger--home">
                <svg class="symbol symbol-home">
                  <use xlink:href="#home"></use>
                </svg><span>Home</span></a>
            <button class="silk-nav__trigger silk-nav__trigger--revert">
                <svg class="symbol symbol-undo">
                  <use xlink:href="#undo"></use>
                </svg><span>Main Menu</span>
            </button>
            <button class="silk-nav__trigger silk-nav__trigger--reverse">
                <svg class="symbol symbol-chevron-left">
                  <use xlink:href="#chevron-left"></use>
                </svg>
            </button>
          </div>
          <nav class="nav nav-main">
              <?php wp_nav_menu( array('theme_location' => 'main-menu','container' => false ,'items_wrap'  => '<ul id="" class="" >%3$s</ul>' ) ); ?>
          </nav>
          <nav class="nav nav-quick">
            <?php wp_nav_menu( array('theme_location' => 'top-menu', 'container' => false , 'items_wrap'  => '<ul id="" class="" >%3$s</ul>','link_after'    => '<span class="screen-reader-text">',						'link_before'     => '<svg class="symbol symbol-rating-full"><use xlink:href="#icon-rating-full"></use></svg><span>', 'fallback_cb'    => '', ) ); ?>
          </nav>
        </div>
      </div>
    </header>
	<div class="container">

		