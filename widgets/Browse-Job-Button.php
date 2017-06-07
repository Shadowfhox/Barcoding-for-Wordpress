<?php class browse_job_buttom extends WP_Widget {

	
	function __construct() {

    add_action('admin_enqueue_scripts', array($this, 'scripts'));

    parent::__construct( 'browse_job_buttom',   __( 'Browse Job Button', 'text_domain' ),  array( 'description' => __( 'Displays a single post with an image', 'text_domain' ), ) 
   );

}

	public function widget( $args, $instance ) {

   $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Default title', 'text_domain' ) : $instance['title'] );
   $button = ! empty( $instance['button'] ) ? $instance['button'] : '';
   $link = ! empty( $instance['link'] ) ? $instance['link'] : '';
  
   ob_start();

   //echo $args['before_widget'];

   

   ?>

   
      
      <div class="callout--extreme">
              <h1><? echo $title; ?></h1><a href="<? echo $link; ?>" class="button"><? echo $button; ?></a>
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

   $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Description', 'text_domain' );
   $button = ! empty( $instance['button'] ) ? $instance['button'] : '';
   $link = ! empty( $instance['link'] ) ? $instance['link'] : '';
   

   ?>

   <p>

      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Description:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

   </p>
   <p>

      <label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e( 'Button Text:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'button' ); ?>" name="<?php echo $this->get_field_name( 'button' ); ?>" type="text" value="<?php echo esc_attr( $button ); ?>">

   </p>

   <p>

      <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Button Link:' ); ?></label>

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
   $instance['button'] = ( ! empty( $new_instance['button'] ) ) ? $new_instance['button'] : '';
   $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? $new_instance['link'] : '';
   

 

   return $instance;

}

}





add_action( 'widgets_init', function(){

	register_widget( 'browse_job_buttom' );

});



?>