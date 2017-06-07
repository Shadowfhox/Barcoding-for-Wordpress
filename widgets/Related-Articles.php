<?php
/** Widget based on Single Post Widget By LibraFire https://rhg.wordpress.org/plugins/single-post-sidebar-widget/ */


class related_articles extends WP_Widget {


/* ------------------------------------------------
	Widget Setup
------------------------------------------------ */

     function __construct() {
	 parent::__construct( 'related_articles',   __( 'Related Posts for different Pages', 'text_domain' ),  array( 'description' => __( 'Related Posts Showcase for different Barcoding Pages', 'text_domain' ), ) 
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


				
					
					
				<div class="col-gamagori-4">

					<div class="callout callout--<?php echo $bck_color; ?>"><a href="<?php the_permalink();?>" class="callout__details">
                        <h3 class="mini"><?php the_title();?></h3>
                        <h2 class="stay"><?php the_excerpt(); ?></h2>
                        <h2 class="stay"><?php the_date('Y-m-d'); ?></h2></a>
                        <div class="callout__share">
                          <h3 class="mini"><span>Share +</span></h3>
                          <nav class="nav nav-social">
                            <ul>
                              <li><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>" target="_blank"><span class="bottle">                                      
                              		<svg class="symbol symbol-pinterest">
                                        <use xlink:href="#pinterest"></use>
                                    </svg></span><span class="visible-for-screen-readers">Pinterest</span></a></li>
                              <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank"><span class="bottle">
                                      <svg class="symbol symbol-google">
                                        <use xlink:href="#google"></use>
                                      </svg></span><span class="visible-for-screen-readers">Google+</span></a></li>
                              <li><a href="href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" title="Share on LinkedIn" target="_blank"><span class="bottle">
                                      <svg class="symbol symbol-linkedin">
                                        <use xlink:href="#linkedin"></use>
                                      </svg></span><span class="visible-for-screen-readers">linkedin</span></a></li>
                              <li><a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!" target="_blank"> <span class="bottle">
                                      <svg class="symbol symbol-twitter">
                                        <use xlink:href="#twitter"></use>
                                      </svg></span><span class="visible-for-screen-readers">Twitter   </span></a></li>
                              <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share on Facebook" target="_blank"><span class="bottle">
                                      <svg class="symbol symbol-facebook">
                                        <use xlink:href="#facebook"></use>
                                      </svg></span><span class="visible-for-screen-readers">Facebook</span></a></li>
                            </ul>
                          </nav>
                        </div>
                    </div>
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
add_action( 'widgets_init', 'related_articles_init' );

// Register Widget
function related_articles_init() {
	register_widget( 'related_articles' );
}