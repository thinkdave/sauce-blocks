<?php
/*
BLOCK INFO:
- This block output a simple team grid with no additional action or info.

1. Add CSS via:
    - scss/5-blocks/_team.scss

2. Import CSS via scss/style.scss 
		@import '5-blocks/team';

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

	$group = get_sub_field('group');
?>
<section <?php echo $html_id; ?> class="block block-team<?php echo $html_class; ?>">
	<?php if (get_sub_field('section_heading')): ?>
	<div class="container">
		<div class="row">
			<div class="col">
			<?php the_sub_field('section_heading'); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
    <div class="container">
		<div class="row">
		<?php
		$options = array(
	        'post_type' 		=> 'team',
	        'posts_per_page' 	=> -1,
	        'tax_query' => array(
								array(
									'taxonomy' => 'group',
									'field'    => 'id',
									'terms'    => $group,
								),
							),
	        'meta_key'			=> 'last_name',
			'orderby'			=> 'meta_value',
			'order'				=> 'ASC'
	    );
	    $query = new WP_Query( $options );
	    if ( $query->have_posts() ) : ?>

		<?php while( $query->have_posts() ) : $query->the_post(); ?>
		<div id="member-<?php the_ID(); ?>" class="team-member col-lg-3 col-md-6 col-sm-6">
			<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
			<div class="member-thumb">
				<?php the_post_thumbnail('team-thumb'); ?>
			</div>
			<?php endif; ?>
			<div class="member-info">
				<h3><?php the_title(); ?></h3>
				<p><?php the_field( 'position' ); ?></p>
			</div>
		</div><!-- team-member -->
		<?php endwhile; 
		endif;
		wp_reset_postdata(); ?>
		</div><!-- row-->
	</div><!-- container -->
</section><!-- block-team -->
