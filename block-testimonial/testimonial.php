<?php
/*
1. Add CSS via:
    - scss/5-blocks/_testimonial.scss

2. Import CSS via scss/style.scss 
		@import '5-blocks/testimonial';

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
<section <?php echo $html_id; ?> class="block testimonial<?php echo $html_class; ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 align-self-center">
			    <?php the_sub_field('content'); ?>
			    <?php if (get_sub_field('author')): ?>
				    <div class="testimonial-author">
				    <?php the_sub_field('author'); ?>
				    </div>
				<?php endif; ?>
			</div><!--col-->
		</div><!--row-->
	</div>		
</section>
<!--testimonial-->
