	<?php if(laura_data('excpert_lenght')){ $short = laura_data('excpert_lenght');}else{$short = 25;} ?>
	<div class="entry grid">
		<div class = "meta">		
			<div class="blogContent">
				<div class="topBlog">	
					<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ' ', 'laura' ) ) . '</em>'; ?> </div>
					<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','laura')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php get_template_part('includes/loops/loop-meta-blog','category-grid'); ?>
				</div>				
				<div class="blogcontent"><?php echo wp_trim_words(get_the_excerpt(),$short,'...') ?></div>
			<?php if(laura_globals('display_post_meta')) { ?>
			
				<div class="bottomBlog">
			
					<?php if(laura_globals('display_socials')) { ?>
					
					<div class="blog_social"> <?php esc_html_e('Share: ','laura') . laura_socialLinkSingle(get_the_permalink(),get_the_title())  ?></div>
					<?php } ?>
					
					 <!-- end of socials -->
					
					<?php if(laura_globals('display_reading')) { ?>
					<div class="blog_time_read">
						<?php echo esc_html__('Reading time: ','laura') . esc_attr(laura_estimated_reading_time(get_the_ID())) . esc_html__(' min','laura') ; ?>
					</div>
					<?php } ?>
					<!-- end of reading -->
					<div class="laura-read-more"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to ','laura'); ?><?php the_title_attribute(); ?>"><?php esc_attr_e('Continue reading','laura') ?></a></div>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
				</div> 
		
		<?php } ?> <!-- end of bottom blog -->
			</div>
		</div>		
	</div>
