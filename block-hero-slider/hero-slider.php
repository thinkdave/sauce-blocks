<?php
/*
This block is using jquery slick slider. To make it work follow the steps below:

1. Add CSS via:
    - scss/1-lib/_slick-slider.scss 
    - scss/5-blocks/_hero-slider.scss

    !!! Testimonial slider also uses this /scss/1-lib/_slick-slider.scss Make sure you don't included it twice.

2. Import CSS via scss/style.scss 
		@import '5-blocks/hero-slider';

3. Enqueue scripts to functions.php:
	wp_enqueue_script( 'thm-slick-slider', get_template_directory_uri() . '/js/jquery.slick.min.js', array( 'jquery'), '', true );

	!!! Testimonial slider also uses this JS Lib. Make sure you don't included it twice.


4. Init the jQuery Slick slider in main.js:

	// HERO SLIDER
	//--------------------------------------------------------//
	var hero_slider = $('.hero-slides-wrapper');
	if((hero_slider).length) {
		$('.hero-slider .hero-slides-wrapper').slick({
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
<section <?php echo $html_id; ?> class="block hero-slider<?php echo $html_class; ?>">
  
  <?php if( have_rows('hero_slides') ): ?>
  <div class="hero-slides-wrapper">
  	<?php while ( have_rows('hero_slides') ) : the_row(); ?>
  	<?php $heroSlideImage = get_sub_field('image'); ?>	
  	<div class="hero-slide-item" style="background-image: url(<?php echo $heroSlideImage['url']; ?>)">
  		<div class="container">
		  <div class="row">
		    <div class="col-md-8 col-lg-6 align-self-center">
		        <?php the_sub_field('content'); ?>
		    </div><!--col-->
		  </div><!--row-->
	  	</div>		
  	</div>
  	<?php endwhile; ?>
  </div>
  <?php endif; ?>
  
</section>
<!--hero-slider-->
