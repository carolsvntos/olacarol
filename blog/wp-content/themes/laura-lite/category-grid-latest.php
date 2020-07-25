
	<?php if (have_posts()) : ?>
	<?php $i = 0; ?>
	<?php while (have_posts()) : the_post(); ?>
	<?php 
	if ( has_post_format( 'link' , get_the_id())) {
		continue;
	} 	
	
	$i++; ?>

	<?php if(is_sticky(get_the_id())) { ?>
	<div class="laura_sticky">
	<?php } ?>
	<?php
	$postmeta = get_post_custom(get_the_id()); ?>

	<?php 
	if ( has_post_format( 'video' , get_the_id())) { ?>
	<div class="<?php if( ($i) % 2 == 0) echo 'last';?> slider-category">
	
		<div class="blogpostcategory">			
			<?php
			if(!empty($postmeta["_format_video_embed"][0])) {
				echo wp_oembed_get(esc_url($postmeta["_format_video_embed"][0]),array('width'=>300,'height'=>200));
			} ?>
			<?php get_template_part('includes/loops/loop-blog-grid','single'); ?>
		</div>
		
	</div>
	<?php } 
	
	if ( has_post_format( 'quote' , get_the_id())) {?>
	<div class="quote-category <?php if( ($i) % 2 == 0) echo 'last';?>">
		<?php get_template_part('includes/post-formats/format-quote','category-grid'); ?>	
	</div>
	
	<?php 
	} 			
	?>
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

			<a class="overdefultlink" href="<?php the_permalink() ?>">
			<div class="overdefult">
			</div>
			</a>

			<div class="blogimage">	
				<div class="loading"></div>		
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php echo laura_getImage(get_the_id(), 'laura-postGridBlock'); ?></a>
			</div>
			<?php } ?>
			<?php get_template_part('includes/loops/loop-blog-grid','single'); ?>
	</div>
	
	<?php } ?>		
	<?php if(is_sticky()) { ?>
		</div>
	<?php } ?>
	
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
				
	<?php endif; ?>

