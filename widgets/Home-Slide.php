<?php class home_slide extends WP_Widget {

public function scripts()

{


   wp_enqueue_script( 'media-upload' );

   wp_enqueue_media();

   wp_enqueue_script('mediamanagertrigger', get_template_directory_uri() . '/js/mediamanagertrigger.js', array('jquery'));

}
	
	function __construct() {

    add_action('admin_enqueue_scripts', array($this, 'scripts'));

    parent::__construct( 'home_slide',   __( 'Home Slide', 'text_domain' ),  array( 'description' => __( '', 'text_domain' ), ) 
   );

}

	public function widget( $args, $instance ) {

   
   $artcontent1 = ! empty( $instance['artcontent1'] ) ? $instance['artcontent1'] : '';
    $artcontent2 = ! empty( $instance['artcontent2'] ) ? $instance['artcontent2'] : '';
     $artcontent3 = ! empty( $instance['artcontent3'] ) ? $instance['artcontent3'] : '';
   $title1 = ! empty( $instance['title1'] ) ? $instance['title1'] : '';
   $title2 = ! empty( $instance['title2'] ) ? $instance['title2'] : '';
   $title3 = ! empty( $instance['title3'] ) ? $instance['title3'] : '';
   $link1 = ! empty( $instance['link1'] ) ? $instance['link1'] : '';
   $link2 = ! empty( $instance['link1'] ) ? $instance['link1'] : '';
   $link3 = ! empty( $instance['link1'] ) ? $instance['link1'] : '';
  $image1 = ! empty( $instance['image1'] ) ? $instance['image1'] : '';
   $image2 = ! empty( $instance['image2'] ) ? $instance['image2'] : '';
   $image3 = ! empty( $instance['image3'] ) ? $instance['image3'] : '';
   ob_start();

   //echo $args['before_widget'];

   if ( ! empty( $instance['title'] ) ) {

     //echo $args['before_title'] . $title . $args['after_title'];

   }

   ?>

   <ul class="swift-slide product-slide halfway-section">
        <li class="hero product">
          <div class="compartment">
            <div class="product__details">
              <h2 class="larger"><?php echo $title1; ?></h2>
              <p><?php echo $artcontent1; ?></p><a href="<?php echo $link1; ?>" class="button">Read More</a>
            </div>
          </div><img src="<?php echo $image1; ?>" alt="undefined">
        </li>
        <li class="hero product">
          <div class="compartment">
            <div class="product__details">
              <h2 class="larger"><?php echo $title2; ?></h2>
              <p><?php echo $artcontent2; ?></p><a href="<?php echo $link2; ?>" class="button">Read More</a>
            </div>
          </div><img src="<?php echo $image2; ?>" alt="undefined">
        </li>
        <li class="hero product">
          <div class="compartment">
            <div class="product__details">
              <h2 class="larger"><?php echo $title3; ?></h2>
              <p><?php echo $artcontent3; ?></p><a href="<?php echo $link3; ?>" class="button">Read More</a>
            </div>
          </div><img src="<?php echo $image3; ?>" alt="undefined">
        </li>
      </ul>



      


      

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

   $title1 = ! empty( $instance['title1'] ) ? $instance['title1'] : __( 'Slide 1', 'text_domain' );
   $title2 = ! empty( $instance['title2'] ) ? $instance['title2'] : __( 'Slide 2', 'text_domain' );
   $title3 = ! empty( $instance['title3'] ) ? $instance['title3'] : __( 'Slide 3', 'text_domain' );
   $image1 = ! empty( $instance['image1'] ) ? $instance['image1'] : __( 'wp-content/themes/barcoding/assets/images/honeywell.jpg', 'text_domain' );
   $image2 = ! empty( $instance['image2'] ) ? $instance['image2'] : __( 'wp-content/themes/barcoding/assets/images/honeywell.jpg', 'text_domain' );
   $image3 = ! empty( $instance['image3'] ) ? $instance['image3'] : __( 'wp-content/themes/barcoding/assets/images/honeywell.jpg', 'text_domain' );
   $artcontent1 =  ! empty( $instance['artcontent1']  ) ? $instance['artcontent1'] :  __( 'Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo.', 'text_domain' );
   $artcontent2 =  ! empty( $instance['artcontent2']  ) ? $instance['artcontent2'] :  __( 'Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo.', 'text_domain' );
   $artcontent3 =  ! empty( $instance['artcontent3']  ) ? $instance['artcontent3'] :  __( 'Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo.', 'text_domain' );
   $link1 = ! empty( $instance['link1'] ) ? $instance['link1'] : '';
   $link2 = ! empty( $instance['link2'] ) ? $instance['link2'] : '';
   $link3 = ! empty( $instance['link3'] ) ? $instance['link3'] : '';
    

   ?>

   
   
   
   
   <h1>Slide 1</h1>
   <p>
      <label for="<?php echo $this->get_field_id( 'title1' ); ?>"><?php _e( 'Title 1:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>">
      
      <label for="<?php echo $this->get_field_id( 'artcontent1' ); ?>"><?php _e( 'Slide 1 Content:' ); ?></label>

      <textarea class="widefat" id="<?php echo $this->get_field_id( 'artcontent1' ); ?>" name="<?php echo $this->get_field_name( 'artcontent1' ); ?>" type="text" value="<?php echo ( $artcontent1 ); ?>"><?php echo ( $artcontent1 ); ?>
      </textarea> 
      
      <label for="<?php echo $this->get_field_id( 'link1' ); ?>"><?php _e( 'Link 1:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'link1' ); ?>" name="<?php echo $this->get_field_name( 'link1' ); ?>" type="text" value="<?php echo esc_attr( $link1 ); ?>">
      <label for="<?php echo $this->get_field_id( 'image1' ); ?>"><?php _e( 'Image:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'image1' ); ?>" name="<?php echo $this->get_field_name( 'image1' ); ?>" type="text" value="<?php echo  $image1 ; ?>" />

      <button class="upload_image_button button button-primary">Upload Image</button>

   </p>
<hr>
   <h1>Slide 2</h1>
      <p> 
      <label for="<?php echo $this->get_field_id( 'title2' ); ?>"><?php _e( 'Title 2: ' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>">

      <label for="<?php echo $this->get_field_id( 'artcontent2' ); ?>"><?php _e( 'Slide 2 Content:' ); ?></label>

      <textarea class="widefat" id="<?php echo $this->get_field_id( 'artcontent2' ); ?>" name="<?php echo $this->get_field_name( 'artcontent2' ); ?>" type="text" value="<?php echo ( $artcontent2 ); ?>"><?php echo ( $artcontent2 ); ?>
      </textarea> 

      <label for="<?php echo $this->get_field_id( 'link2' ); ?>"><?php _e( 'Link 2:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" type="text" value="<?php echo esc_attr( $link2 ); ?>">
      <label for="<?php echo $this->get_field_id( 'image2' ); ?>"><?php _e( 'Image:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'image2' ); ?>" name="<?php echo $this->get_field_name( 'image2' ); ?>" type="text" value="<?php echo  $image2 ; ?>" />

      <button class="upload_image_button button button-primary">Upload Image</button>

   </p>
   <hr>
   <h1>Slide 3</h1>
   <p> 
      <label for="<?php echo $this->get_field_id( 'title3' ); ?>"><?php _e( 'Title 3: ' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>">

      <label for="<?php echo $this->get_field_id( 'artcontent3' ); ?>"><?php _e( 'Slide 3 Content:' ); ?></label>

      <textarea class="widefat" id="<?php echo $this->get_field_id( 'artcontent3' ); ?>" name="<?php echo $this->get_field_name( 'artcontent3' ); ?>" type="text" value="<?php echo ( $artcontent3 ); ?>"><?php echo ( $artcontent3 ); ?>
      </textarea> 

      <label for="<?php echo $this->get_field_id( 'link3' ); ?>"><?php _e( 'Link 3:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'link3' ); ?>" name="<?php echo $this->get_field_name( 'link3' ); ?>" type="text" value="<?php echo esc_attr( $link3 ); ?>">

      <label for="<?php echo $this->get_field_id( 'image3' ); ?>"><?php _e( 'Image:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'image3' ); ?>" name="<?php echo $this->get_field_name( 'image3' ); ?>" type="text" value="<?php echo  $image3 ; ?>" />

      <button class="upload_image_button button button-primary">Upload Image</button>

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

   $instance['title1'] = ( ! empty( $new_instance['title1'] ) ) ? strip_tags( $new_instance['title1'] ) : '';
      $instance['title2'] = ( ! empty( $new_instance['title2'] ) ) ? strip_tags( $new_instance['title2'] ) : '';
         $instance['title3'] = ( ! empty( $new_instance['title3'] ) ) ? strip_tags( $new_instance['title3'] ) : '';
   $instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? $new_instance['image1'] : '';
   $instance['image2'] = ( ! empty( $new_instance['image2'] ) ) ? $new_instance['image2'] : '';
   $instance['image3'] = ( ! empty( $new_instance['image3'] ) ) ? $new_instance['image3'] : '';
   $instance['link1'] = ( ! empty( $new_instance['link1'] ) ) ? $new_instance['link1'] : '';
   $instance['link2'] = ( ! empty( $new_instance['link2'] ) ) ? $new_instance['link2'] : '';
   $instance['link3'] = ( ! empty( $new_instance['link3'] ) ) ? $new_instance['link3'] : '';
   $instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? $new_instance['image1'] : '';
   $instance['image2'] = ( ! empty( $new_instance['image2'] ) ) ? $new_instance['image2'] : '';
   $instance['image3'] = ( ! empty( $new_instance['image3'] ) ) ? $new_instance['image3'] : '';
   $instance['artcontent1'] = ( ! empty( $new_instance['artcontent1'] ) ) ? $new_instance['artcontent1'] : '';
   $instance['artcontent2'] = ( ! empty( $new_instance['artcontent2'] ) ) ? $new_instance['artcontent2'] : '';
   $instance['artcontent3'] = ( ! empty( $new_instance['artcontent3'] ) ) ? $new_instance['artcontent3'] : '';

 

   return $instance;

}

}





add_action( 'widgets_init', function(){

	register_widget( 'home_slide' );

});



?>