<?php
// This is a fullwidth image block with or without block (basically a banner/inner hero)

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
<section <?php echo $html_id; ?> class="block block-cta<?php echo $html_class; ?>">
	<div class="container">
		<div class="row">
			<?php if (get_sub_field('single_column')){ ?>
			<div class="col-md-12 col-lg-12 align-self-center text-center">
				<?php the_sub_field('content'); ?>
			</div>
			<?php }else{ ?>
			<div class="col-md-12 col-lg-9 align-self-center">
				<?php the_sub_field('content'); ?>
			</div>
			<div class="col-md-12 col-lg-3 align-self-center">
				<?php the_sub_field('content_2'); ?>
			</div>	
			<?php } ?>
		</div>
	</div>
</section><!--image-fullwidth-->