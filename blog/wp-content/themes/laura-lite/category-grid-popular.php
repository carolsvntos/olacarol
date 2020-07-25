<?php 
$args = array(
  'posts_per_page'  => 9,  /* get 4 posts, or set -1 for all */
  'orderby'      => 'meta_value_num',  /* this will look at the meta_key you set below */
  'meta_key'     => 'post_views_count',
  'order'        => 'DESC',
  'post_type' => 'post',
  'post_status'  => 'publish'
);
$popular_post = new WP_Query( $args );
$i = 0; ?>
<?php if ($popular_post->have_posts()) : while ($popular_post->have_posts()) : $popular_post->the_post();
		$postmeta = get_post_custom(get_the_id()); 
		$i++;	
		if ( has_post_format( 'video' , get_the_id())) { ?>
			<div class="slider-category <?php if( ($i) % 2 == 0) echo 'last';?>">
				<div class="blogpostcategory">			
					<?php
					if(!empty($postmeta["_format_video_embed"][0])) {
						echo wp_oembed_get(esc_url($postmeta["_format_video_embed"][0]),array('width'=>300,'height'=>200));
					} ?>
					<?php get_template_part('includes/loops/loop-blog-grid','single'); ?>
				</div>
				
			</div>
		<?php } 
		
		if ( has_post_format( 'link' , get_the_id())) {
			$i--; continue;
		} 	
		if ( has_post_format( 'quote' , get_the_id())) {
			$i--; continue;
		 } ?>
		
		<?php if ( has_post_format( 'audio' , get_the_id())) {?>
		<div class="blogpostcategory <?php if( ($i) % 2 == 0) echo 'last';?>">		
			<div class="audioPlayerWrap">
				<div class="audioPlayer">
					<?php 
					if(isset($postmeta["_format_audio_embed"][0]))
						echo wp_oembed_get(esc_url($postmeta["_format_audio_embed"][0])) ?>
				</div>
			</div>
			<?php get_template_part('includes/loops/loop-blog-grid','single'); ?>		
		</div>	
		<?php
		}
		?>					
		
		
		<?php if ( !get_post_format() || has_post_format( 'gallery' , get_the_id())) {?>
			<div class="blogpostcategory <?php if( ($i) % 2 == 0) echo 'last';?>">	
				<?php if(laura_getImage(get_the_id(), 'laura-postGridBlock') != '') { ?>	
					<div class="blogimage">		
						<a href="<?php the_permalink() ?>" rel="bookmark" title=" <?php the_title(); ?>"><?php echo laura_getImage(get_the_id(), 'laura-postGridBlock'); ?></a>
					</div>
					<?php } ?>
					<?php get_template_part('includes/loops/loop-blog-grid','single'); ?>
			</div>
		<?php } ?>		
		
	<?php endwhile; ?>
					
<?php endif; ?>
			
<?php wp_reset_postdata(); ?>	