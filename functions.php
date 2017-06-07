<?php function register_my_menus(){

	register_nav_menus(
		array(
			'top-menu' => __('Top Menu'),
			'main-menu' => __('Main Menu'),
			'sidebar-menu' => __('Sidebar Menu'),
			'footl-menu' => __('Footer Left Menu'),
			'footr-menu' => __('Footer Right Menu'),
			'footc-menu' => __('Footer Legal Menu'),
			'socialmedia-menu' => __('Social Media Menu'),
			'ourpartners-menu' => __('Our Partners Menu'),
		)
	);
}
add_action('init', 'register_my_menus');

/**  * Display SVG icons in menus with matching items. **/

function svg_social_menu_icons( $item_output, $item, $depth, $args ) {

// Supported svg icons for designated , more icons can be added through the svg file then to this list 

	$svg_icons = apply_filters( 'svg_social_menu_supported_icons', array(

	/* social media icons for socialmedia-menu and sharing option on widgets*/
		'Pinterest' => 'pinterest',
		'Google' => 'google',
		'Linkedin' => 'linkedin',
		'Twitter' => 'twitter',
		'Facebook' => 'facebook',

	/* nav  icons for top-menu*/
		'Barcode' => 'barcode',
		'Client Login' => 'user',
		'Shop' => 'cart',
		'Contact' => 'plane',

	/* aditional icons  */
		'Back to parentPage' => 'arrow-left',

	) );

// Change SVG icon inside menu links menu there is supported title.

	if ( 'top-menu' == $args->theme_location || 'sidebar-menu' == $args->theme_location ) {
		foreach ( $svg_icons as $attr => $value ) {
			if ( false !== strpos( $item->title, $attr ) ) {
				$item_output = str_replace( $args->link_before, '<svg class="symbol symbol-' . esc_attr( $value ) . '"><use xlink:href="#' . esc_attr( $value ) . '"></use></svg>', $item_output );
			}
		}
	}

	if ( 'socialmedia-menu' == $args->theme_location ) {
		foreach ( $svg_icons as $attr => $value ) {
			if ( false !== strpos( $item->title, $attr ) ) {
				$item_output = str_replace( $args->link_before, '<span class="bottle"><svg class="symbol symbol-' . esc_attr( $value ) . '"><use xlink:href="#' . esc_attr( $value ) . '"></use></svg></span><span class="visible-for-screen-readers">', $item_output );
			}
		}
	}
	if ( 'sidebar-menu' == $args->theme_location ) {
		foreach ( $svg_icons as $attr => $value ) {
			if ( false !== strpos( $item->title, $attr ) ) {
				$item_output = str_replace( $args->link_before, '<span class="bottle"><svg class="symbol symbol-' . esc_attr( $value ) . '"><use xlink:href="#' . esc_attr( $value ) . '"></use></svg></span><span class="visible-for-screen-readers">', $item_output );
			}
		}
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'svg_social_menu_icons', 10, 4 );



/* Custom  logo */
function theme_prefix_setup() {
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
	) );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );


/* Custom  header  */

add_theme_support( 'custom-header' );
	$defaults = array(
		'default-image'          => '',
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => false,
		'flex-width'             => false,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => true,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );


/*Support svg images */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

/* Add arrow icon to sidebar menu first child 

function add_specific_menu_location_atts( $atts, $item, $args ) {

    // check if the item is in the primary menu
    if( $args->theme_location == 'sidebar-menu' ) {
     $menu_items = array(106);
	if (in_array($item->ID, $menu_items)) {
	   $atts['class'] = 'prueba';
	}
    }
    return $atts;
}  

add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );

*/

