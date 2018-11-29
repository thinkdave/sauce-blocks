<?php
/*
This block is using jquery slick slider. To make it work follow the steps below:


1. Add CSS via:
    - scss/1-lib/_slick-slider.scss 
    - scss/5-blocks/_testimonial-slider.scss

    !!! Hero slider also uses this /scss/1-lib/_slick-slider.scss Make sure you don't included it twice.

2. Import CSS via scss/style.scss 
		@import '5-blocks/testimonial-slider';

3. Enqueue scripts to functions.php:
	wp_enqueue_script( 'thm-slick-slider', get_template_directory_uri() . '/js/jquery.slick.min.js', array( 'jquery'), '', true );

	!!! Hero slider also uses this JS Lib. Make sure you don't included it twice.

4. Init the jQuery Slick slider in main.js:

	// TESTIMONIAL SLIDER
	//--------------------------------------------------------//
	var testimonial_slider = $('.testimonial-slides-wrapper');
	if((testimonial_slider).length) {
		$('.testimonial-slider .testimonial-slides-wrapper').slick({
			autoplay: true,
			autoplaySpeed: 5000,
			dots: true,
			arrows: false,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			fade: true,
			adaptiveHeight: true
		});
	}
	//--------------------------------------------------------//


5. !!! Don't forget the prev/next arrows .svg files in /img/

*/
	if(get_sub_field('custom_html_id')) {
		$html_id = 'id="';
		$html_id .= get_sub_field('custom_html_id');
		$html_id .= '"';
	} else {
		$html_id = '';
	}

	if(get_sub_field('custom_html_class')) {
		$html_class = ' ' . get_sub_field('custom_html_class');
	} else {
		$html_class = '';
	}
?>
<section <?php echo $html_id; ?> class="block testimonial-slider<?php echo $html_class; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8 offset-lg-2 align-self-center">
			<?php if( have_rows('testimonial_slides') ): ?>
				<div class="testimonial-slides-wrapper">
	  				<?php while ( have_rows('testimonial_slides') ) : the_row(); ?>
	  				<div class="testimonial-slide-item">
	  			    
			        <?php the_sub_field('content'); ?>
			         <?php if (get_sub_field('author')): ?>
					    <div class="testimonial-author">
					    <?php the_sub_field('author'); ?>
					    </div>
					<?php endif; ?>
					</div>
			    	<?php endwhile; ?>
	  			</div>
			<?php endif; ?>
			</div><!--col-->
		</div><!--row-->
	</div><!--container-->
</section>
<!--testimonial-->
