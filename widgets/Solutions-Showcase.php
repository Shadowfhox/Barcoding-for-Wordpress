<?php class Solutions_Showcase extends WP_Widget {

public function scripts()

{

   wp_enqueue_script( 'media-upload' );

   wp_enqueue_media();

   wp_enqueue_script('mediamanagertrigger', get_template_directory_uri() . '/js/mediamanagertrigger.js', array('jquery'));

}
	
	function __construct() {

    add_action('admin_enqueue_scripts', array($this, 'scripts'));

    parent::__construct( 'solutions_showcase',   __( 'Post Showcase for Solutions Page', 'text_domain' ),  array( 'description' => __( 'Post Showcase for Solutions Page', 'text_domain' ), ) 
   );

}

	public function widget( $args, $instance ) {
extract( $args );
   $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Default title', 'text_domain' ) : $instance['title'] );
   $subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
   $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
   $artitle = ! empty( $instance['artitle'] ) ? $instance['artitle'] : '';
   $artheader = ! empty( $instance['artheader'] ) ? $instance['artheader'] : '';
   $artcontent = ! empty( $instance['artcontent'] ) ? $instance['artcontent'] : '';
global $post; 
         
         $args = array(
               'post_type'=> 'post',
               'p' => $instance['selected_post']
            );

         $loop = new WP_Query($args);

   ob_start();  

   
if($loop->have_posts()) : ?>
               <?php while($loop->have_posts()) : 
               $loop->the_post(); ?>
      
      <header role="tab" class="silk-harmonica__header"> 
         <h6><?php echo $title; ?></h6>
         <h5> <span><?php echo $subtitle; ?></span>
            <svg class="symbol symbol-chevron-down">
            <use xlink:href="#chevron-down"></use>
            </svg>
         </h5>
         <figure><img src="<?php echo $image; ?>" alt=""></figure>
      </header>
      <article role="tabpanel" class="silk-harmonica__content"> 
         <h2><?php the_title();?></h2>
         <h3><?php echo $artheader; ?></h3>
         <p><?php the_content(); ?></p><a href="" class="button button--mini">Share</a>
         <div class="solution__footer">
            <h4><a href="">
               <svg class="symbol symbol-plane">
               <use xlink:href="#plane"></use></svg>
               <span>Connect with one of our solution specialists.&nbsp;</span><em>Connect Now.</em></a>
            </h4>
         </div>
      </article>

<?php endwhile; else : ?>

            <p><?php _e('<h4>No post selected yet </h4>','related_articles'); ?></p>
         
         <?php endif;



   //echo $args['after_widget'];

   ob_end_flush();

}



	/**

	 * Outputs the options form on admin

	 *

	 * @param array $instance The widget options

	 */

	public function form( $instance ) {
$defaults = array(
      'selected_post' => '0',    
            
      );
   $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
   $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
   $subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : __( 'Sub title', 'text_domain' );
   $artitle = ! empty( $instance['artitle'] ) ? $instance['artitle'] :  __( 'Our Solution', 'text_domain' );
   $artheader = ! empty( $instance['artheader']  ) ? $instance['artheader'] :  __( 'Header Lorem Ipsum Dolor', 'text_domain' );
   $artcontent =  ! empty( $instance['artcontent']  ) ? $instance['artcontent'] :  __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vitae ligula dolor.', 'text_domain' );
   $instance = wp_parse_args( (array) $instance, $defaults ); 

   ?>



   <p>

      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

   </p>
   <p>

      <label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e( 'Sub Title:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>">

   </p>
   <p>

      <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />

      <button class="upload_image_button button button-primary">Upload Image</button>

   </p>
   <?php /* <p>

      <label for="<?php echo $this->get_field_id( 'artitle' ); ?>"><?php _e( 'Article Title:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'artitle' ); ?>" name="<?php echo $this->get_field_name( 'artitle' ); ?>" type="text" value="<?php echo esc_attr( $artitle ); ?>">

   </p>*/ ?>
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
      <p>

      <label for="<?php echo $this->get_field_id( 'artheader' ); ?>"><?php _e( 'Article Header:' ); ?></label>

      <input class="widefat" id="<?php echo $this->get_field_id( 'artheader' ); ?>" name="<?php echo $this->get_field_name( 'artheader' ); ?>" type="text" value="<?php echo esc_attr( $artheader ); ?>">

   </p>
  <?php /*  <p>

      <label for="<?php echo $this->get_field_id( 'artcontent' ); ?>"><?php _e( 'Article Content:' ); ?></label>

      <textarea class="widefat" id="<?php echo $this->get_field_id( 'artcontent' ); ?>" name="<?php echo $this->get_field_name( 'artcontent' ); ?>" type="text" value="<?php echo esc_attr( $artcontent ); ?>"><?php echo esc_attr( $artcontent ); ?>
      </textarea> 
   </p> */ ?>

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
   $instance['selected_post'] = ( ! empty( $new_instance['selected_post'] ) ) ? strip_tags( $new_instance['selected_post'] ) : '';

   $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
   $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';
   $instance['subtitle'] = ( ! empty( $new_instance['subtitle'] ) ) ? $new_instance['subtitle'] : '';
   $instance['artitle'] = ( ! empty( $new_instance['artitle'] ) ) ? $new_instance['artitle'] : '';
   $instance['artheader'] = ( ! empty( $new_instance['artheader'] ) ) ? $new_instance['artheader'] : '';
   $instance['artcontent'] = ( ! empty( $new_instance['artcontent'] ) ) ? $new_instance['artcontent'] : '';

 

   return $instance;

}

}





add_action( 'widgets_init', function(){

	register_widget( 'Solutions_Showcase' );

});



?>