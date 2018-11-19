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
<section <?php echo $html_id; ?> class="block image-fullwidth<?php echo $html_class; ?>">
	<?php
	$bannerImage = get_sub_field('image');
	$bannerImageMobile = get_sub_field('image_mobile');
	?>

	<div class="image-fullwidth-img"  style="background-image: url('<?php echo $bannerImage['url']; ?>');"></div>
	<?php if ($bannerImageMobile) : ?>
	<div class="image-fullwidth-img-mobile" style="background-image: url('<?php echo $bannerImageMobile['url']; ?>');"></div>
	<?php endif; ?>
	<div class="container">
		<div class="row">
			<?php if (get_sub_field('display_text')): ?>
			<div class="col-md-12 col-lg-6 columns image-fullwidth-content align-self-center">
				<?php the_sub_field('content'); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section><!--image-fullwidth-->