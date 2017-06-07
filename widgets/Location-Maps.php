<?php
/** Widget based on Single Post Widget By LibraFire https://rhg.wordpress.org/plugins/single-post-sidebar-widget/ */


class location_maps extends WP_Widget {


/* ------------------------------------------------
	Widget Setup
------------------------------------------------ */

     function __construct() {
	 parent::__construct( 'location_maps',   __( 'Location Maps', 'text_domain' ),  array( 'description' => __( 'Display Maps and location description for the About us Page', 'text_domain' ), ) 
   );
	}

/* ------------------------------------------------
	Display Widget
------------------------------------------------ */
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = empty($instance['title']) ? '' : $instance['title'];
		$desc = empty($instance['desc']) ? '' : $instance['desc'];
		$mapsrc = empty($instance['mapsrc']) ? '' : $instance['mapsrc'];
		//echo $before_widget;
		 ?>		
					
					
				<div class="col-wooser-6"><iframe src="<?php echo $mapsrc; ?>" class="titled-image" width="600" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

                    <h3> <a href=""><?php echo $title; ?></a></h3>

                    <p><?php echo $desc ; ?></p>

                  </div>			
			
			<?php 
		
		//echo $after_widget;
	}	
	
	
/* ------------------------------------------------
	Update Widget
------------------------------------------------ */
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
		$instance['mapsrc'] = ( ! empty( $new_instance['mapsrc'] ) ) ? strip_tags( $new_instance['mapsrc'] ) : '';
		return $instance;
	}
	
	
/* ------------------------------------------------
	Widget Input Form
------------------------------------------------ */
	 
	function form( $instance ) { 
		$title = $instance['title'];
		$desc = $instance['desc'];
		$mapsrc = $instance['mapsrc'];
		
		 ?>
		

		<p>

      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title ; ?>">

   </p>
   
   
      
   <p>

      <label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e( 'Location Description:' ); ?></label>

      <textarea class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" type="text" value="<?php echo $desc ; ?>"><?php echo esc_attr( $desc ); ?>
      </textarea> 
   </p> 

   <p>

      <label for="<?php echo $this->get_field_id( 'mapsrc' ); ?>"><?php _e( 'Map Iframe Link:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'mapsrc' ); ?>" name="<?php echo $this->get_field_name( 'mapsrc' ); ?>" type="text" value="<?php echo esc_attr( $mapsrc ); ?>">

   </p>
		
	<?php
	}	
	
}

// Add widget function to widgets_init
add_action( 'widgets_init', 'location_maps_init' );

// Register Widget
function location_maps_init() {
	register_widget( 'location_maps' );
}