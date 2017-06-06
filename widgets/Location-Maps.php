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
		$bck_color = empty($instance['bck_color']) ? '' : $instance['bck_color'];
		//echo $before_widget;
		 global $post; 
			
			$args = array(
					'post_type'=> 'post',
					'p' => $instance['selected_post']
				);

			$loop = new WP_Query($args);

			if($loop->have_posts()) : ?>
					<?php while($loop->have_posts()) : 
					$loop->the_post(); ?>


				
					
					
				<div class="col-wooser-6"><iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d12345.090945813037!2d-76.64704685!3d39.32740585!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1470407379214" class="titled-image" width="600" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

                    <h3> <a href="">Barcoding Inc.</a></h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vitae ligula dolor. Praesent semper ipsum eleifend leo fringilla auctor. Nam</p>

                  </div>

				
			<?php endwhile; else : ?>

				<p><?php _e('<h4>No post selected yet </h4>','related_articles'); ?></p>
			
			<?php endif;
		
		//echo $after_widget;
	}	
	
	
/* ------------------------------------------------
	Update Widget
------------------------------------------------ */
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['selected_post'] = ( ! empty( $new_instance['selected_post'] ) ) ? strip_tags( $new_instance['selected_post'] ) : '';
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['thumbnail'] = ( ! empty( $new_instance['thumbnail'] ) ) ? strip_tags( $new_instance['thumbnail'] ) : '';
		$instance['excerpt'] = ( ! empty( $new_instance['excerpt'] ) ) ? strip_tags( $new_instance['excerpt'] ) : '';
		$instance['bck_color'] = $new_instance['bck_color'];
		return $instance;
	}
	
	
/* ------------------------------------------------
	Widget Input Form
------------------------------------------------ */
	 
	function form( $instance ) { 
		$bck_color = $instance['bck_color']; 
		$defaults = array(
		'selected_post' => '0',		
				
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'selected_post' ); ?>"><?php _e('Select your post:', 'related_articles'); ?></label>
			<select style="width: 100%;" id='<?php echo $this->get_field_id( 'selected_post' ); ?>' name="<?php echo $this->get_field_name( 'selected_post' ); ?>" >
				<?php $args=array(
						'post_type' => 'post',
						'posts_per_page' => -1
				);
				$wp_query = new WP_Query($args);
				if($wp_query->have_posts()):
						while($wp_query->have_posts()):$wp_query->the_post();
								?>
								<option value="<?php echo get_the_ID();?>" <?php echo ($instance['selected_post']==get_the_ID())?'selected':''; ?>><?php the_title();?></option>
								<?php
						endwhile;
				endif;?>
			</select>
		</p>

		<select class='widefat' id="<?php echo $this->get_field_id('bck_color'); ?>"
                name="<?php echo $this->get_field_name('bck_color'); ?>" type="text">
          <option value='orange'<?php echo ($bck_color=='orange')?'selected':''; ?>>
            Orange
          </option>
          <option value='blue'<?php echo ($bck_color=='blue')?'selected':''; ?>>
            Blue
          </option> 
          <option value='gray'<?php echo ($bck_color=='gray')?'selected':''; ?>>
            Gray
          </option> 
          <option value='dark-blue'<?php echo ($bck_color=='dark-blue')?'selected':''; ?>>
            Dark Blue
          </option> 
        </select>   
		
	<?php
	}	
	
}

// Add widget function to widgets_init
add_action( 'widgets_init', 'location_maps_init' );

// Register Widget
function location_maps_init() {
	register_widget( 'location_maps' );
}