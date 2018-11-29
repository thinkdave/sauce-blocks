<?php
/*
1. Add CSS via:
    - scss/5-blocks/_hero-video.scss

2. Import CSS via scss/style.scss 
		@import '5-blocks/hero-video';

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
<section <?php echo $html_id; ?> class="block hero-video<?php echo $html_class; ?>">
    <?php $heroVideoMp4 = get_sub_field('video_mp4'); ?>
  	<video loop autoplay muted id="hero-video">
		<source src="<?php echo $heroVideoMp4; ?>" type="video/mp4">
		<!-- <source src="<?php echo $heroVideoWebm; ?>" type="video/webm">-->
	</video>
	<div class="overlay"></div>
  
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-6 align-self-center">
			<?php the_sub_field('content'); ?>
			</div><!--col-->
		</div><!--row-->
	</div>
</section>
<!--hero-video-->