/* Sidebar Menu : Show only sublevels of menu item 
class my_extended_walker extends Walker_Nav_Menu {

  function start_lvl(&$output, $depth, $args ) {
	   if (0 !== $depth) {
      parent::start_lvl($output, $depth, $args);
	}
  }
  function end_lvl(&$output, $depth, $args) {
    if (0 !== $depth) {
     parent::end_lvl($output, $depth, $args);
    }
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    if (0 !== $depth) {
    parent::start_el($output, $item, $depth, $args, $id);
    }
	 }
  function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    if (0 !== $depth) {
      parent::end_el($output, $item, $depth, $args, $id);
   }
  }
}
*/

/* Register Sidebar/Positions for Widgets*/

if ( function_exists('register_sidebar') ){
	/* Home Page  horizontal sidebar 1: Shows About Us Content*/
	register_sidebar(array( 
		'name' => 'Home: Spotlight',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<!--',
		'after_title' => '-->',  
	));

/* HomE Page  horizontal sidebar 2: Shows About Us Content*/
	register_sidebar(array( 
		'name' => 'Home: Halfway',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<!--',
		'after_title' => '-->',  
	));


/* Home Page  horizontal sidebar 3: Shows About Us Content*/
	register_sidebar(array( 
		'name' => 'Home: Bottom',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<!--',
		'after_title' => '-->',  
	));	



	/* Solutions Page  horizontal sidebar 1: Shows Posts Showcase*/
	register_sidebar(array( 	

		'name' => 'Solutions: Post Showcase',		
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>' 
	));

	/* Solutions Page  horizontal sidebar 2: Shows Related Posts Block Widgets*/
	register_sidebar(array( 
		'name' => 'Solutions: Related Posts Bar',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'  
	));

	/* Business Areas Page  horizontal sidebar 1: Shows Category Posts Menu*/
	register_sidebar(array( 
		'name' => 'Business: Category Menu Display',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<!--',
		'after_title' => '-->',  
	));

	/* Business Areas Page  horizontal sidebar 2: Shows Related Posts Block Widgets*/
	register_sidebar(array( 
		'name' => 'Business: Related Posts Bar',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<!--',
		'after_title' => '-->',  
	));

	/* Resources Areas Page  horizontal sidebar 2: Shows Related Posts Block Widgets*/
	register_sidebar(array( 
		'name' => 'Resources: Related Posts Bar',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<!--',
		'after_title' => '-->',  
	));

	/* Resources Areas Page  horizontal sidebar 2: Shows Related Posts Block Widgets*/
	register_sidebar(array( 
		'name' => 'Resources: Banner',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<!--',
		'after_title' => '-->',  
	));

	/* About Us Page  horizontal sidebar 1: Shows About Us Content*/
	register_sidebar(array( 
		'name' => 'About Us: Banner Content',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<!--',
		'after_title' => '-->',  
	));

	/* About Us Page  horizontal sidebar 2: Shows About Us Content*/
	register_sidebar(array( 
		'name' => 'About Us: Location Content',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<!--',
		'after_title' => '-->',  
	));

	/* About Us Page  horizontal sidebar 3: Shows About Us Content*/
	register_sidebar(array( 
		'name' => 'About Us: Bottom 1 Content',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<!--',
		'after_title' => '-->',  
	));
	/* About Us Page  horizontal sidebar 4: Shows About Us Content*/
	register_sidebar(array( 
		'name' => 'About Us: Bottom 2 Content',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<!--',
		'after_title' => '-->',  
	));

	
}

remove_filter( 'the_content', 'wpautop' );

/* Require Widget Files */

require('widgets/Solutions-Showcase.php');
require('widgets/Related-Articles.php');
require('widgets/Category-Menu.php');
require('widgets/Resource-Search.php');
require('widgets/Location-Maps.php');
require('widgets/Partners-Menu.php');
require('widgets/Home-Spotlight.php');
require('widgets/Home-Slide.php');
require('widgets/Partners-Logos.php');
require('widgets/Single-Image-Display.php');
require('widgets/Custom-Button.php');
require('widgets/Custom-Quote.php');
require('widgets/Social-Feed.php');