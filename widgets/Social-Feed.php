<?php class social_feed extends WP_Widget {

	
	function __construct() {

    add_action('admin_enqueue_scripts', array($this, 'scripts'));

    parent::__construct( 'social_feed',   __( 'Social Feed', 'text_domain' ),  array( 'description' => __( 'Displays Social Feed', 'text_domain' ), ) 
   );

}

	public function widget( $args, $instance ) {

   $link1 = ! empty( $instance['link1'] ) ? $instance['link1'] : '';
   $img1= ! empty( $instance['img1'] ) ? $instance['img1'] : '';
   $desc1 = ! empty( $instance['desc1'] ) ? $instance['desc1'] : '';
   $link2 = ! empty( $instance['link2'] ) ? $instance['link2'] : '';
   $img2= ! empty( $instance['img2'] ) ? $instance['img2'] : '';
   $desc2 = ! empty( $instance['desc2'] ) ? $instance['desc2'] : '';
   $link3 = ! empty( $instance['link3'] ) ? $instance['link3'] : '';
   $img3= ! empty( $instance['img3'] ) ? $instance['img3'] : '';
   $desc3 = ! empty( $instance['desc3'] ) ? $instance['desc3'] : '';
  
   ob_start();

   //echo $args['before_widget'];

   

   ?>

   <div class="social-feeds">
          <div class="compartment">
            <ul>
              <li><a href="<? echo $link1; ?>" target="_blank" class="social__bubble social__bubble--facebook">
                  <div class="social__icon">
                      <svg class="symbol symbol-facebook">
                        <use xlink:href="#facebook"></use>
                      </svg>
                  </div></a>
                <p><? echo $desc1; ?></p>
              </li>
              <li><a href="<? echo $link2; ?>" target="_blank" class="social__bubble social__bubble--twitter">
                  <div class="social__icon">
                      <svg class="symbol symbol-twitter">
                        <use xlink:href="#twitter"></use>
                      </svg>
                  </div></a>
                <p><? echo $desc2; ?></p>
              </li>
              <li><a href="<? echo $link3; ?>" target="_blank"><img src="<? echo $img3; ?>" class="full-width"></a></li>
            </ul>
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

   $img1 = ! empty( $instance['img1'] ) ? $instance['img1'] : __( 'wp-content/themes/barcoding/assets/images/big-circle.jpg', 'text_domain' );
   $link1 = ! empty( $instance['link1'] ) ? $instance['link1'] : __( 'DONNA BECRAFT, CIO, Dunbar Armored', 'text_domain' );
   $desc1 = ! empty( $instance['desc1'] ) ? $instance['desc1'] : __( 'Could #‎hyperloop‬ systems replace trucks and rail for cargo <strong>‪#‎transportation‬</strong>?', 'text_domain' );
   $img2 = ! empty( $instance['img2'] ) ? $instance['img2'] : __( 'wp-content/themes/barcoding/assets/images/big-circle.jpg', 'text_domain' );
   $link2 = ! empty( $instance['link2'] ) ? $instance['link2'] : __( 'DONNA BECRAFT, CIO, Dunbar Armored', 'text_domain' );
   $desc2 = ! empty( $instance['desc2'] ) ? $instance['desc2'] : __( 'Proud sponsor of World Refugee Day in <strong>#Baltimore @RYPnews #CelebrateDiversity @ShaneBarcode</strong>', 'text_domain' );
   $img3 = ! empty( $instance['img3'] ) ? $instance['img3'] : __( 'wp-content/themes/barcoding/assets/images/geeknetwork.png', 'text_domain' );
   $link3 = ! empty( $instance['link3'] ) ? $instance['link3'] : __( 'DONNA BECRAFT, CIO, Dunbar Armored', 'text_domain' );
   $desc3 = ! empty( $instance['desc3'] ) ? $instance['desc3'] : __( 'wp-content/themes/barcoding/assets/images/big-circle.jpg', 'text_domain' );
   

   ?>
<h1>Item 1</h1>
   <p>
   
      <label for="<?php echo $this->get_field_id( 'desc1' ); ?>"><?php _e( 'Description:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'desc1' ); ?>" name="<?php echo $this->get_field_name( 'desc1' ); ?>" type="text" value="<?php echo esc_attr( $desc1 ); ?>">

      <label for="<?php echo $this->get_field_id( 'link1' ); ?>"><?php _e( 'Link:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'link1' ); ?>" name="<?php echo $this->get_field_name( 'link1' ); ?>" type="text" value="<?php echo esc_attr( $link1 ); ?>">

      <label for="<?php echo $this->get_field_id( 'img1' ); ?>"><?php _e( 'Imagen:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'img1' ); ?>" name="<?php echo $this->get_field_name( 'img1' ); ?>" type="text" value="<?php echo esc_attr( $img1 ); ?>">
      <button class="upload_image_button button button-primary">Upload Image</button>

   </p>
   <hr>
   <h1>Item 2</h1>
   <p>
   
      <label for="<?php echo $this->get_field_id( 'desc2' ); ?>"><?php _e( 'Description:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'desc2' ); ?>" name="<?php echo $this->get_field_name( 'desc2' ); ?>" type="text" value="<?php echo esc_attr( $desc2 ); ?>">

      <label for="<?php echo $this->get_field_id( 'link2' ); ?>"><?php _e( 'Link:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" type="text" value="<?php echo esc_attr( $link2 ); ?>">

      <label for="<?php echo $this->get_field_id( 'img2' ); ?>"><?php _e( 'Imagen:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'img2' ); ?>" name="<?php echo $this->get_field_name( 'img2' ); ?>" type="text" value="<?php echo esc_attr( $img2 ); ?>">
      <button class="upload_image_button button button-primary">Upload Image</button>

   </p>

   <h1>Item 3</h1>
   <p>
   
      <label for="<?php echo $this->get_field_id( 'desc3' ); ?>"><?php _e( 'Description:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'desc3' ); ?>" name="<?php echo $this->get_field_name( 'desc3' ); ?>" type="text" value="<?php echo esc_attr( $desc3 ); ?>">

      <label for="<?php echo $this->get_field_id( 'link3' ); ?>"><?php _e( 'Link:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'link3' ); ?>" name="<?php echo $this->get_field_name( 'link3' ); ?>" type="text" value="<?php echo esc_attr( $link3 ); ?>">

      <label for="<?php echo $this->get_field_id( 'img3' ); ?>"><?php _e( 'Imagen:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'img3' ); ?>" name="<?php echo $this->get_field_name( 'img3' ); ?>" type="text" value="<?php echo esc_attr( $img3 ); ?>">
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

   $instance['link1'] = ( ! empty( $new_instance['link1'] ) ) ? strip_tags( $new_instance['link1'] ) : '';
   $instance['desc1'] = ( ! empty( $new_instance['desc1'] ) ) ? $new_instance['desc1'] : '';
   $instance['img1'] = ( ! empty( $new_instance['img1'] ) ) ? $new_instance['img1'] : '';
    $instance['link2'] = ( ! empty( $new_instance['link2'] ) ) ? strip_tags( $new_instance['link2'] ) : '';
   $instance['desc2'] = ( ! empty( $new_instance['desc2'] ) ) ? $new_instance['desc2'] : '';
   $instance['img2'] = ( ! empty( $new_instance['img2'] ) ) ? $new_instance['img2'] : '';
    $instance['link3'] = ( ! empty( $new_instance['link3'] ) ) ? strip_tags( $new_instance['link3'] ) : '';
   $instance['desc3'] = ( ! empty( $new_instance['desc3'] ) ) ? $new_instance['desc3'] : '';
   $instance['img3'] = ( ! empty( $new_instance['img3'] ) ) ? $new_instance['img3'] : '';
   

 

   return $instance;

}

}





add_action( 'widgets_init', function(){

	register_widget( 'social_feed' );

});



?>