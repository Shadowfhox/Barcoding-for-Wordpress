<?php
/** Widget based on Single Post Widget By LibraFire https://rhg.wordpress.org/plugins/single-post-sidebar-widget/ */


class partner_logo extends WP_Widget {


/* ------------------------------------------------
	Widget Setup
------------------------------------------------ */

     function __construct() {
	 parent::__construct( 'partner_logo',   __( 'Home Partners Logo Display', 'text_domain' ),  array( 'description' => __( 'Display Images or Logos', 'text_domain' ), ) 
   );
	}

/* ------------------------------------------------
	Display Widget
------------------------------------------------ */
	
	function widget( $args, $instance ) {
		extract( $args );
		$desc = empty($instance['desc']) ? '' : $instance['desc'];
		$img1 = empty($instance['img1']) ? '' : $instance['img1'];
		$img2 = empty($instance['img2']) ? '' : $instance['img2'];
		$img3 = empty($instance['img3']) ? '' : $instance['img3'];
		$img4 = empty($instance['img4']) ? '' : $instance['img4'];
		$img5 = empty($instance['img5']) ? '' : $instance['img5'];
		//echo $before_widget;
		 ?>


				
					
					
		<ul class="partners">
          <li class="partners__title">
            <h2 class="stay"><?php echo $desc; ?></h2>
          </li>
          <li class="partners__item"><a href=""><img src="<?php echo $img1; ?>" alt="undefined"></a></li>
          <li class="partners__item"><a href=""><img src="<?php echo $img2; ?>" alt="undefined"></a></li>
          <li class="partners__item"><a href=""><img src="<?php echo $img3; ?>" alt="undefined"></a></li>
          <li class="partners__item"><a href=""><img src="<?php echo $img4; ?>" alt="undefined"></a></li>
          <li class="partners__item"><a href=""><img src="<?php echo $img5; ?>" alt="undefined"></a></li>
        </ul>

				
			<?php 
		
		//echo $after_widget;
	}	
	
	
/* ------------------------------------------------
	Update Widget
------------------------------------------------ */
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
		$instance['img1'] = $new_instance['img1'];
		$instance['img2'] = $new_instance['img2'];
		$instance['img3'] = $new_instance['img3'];
		$instance['img4'] = $new_instance['img4'];
		$instance['img5'] = $new_instance['img5'];
		return $instance;
	}
	
	
/* ------------------------------------------------
	Widget Input Form
------------------------------------------------ */
	 
	function form( $instance ) { 
		$desc = $instance['desc']; 
		$img1 = $instance['img1']; 
		$img2 = $instance['img2'];
		$img3 = $instance['img3'];
		$img4 = $instance['img4'];
		$img5 = $instance['img5'];
		?>
	<h1>Title</h1>
<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e( 'Title or Description:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" type="text" value="<?php echo  $desc ; ?>" />
		<hr>
   <h1>Logo 1</h1>

	<p>
      
      <label for="<?php echo $this->get_field_id( 'img1' ); ?>"><?php _e( 'Image:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'img1' ); ?>" name="<?php echo $this->get_field_name( 'img1' ); ?>" type="text" value="<?php echo  $img1 ; ?>" />

      <button class="upload_image_button button button-primary">Upload Image</button>

   </p>
<hr>
   <h1>Logo 2</h1> 
   <p>
      
      <label for="<?php echo $this->get_field_id( 'img2' ); ?>"><?php _e( 'Image:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'img2' ); ?>" name="<?php echo $this->get_field_name( 'img2' ); ?>" type="text" value="<?php echo  $img2 ; ?>" />

      <button class="upload_image_button button button-primary">Upload Image</button>

   </p>
   <hr>
   <h1>Logo 3</h1> 
   <p>
      
      <label for="<?php echo $this->get_field_id( 'img3' ); ?>"><?php _e( 'Image:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'img3' ); ?>" name="<?php echo $this->get_field_name( 'img3' ); ?>" type="text" value="<?php echo  $img3 ; ?>" />

      <button class="upload_image_button button button-primary">Upload Image</button>

   </p>
   <hr>
   <h1>Logo 4</h1> 
   <p>
      
      <label for="<?php echo $this->get_field_id( 'img4' ); ?>"><?php _e( 'Image:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'img4' ); ?>" name="<?php echo $this->get_field_name( 'img4' ); ?>" type="text" value="<?php echo  $img4 ; ?>" />

      <button class="upload_image_button button button-primary">Upload Image</button>

   </p>
   <hr>
   <h1>Logo 5</h1> 
   <p>
      
      <label for="<?php echo $this->get_field_id( 'img5' ); ?>"><?php _e( 'Image:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'img1' ); ?>" name="<?php echo $this->get_field_name( 'img5' ); ?>" type="text" value="<?php echo  $img5 ; ?>" />

      <button class="upload_image_button button button-primary">Upload Image</button>

   </p>
		
	<?php
	}	
	
}

// Add widget function to widgets_init
add_action( 'widgets_init', 'partner_logo_init' );

// Register Widget
function partner_logo_init() {
	register_widget( 'partner_logo' );
}