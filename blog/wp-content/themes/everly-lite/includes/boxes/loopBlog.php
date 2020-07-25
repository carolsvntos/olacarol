	
	<div class="entry">
		<div class = "meta">		
			<div class="blogContent">
				<div class="blogcontent"><?php the_content() ?></div>
			<?php if(everly_globals('display_post_meta')) { ?>
			
				<div class="bottomBlog">
			
					<?php if(everly_globals('display_socials')) { ?>
					
					<div class="blog_social"> <?php esc_html_e('Share: ','everly-lite') . everly_socialLinkSingle(get_the_permalink(),get_the_title())  ?></div>
					<?php } ?>
					 <!-- end of socials -->
					
					<?php if(everly_globals('display_reading')) { ?>
					<div class="blog_time_read">
						<?php echo esc_html__('Reading time: ','everly-lite') . esc_attr(everly_estimated_reading_time(get_the_ID())) . esc_html__(' min','everly-lite') ; ?>
					</div>
					<?php } ?>
					<!-- end of reading -->
				</div> 
		
		<?php } ?> <!-- end of bottom blog -->
			</div>
			
			
		
</div>		
	</div>
