<?php class custom_quote extends WP_Widget {

	
	function __construct() {

    add_action('admin_enqueue_scripts', array($this, 'scripts'));

    parent::__construct( 'custom_quote',   __( 'Custom Quote', 'text_domain' ),  array( 'description' => __( 'Displays a single quote with an image', 'text_domain' ), ) 
   );

}

	public function widget( $args, $instance ) {

   $quote = ! empty( $instance['quote'] ) ? $instance['quote'] : '';
   $img = ! empty( $instance['img'] ) ? $instance['img'] : '';
   $author = ! empty( $instance['author'] ) ? $instance['author'] : '';
  
   ob_start();

   //echo $args['before_widget'];

   

   ?>

   
     
      <div class="bubble bubble--big bubble--white">
          <div class="compartment">
            <div class="blockquote-bubble clear">
                <figure class="shifted-asset shifted-asset--left"><img src="<? echo $img; ?>" alt="">
                  <figcaption></figcaption>
                </figure>
              <div class="block-out">
                <blockquote>“<? echo $quote; ?>”
                  <cite><? echo $author; ?></cite>
                </blockquote>
              </div>
            </div>
          </div>
        

        
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

   $quote = ! empty( $instance['quote'] ) ? $instance['quote'] : __( 'Whether it’s modifying existing software or buying new hardware, the team at Barcoding, Inc. has my best interest at heart. They’ve learned my business and they’re willing to help me however they can.', 'text_domain' );
   $author = ! empty( $instance['author'] ) ? $instance['author'] : __( 'DONNA BECRAFT, CIO, Dunbar Armored', 'text_domain' );
   $img = ! empty( $instance['img'] ) ? $instance['img'] : __( 'wp-content/themes/barcoding/assets/images/big-circle.jpg', 'text_domain' );
   

   ?>

   <p>

      <label for="<?php echo $this->get_field_id( 'quote' ); ?>"><?php _e( 'Quote:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'quote' ); ?>" name="<?php echo $this->get_field_name( 'quote' ); ?>" type="text" value="<?php echo esc_attr( $quote ); ?>">

   </p>
   <p>

      <label for="<?php echo $this->get_field_id( 'author' ); ?>"><?php _e( 'Author:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'author' ); ?>" name="<?php echo $this->get_field_name( 'author' ); ?>" type="text" value="<?php echo esc_attr( $author ); ?>">

   </p>

   <p>

      <label for="<?php echo $this->get_field_id( 'img' ); ?>"><?php _e( 'BImage:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'img' ); ?>" name="<?php echo $this->get_field_name( 'img' ); ?>" type="text" value="<?php echo esc_attr( $img ); ?>">

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

   $instance['quote'] = ( ! empty( $new_instance['quote'] ) ) ? strip_tags( $new_instance['quote'] ) : '';
   $instance['author'] = ( ! empty( $new_instance['author'] ) ) ? $new_instance['author'] : '';
   $instance['img'] = ( ! empty( $new_instance['img'] ) ) ? $new_instance['img'] : '';
   

 

   return $instance;

}

}





add_action( 'widgets_init', function(){

	register_widget( 'custom_quote' );

});



?>