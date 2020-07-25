
<!-- main content start -->
<div class="mainwrap blog <?php if(is_front_page()) echo 'home' ?> <?php if(!laura_globals('use_fullwidth')) echo 'sidebar' ?> default">
	<div class="laura-breadcrumb">
		<div class="browsing"><?php if(is_tag()){esc_attr_e('Browsing Tag','laura');}else{esc_attr_e('Browsing Category','laura');} ?></div>
		<?php echo laura_breadcrumb(); ?>
	</div>
	<div class="main clearfix">
		<div class="pad"></div>			
		<div class="content blog">
			
			<?php if (have_posts()) : ?>
				<?php 
				add_filter( 'shortcode_atts_gallery', 'laura_gallery_C' );
				function laura_gallery_c( $out )
				{
					remove_filter( current_filter(), __FUNCTION__ );
					$out['size'] = 'laura-news';
					return $out;
				}			
				?>
				<?php while (have_posts()) : the_post(); ?>
					<?php if(is_sticky(get_the_id())) { 
					?>
						<div class="laura_sticky">
					<?php } ?>
					<?php $postmeta = get_post_custom(get_the_id()); 
					?>
					<?php if ( has_post_format( 'gallery' , get_the_id())) { ?>	
						<div class="slider-category laura-type-gallery">
							<div class="blogpostcategory">
								<?php get_template_part('includes/loops/loop-top-blog','category'); ?>				
								<?php get_template_part('includes/post-formats/format-gallery','category'); ?>
								<?php get_template_part('includes/loops/loop-meta-blog','category'); ?>						
								<?php get_template_part('includes/loops/loop-blog','category'); ?>	
							</div>
						</div>				
					<?php } 
					if ( has_post_format( 'video' , get_the_id())) { ?>
						<div class="slider-category laura-video">		
							<div class="blogpostcategory">
								<?php get_template_part('includes/loops/loop-top-blog','category'); ?>			
								<?php
								if(!empty($postmeta["_format_video_embed"][0])) {
									echo wp_oembed_get(esc_url($postmeta["_format_video_embed"][0]));
								} ?>
								<?php get_template_part('includes/loops/loop-meta-blog','category'); ?>				
								<?php get_template_part('includes/boxes/loopBlog','category'); ?>
							</div>	
						</div>
					<?php } 
					
					if ( has_post_format( 'link' , get_the_id())) {
						get_template_part('includes/post-formats/format-link','category');
					} 	
					
					if ( has_post_format( 'quote' , get_the_id())) {?>
						<div class="quote-category">
							<?php get_template_part('includes/post-formats/format-quote','category'); ?>	
						</div>	
					<?php } ?>
					
					<?php if ( has_post_format( 'audio' , get_the_id())) {?>
						<div class="blogpostcategory laura-audio">
							<?php get_template_part('includes/loops/loop-top-blog','category'); ?>	
							<div class="audioPlayerWrap">
								<div class="audioPlayer">
									<?php 
									if(isset($postmeta["_format_audio_embed"][0]))
										echo wp_oembed_get(esc_url($postmeta["_format_audio_embed"][0])) ?>
								</div>
							</div>
							<?php get_template_part('includes/loops/loop-meta-blog','category'); ?>			
							<?php get_template_part('includes/loops/loop-blog','category'); ?>		
						</div>	
					<?php } ?>					
					
					
					<?php if ( !get_post_format() ) {?>
						<div class="blogpostcategory">
							<?php get_template_part('includes/loops/loop-top-blog','category'); ?>				
							<?php if(laura_getImage(get_the_id(), 'laura-postBlock') != '') { ?>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
								<div class="blogimage">	
									<?php if(!empty($postmeta["laura_sigle_option_recipe"][0]) && !empty($postmeta["laura_sigle_option_recipe_hover"][0])){ ?>
										<div class="laura-hover-image-recipe"><?php echo laura_recipe_hover(); ?></div>
									<?php } ?>
									<?php echo laura_getImage(get_the_id(), 'laura-postBlock'); ?>
								</div></a>
							<?php } ?>
							<?php get_template_part('includes/loops/loop-meta-blog','category'); ?>				
							<?php get_template_part('includes/loops/loop-blog','category'); ?>								
						</div>
					
					<?php } ?>	
					
					<?php if(is_sticky()) { ?>
						</div>
					<?php } ?>
					
				<?php endwhile; ?>
					
				<?php
					get_template_part('includes/wp-pagenavi','navigation');
					if(function_exists('laura_wp_pagenavi')) { laura_wp_pagenavi(); }
				?>
						
			<?php else : ?>
				<div class="postcontent error-404">
					<?php $laura_data = get_option(OPTIONS); ?>
					<h1><?php laura_security($laura_data['errorpagetitle']) ?></h1>
					<div class="posttext">
						<?php laura_security($laura_data['errorpage']) ?>
					</div>
				</div>			
			<?php endif; ?>
				
		</div>
		<!-- sidebar -->
		<?php if(!laura_globals('use_fullwidth')) { ?>
			<?php if(is_active_sidebar( 'laura_sidebar' )) { ?>
				<div class="sidebar">	
					<?php dynamic_sidebar( 'laura_sidebar' ); ?>
				</div>
			<?php } ?>
		<?php } ?>
	</div>	
</div>											
