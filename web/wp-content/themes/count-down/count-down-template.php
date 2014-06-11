<?php 
/*
Template name: CountDown Template
*/
?>
<?php
global $socialIcons;
get_header(); ?>

				<!-- Main container -->
				<div class="row countdown-wrapper">
				
					<!-- Section Count --> 
					<section class="six columns hide-for-small section-count vcenter show1">
						<div id="count" class="count text-center vcenter">
						
							<div class="dig-days">
								<div class="desc-day dark"><?php _e('Days', 'countdown');?></div>
								<div id="dig-days" class="light"><span>{d100}</span><span>{d10}</span><span>{d1}</span></div> 
							</div>
							
							<div class="dig-hours">
								<span id="dig-hours" class="light show2">{hnn}</span>
								<div class="desc-time dark show3"><?php _e('Hours', 'countdown');?></div>
							</div>
							
							<div class="dig-delim light show2">:</div>
							
							<div class="dig-mins">
								<span id="dig-mins" class="light show2">{mnn}</span>
								<div class="desc-time dark show3"><?php _e('Minutes', 'countdown');?></div>
							</div>
							
							<div class="dig-delim light show2">:</div>
							
							<div class="dig-sec">
								<span id="dig-sec" class="light show2">{snn}</span>
								<div class="desc-time dark show3"><?php _e('Seconds', 'countdown');?></div>
							</div>

						</div>
						
					</section>
					<!-- End Section Count -->
					
					<!-- Section Name -->
					<section class="six columns text-center border section-name vcenter show1">
						
						<div class="vcenter">
						
							<!-- Header -->
							<h1 class="header show3">
								<span><?php echo of_get_option('light_text', get_bloginfo('name'));?></span>
							</h1>
							<h2 class="soon show3">
								<span class="dark"><?php echo of_get_option('dark_text', 'COMING SOON');?></span>
							</h2>
							<!-- End Header -->
								
							<!-- Small Count. Show if widdh screen is less than 768px -->
							<div id="count-small" class="twelve count-small text-center hide show-for-small">
								<span class="dark">{dnn}</span>:<span class="light">{hnn}</span>:<span class="dark">{mnn}</span>:<span class="light">{snn}</span>
							</div>
								
							<!-- Description -->
							<article class="desc show3">
								<?php echo of_get_option('desc_text');?>
							</article>
							<!-- End Description -->
							<div class="icon">
								<?php 
								foreach($socialIcons as $icon): ?>
									<?php if (of_get_option('social_icon_'.$icon)) : ?>
										<a href="<?php echo of_get_option('social_icon_'.$icon);?>"><span class="fa fa-<?php echo $icon;?>"></span></a>
									<?php endif; ?>
								<?php endforeach; ?> 
							</div>
							
							<?php //endif; ?>
						</div>
					</section>
					<!-- End Section Name -->
					
				</div>
				<!-- End Main container -->
				
				<?php get_footer(); ?>