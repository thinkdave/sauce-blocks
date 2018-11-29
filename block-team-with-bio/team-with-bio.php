<?php
/*
BLOCK INFO:
- This block output a simple team grid with no additional action or info. Follow the steps below:

1. Add CSS via:
     - scss/5-blocks/_team-with-bio.scss

2. Import CSS via scss/style.scss 
		@import '5-blocks/team-with-bio';

3. Init the jQuery Slick slider in main.js:

	// TEAM GRID
	//--------------------------------------------------------//
    function mediaSize() { 
    	// Set the matchMedia
    	
		if (window.matchMedia('(min-width: 768px)').matches) {

			$('.block-team-bios .team-member.has-bio').on('click', function() {

	            var member = $(this);
	            var team = member.parent().parent();
	            var summaryContainer  = team.next();

	            $('.team-member').removeClass('active');
	            member.addClass('active');

	            summaryContainer.find('.col').html(member.find('.member-bio-mobile-inner').clone());
	            
	            setTimeout(function(){
	                $('html, body').animate({
	                    scrollTop: summaryContainer.offset().top - 150
	                }, 300);
	            }, 300);
	                   
	            if (summaryContainer.hasClass('active')) {
	                // do nothing
	            }else {
	                $('.team-grid .summary.active').slideUp(200).removeClass('active');
	                summaryContainer.slideDown(200).addClass('active');
	            }
	            return false;
	        });

	        $('.summary .close').click(function(){
	             $(this).parent().parent().parent().slideUp(200).removeClass('active');
	             $('.team-member').removeClass('active');
	             return false;
	        });			
	    // if smaller than 768px
		} else {
				$('.block-team-bios .team-member .member-bio-desktop .more-info a').on('click', function() {
					if ($(this).parent().parent().parent().hasClass('has-bio')) {
				    	$(this).parent().parent().next().slideToggle();
				    }
			    return false;
			});
		   		$('.block-team-bios .team-member.has-bio .member-bio-mobile a.close').click(function(){
					$(this).parent().slideUp();
					return false;
				});		
		}
	};
	// Call the function
  	mediaSize();
  	// Attach the function to the resize event listener
	window.addEventListener('resize', mediaSize, false); 
	//--------------------------------------------------------//

4. !!! Don't forget the close icon svg file in /img/

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
<section <?php echo $html_id; ?> class="block block-team-bios<?php echo $html_class; ?>">
	<?php if (get_sub_field('section_heading')): ?>
	<div class="container">
		<div class="row">
			<div class="col">
			<?php the_sub_field('section_heading'); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

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
	     if ( $query->have_posts() ) { ?>
		<div class="team-grid cf">
			<?php $i = 0; ?>
			<?php if($i%4==0) { ?>
			<div class="team-row container cf">
				<div class="row">
			<?php } ?>
				<?php while( $query->have_posts() ) : ?>
				<?php $query->the_post(); ?>
				<div id="member-<?php the_ID(); ?>" class="team-member col-md-3 <?php if(get_the_content()) { echo 'has-bio'; } ?>">
					<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
					<div class="post-thumb">
					<?php the_post_thumbnail('team-thumb'); ?>
					</div>
					<?php endif; ?>
					<div class="member-bio-desktop">
						<h3><?php the_title(); ?></h3>
						<p class="member-position"><?php the_field( 'position' ); ?></p>
						<p class="more-info"><a href="#">Bio</a></p>
					</div>
					<div class="member-bio-mobile">
						<div class="member-bio-mobile-inner">
							<h3><?php the_title(); ?></h3>
							<p class="member-position"><?php the_field( 'position' ); ?></p>
							<div class="member-bio-text"><?php the_content(); ?></div>
						</div>
						<a class="close" href="#"></a>
					</div>
				</div>
			
				<?php $i++; ?>
				<?php if($i%4 == 0) { ?>
					</div><!-- .row -->
				</div><!-- .container -->

				<div class="summary">
					<div class="container">
						<div class="row">
							<div class="col"></div>
							<a class="close" href="#"></a>
						</div>				
					</div>
				</div>
				<div class="team-row container cf">
					<div class="row">
				<?php } ?>
				
				<?php endwhile; ?>
			
				<?php if($i%4!=0) { // put closing div here if loop is not exactly a multiple of 3 ?>
					</div>
				</div>
				<div class="summary fullwidth">
					<div class="close-container"><a href="#" class="close"></a></div>
					<div class="container">
						<div class="row">
							<div class="col">
							</div>
						</div>
					</div>
				</div>
				<?php } ?>

			<?php } ?>	
			<?php wp_reset_postdata(); ?>

		</div><!-- . -->
</section><!-- block-team -->