<?php
/**
 * The template for index
 *
 * @package WordPress
 * @subpackage barcoding
 * 
 */
  get_header(); ?>

<main class="clear">
    <div class="grid">
         <?php get_sidebar(); ?>
        <div class="col-large-8 col-wooser-9">
			<div class="main-content">
				<div class="section">
					<p class="lead-in"><?php get_template_part( 'content', get_post_format() ); ?>
					</p>
				</div>
			</div>
		</div>
	</div> 
</main>
<?php get_footer(); ?>