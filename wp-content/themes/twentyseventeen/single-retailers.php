<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<?php
		$args = array(
		  'post_type'   => 'retailers',
		  'post_status' => 'publish',

		 );
		 
		$testimonials = new WP_Query( $args );
		if( $testimonials->have_posts() ) :
		?>
		  
		    <?php
		      while( $testimonials->have_posts() ) :
		        $testimonials->the_post();

		        the_title();
		        the_content();
		        the_post_thumbnail();
		        the_post_thumbnail_url();
		       	

		       	// slider data
		        $slider_info = get_post_meta($post->ID, 'gallery_data', true);
		    	if( $slider_info['image_url'] ){
			    	foreach ($slider_info['image_url'] as $key => $image) {

			        	$slide_title = $slider_info['slide_title'][$key];
			        	$slide_image = $image;
			        	$image_credit = $slider_info['image_credit'][$key];
			        	$slide_intro = $slider_info['slide_intro'][$key];

			        }
		    	}
		        

		        // 
		        ?>
		          
		        <?php
		      endwhile;
		      wp_reset_postdata();
		    ?>
	
		<?php
		else :
		  esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
		endif;
		?>
	</div><!-- #primary -->
	
</div><!-- .wrap -->

<?php get_footer();
