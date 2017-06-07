<?php class home_spotlight extends WP_Widget {

public function scripts()

{

   wp_enqueue_script( 'media-upload' );

   wp_enqueue_media();

   wp_enqueue_script('mediamanagertrigger', get_template_directory_uri() . '/js/mediamanagertrigger.js', array('jquery'));

}
	
	function __construct() {

    add_action('admin_enqueue_scripts', array($this, 'scripts'));

    parent::__construct( 'home_spotlight',   __( 'Home Spotlight', 'text_domain' ),  array( 'description' => __( '', 'text_domain' ), ) 
   );

}

	public function widget( $args, $instance ) {

   $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Default title', 'text_domain' ) : $instance['title'] );
   $image = ! empty( $instance['image'] ) ? $instance['image'] : __( './assets/images/hero.jpg', 'text_domain' );
   $artcontent = ! empty( $instance['artcontent'] ) ? $instance['artcontent'] : '';
   $button1 = ! empty( $instance['button1'] ) ? $instance['button1'] : '';
   $button2 = ! empty( $instance['button2'] ) ? $instance['button2'] : '';
   $button3 = ! empty( $instance['button3'] ) ? $instance['button3'] : '';
   $link1 = ! empty( $instance['link1'] ) ? $instance['link1'] : '';
   $link2 = ! empty( $instance['link1'] ) ? $instance['link1'] : '';
   $link3 = ! empty( $instance['link1'] ) ? $instance['link1'] : '';
   ob_start();

   //echo $args['before_widget'];

   if ( ! empty( $instance['title'] ) ) {

     //echo $args['before_title'] . $title . $args['after_title'];

   }

   ?>

   

      <div class="video-bubble hero halfway-section">
        <div class="compartment">
          <div class="video__details">
            <h1 class="larger"><?php echo $title; ?></h1>
            <p><?php echo $artcontent; ?></p><a href="<?php echo $link1; ?>" class="button button--inverse full-width"><?php echo $button1; ?></a><a href="<?php echo $link2; ?>" class="button button--inverse full-width"><?php echo $button2; ?></a><a href="<?php echo $link3; ?>" class="button button--inverse full-width"><?php echo $button3; ?></a>
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

   $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Capture a Stronger Supply Chain.', 'text_domain' );
   $image = ! empty( $instance['image'] ) ? $instance['image'] : __( './assets/images/hero.jpg', 'text_domain' );
   $subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : __( 'Sub title', 'text_domain' );
   $artcontent =  ! empty( $instance['artcontent']  ) ? $instance['artcontent'] :  __( 'From basic barcode labels to enterprise-wide solutions, our team takes the time to learn about your unique business needs. Then we develop, deploy and manage cost-effective solutions that let you sleep better at night and <strong>make your customers smile.</strong>', 'text_domain' );
   $link1 = ! empty( $instance['link1'] ) ? $instance['link1'] : '';
   $link2 = ! empty( $instance['link2'] ) ? $instance['link2'] : '';
   $link3 = ! empty( $instance['link3'] ) ? $instance['link3'] : '';
    $button1 = ! empty( $instance['button1'] ) ? $instance['button1'] : __( 'Ask a Question', 'text_domain' );   
   $button2 = ! empty( $instance['button2'] ) ? $instance['button2'] : __( 'Request a Quote', 'text_domain' );
   $button3 = ! empty( $instance['button3'] ) ? $instance['button3'] : __( 'Shop Now', 'text_domain' );

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

      <textarea class="widefat" id="<?php echo $this->get_field_id( 'artcontent' ); ?>" name="<?php echo $this->get_field_name( 'artcontent' ); ?>" type="text" value="<?php echo ( $artcontent ); ?>"><?php echo ( $artcontent ); ?>
      </textarea> 
   </p>
   <p>

      <label for="<?php echo $this->get_field_id( 'button1' ); ?>"><?php _e( 'Button 1:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'button1' ); ?>" name="<?php echo $this->get_field_name( 'button1' ); ?>" type="text" value="<?php echo esc_attr( $button1 ); ?>">
      <label for="<?php echo $this->get_field_id( 'link1' ); ?>"><?php _e( 'Link 1:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'link1' ); ?>" name="<?php echo $this->get_field_name( 'link1' ); ?>" type="text" value="<?php echo esc_attr( $link1 ); ?>">

   </p>
   <p>

      <label for="<?php echo $this->get_field_id( 'button2' ); ?>"><?php _e( 'Button 2:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'button2' ); ?>" name="<?php echo $this->get_field_name( 'button2' ); ?>" type="text" value="<?php echo esc_attr( $button2 ); ?>">
      <label for="<?php echo $this->get_field_id( 'link2' ); ?>"><?php _e( 'Link 2:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" type="text" value="<?php echo esc_attr( $link2 ); ?>">

   </p>

   p>

      <label for="<?php echo $this->get_field_id( 'button3' ); ?>"><?php _e( 'Button 3:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'button3' ); ?>" name="<?php echo $this->get_field_name( 'button3' ); ?>" type="text" value="<?php echo esc_attr( $button3 ); ?>">
      <label for="<?php echo $this->get_field_id( 'link3' ); ?>"><?php _e( 'Link 3:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'link3' ); ?>" name="<?php echo $this->get_field_name( 'link3' ); ?>" type="text" value="<?php echo esc_attr( $link3 ); ?>">

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
   $instance['link1'] = ( ! empty( $new_instance['link1'] ) ) ? $new_instance['link1'] : '';
   $instance['link2'] = ( ! empty( $new_instance['link2'] ) ) ? $new_instance['link2'] : '';
   $instance['link3'] = ( ! empty( $new_instance['link3'] ) ) ? $new_instance['link3'] : '';
   $instance['button1'] = ( ! empty( $new_instance['button1'] ) ) ? $new_instance['button1'] : '';
   $instance['button2'] = ( ! empty( $new_instance['button2'] ) ) ? $new_instance['button2'] : '';
   $instance['button3'] = ( ! empty( $new_instance['button3'] ) ) ? $new_instance['button3'] : '';
   $instance['artcontent'] = ( ! empty( $new_instance['artcontent'] ) ) ? $new_instance['artcontent'] : '';

 

   return $instance;

}

}





add_action( 'widgets_init', function(){

	register_widget( 'home_spotlight' );

});



?>