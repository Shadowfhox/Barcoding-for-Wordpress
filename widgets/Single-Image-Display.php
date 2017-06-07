<?php class single_image_display extends WP_Widget {

public function scripts()

{

   wp_enqueue_script( 'media-upload' );

   wp_enqueue_media();

   wp_enqueue_script('mediamanagertrigger', get_template_directory_uri() . '/js/mediamanagertrigger.js', array('jquery'));

}
	
	function __construct() {

    add_action('admin_enqueue_scripts', array($this, 'scripts'));

    parent::__construct( 'single_image_display',   __( 'Single Image Display', 'text_domain' ),  array( 'description' => __( 'Displays a single image,  a content box with title, link and description is displayed when the viewport width is under 1200px, (this according to css provided)', 'text_domain' ), ) 
   );

}

	public function widget( $args, $instance ) {

   $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Default title', 'text_domain' ) : $instance['title'] );
   $image = ! empty( $instance['image'] ) ? $instance['image'] : __( './assets/images/table.jpg', 'text_domain' );
   $artcontent = ! empty( $instance['artcontent'] ) ? $instance['artcontent'] : '';
   $link = ! empty( $instance['link'] ) ? $instance['link'] : '';
   ob_start();

   //echo $args['before_widget'];

   if ( ! empty( $instance['title'] ) ) {

     //echo $args['before_title'] . $title . $args['after_title'];

   }

   ?>

   

      
      <div class="hero product product--interior">
              <div class="compartment">
                <div class="product__details product__details--interior">
                  <h2 class="larger"><?php echo $title; ?></h2>
                  <p><?php echo $artcontent; ?></p><a href="<?php echo $artcontent; ?>" class="button">Learn More</a>
                </div>
              </div><img src="<?php echo $image; ?>" alt="undefined">
      </div>

   <?php

   //echo $args['after_widget'];

   ob_end_flush();

}



	/**

	 * Outputs the options form on admin

	 *

	 * @param array $instance The widget options

	 */

	public function form( $instance ) {

   $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
   $image = ! empty( $instance['image'] ) ? $instance['image'] : __( './assets/images/table.jpg-', 'text_domain' );
   $subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : __( 'Sub title', 'text_domain' );
   $artcontent =  ! empty( $instance['artcontent']  ) ? $instance['artcontent'] :  __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vitae ligula dolor.', 'text_domain' );
   $link = ! empty( $instance['link'] ) ? $instance['link'] : '';

   ?>
   <p>

      <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo  $image ; ?>" />

      <button class="upload_image_button button button-primary">Upload Image</button>

   </p>


<p>Content Box (Displays when viewport width is under 1200)</p>
   <p>

      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

   </p>
   
   
   
   <p>

      <label for="<?php echo $this->get_field_id( 'artcontent' ); ?>"><?php _e( 'Article Content:' ); ?></label>

      <textarea class="widefat" id="<?php echo $this->get_field_id( 'artcontent' ); ?>" name="<?php echo $this->get_field_name( 'artcontent' ); ?>" type="text" value="<?php echo esc_attr( $artcontent ); ?>"><?php echo esc_attr( $artcontent ); ?>
      </textarea> 
   </p>
   <p>

      <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Content Box Link:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>">

   </p>

   <?php

}



	/**

	 * Processing widget options on save

	 *

	 * @param array $new_instance The new options

	 * @param array $old_instance The previous options

	 */

	public function update( $new_instance, $old_instance ) {

   $instance = array();

   $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
   $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';
   $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? $new_instance['link'] : '';
   $instance['artcontent'] = ( ! empty( $new_instance['artcontent'] ) ) ? $new_instance['artcontent'] : '';

 

   return $instance;

}

}





add_action( 'widgets_init', function(){

	register_widget( 'single_image_display' );

});



?>