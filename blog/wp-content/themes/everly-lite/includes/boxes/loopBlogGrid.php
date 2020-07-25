	
	<div class="entry grid">
		<div class = "meta">		
			<div class="blogContent">
				<div class="topBlog">	
					<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ', ', 'everly-lite' ) ) . '</em>'; ?> </div>
					<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php if(everly_globals('display_post_meta')) { ?>
					<div class = "post-meta">
						<?php 
						$day = get_the_time('d');
						$month= get_the_time('m');
						$year= get_the_time('Y');
						?>
						<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_time('F j, Y') ?></a> <a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','everly-lite'); echo get_the_author(); ?></a> <a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>				
					</div>
					<?php } ?> <!-- end of post meta -->
				</div>				
				<div class="blogcontent"><?php the_excerpt() ?></div>
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
