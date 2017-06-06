<?php
/** Widget based on Single Post Widget By LibraFire https://rhg.wordpress.org/plugins/single-post-sidebar-widget/ */


class resource_search extends WP_Widget {


/* ------------------------------------------------
	Widget Setup
------------------------------------------------ */

     function __construct() {
	 parent::__construct( 'resource_search',   __( 'Search Form for Resources Page', 'text_domain' ),  array( 'description' => __( 'Related Articles Showcase for different Barcoding Pages', 'text_domain' ), ) 
   );
	}

/* ------------------------------------------------
	Display Widget
------------------------------------------------ */
	
	function widget( $args, $instance ) {
		
		$bck_color = empty($instance['bck_color']) ? '' : $instance['bck_color'];
		//echo $before_widget;
		 ?>


				
					
					
				

<div class="filter">
<form method="get" id="advanced-searchform" role="search" action="">

                  <div class="grid grid--20 filter__tools">

                    <div class="col-aldnoah-6">

                        <div class="input-field">
                         <input type="hidden" name="search" value="advanced">

                          <input type="text" placeholder="Search By Keyword">

                          <div class="input-hint input-hint--submit">

                          <input type="submit" id="searchsubmit" class="input-hint__field"/>

                           

                          </div>

                        </div>

                    </div>

                    <div class="col-small-6 col-aldnoah-3">

                        <div class="input-field">

                          <select>

                            <option value="By Industry">By Industry</option>

                            <option value="By Industry">By Industry</option>

                          </select><span class="input-hint input-hint--select"></span>

                        </div>

                    </div>

                    <div class="col-small-6 col-aldnoah-3">

                        <div class="input-field">

                          <select>

                            <option value="By Technology">By Technology</option>

                            <option value="By Technology">By Technology</option>

                          </select><span class="input-hint input-hint--select"></span>

                        </div>

                    </div>

                  </div></form>

                  



                </div>




    

   
   

    
    

    


				
			<?

			$_name = $_GET['name'] != '' ? $_GET['name'] : '';
$_model = $_GET['model'] != '' ? $_GET['model'] : '';

// Start the Query
$v_args = array(
        'post_type'     =>  'vehicle', // your CPT
        's'             =>  $_name, // looks into everything with the keyword from your 'name field'
        'meta_query'    =>  array(
                                array(
                                    'key'     => 'car_model', // assumed your meta_key is 'car_model'
                                    'value'   => $_model,
                                    'compare' => 'LIKE', // finds models that matches 'model' from the select field
                                ),
                            )
    );
$vehicleSearchQuery = new WP_Query( $v_args );

// Open this line to Debug what's query WP has just run
// var_dump($vehicleSearchQuery->request);

// Show the results
if( $vehicleSearchQuery->have_posts() ) :
    while( $vehicleSearchQuery->have_posts() ) : $vehicleSearchQuery->the_post();
        the_title(); // Assumed your cars' names are stored as a CPT post title
    endwhile;
else :
    _e( '<div class="filter__extras">

                    <p class="filter__result"> <em>13 of 300 results found for: <a href="">Health Care</a></em></p><a href="" class="filter__reset">

                        <svg class="symbol symbol-times">

                          <use xlink:href="#times"></use>

                        </svg><span>Reset Filter</span></a>

                  </div>', 'textdomain' );
endif;
wp_reset_postdata();
		//echo $after_widget;
	}	
	
	
/* ------------------------------------------------
	Update Widget
------------------------------------------------ */
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
		$instance['bck_color'] = $new_instance['bck_color'];
		return $instance;
	}
	
	
/* ------------------------------------------------
	Widget Input Form
------------------------------------------------ */
	 
	function form( $instance ) { 
		$bck_color = $instance['bck_color']; 
		
	 ?>
		

		
		
	<?php
	}	
	
}

// Add widget function to widgets_init
add_action( 'widgets_init', 'resource_search_init' );

// Register Widget
function resource_search_init() {
	register_widget( 'resource_search' );
}