<?php $postmeta = get_post_custom(get_the_id());   ?>
<div class="entry">
	<div class = "meta">		
		<div class="blogContent">
			<div class="blogcontent"><?php the_content('') ?></div>
		
			<div class="bottomBlog">
				<div class="laura-read-more"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to ','laura'); ?><?php the_title_attribute(); ?>"><?php esc_attr_e('Continue reading','laura') ?></a></div>
				<?php if(laura_globals('display_reading')) { ?>
				<div class="blog_time_read">
					<?php if(empty($postmeta["laura_sigle_option_recipe"][0])){ ?>
						<?php echo esc_html__('Reading time: ','laura') . esc_attr(laura_estimated_reading_time(get_the_ID())) . esc_html__(' min','laura') ; ?>
					<?php } else { ?>
						<?php echo esc_html__('Cooking time: ','laura') . esc_attr(laura_recipe('wprm_total_time')) . esc_html__(' min','laura') ; ?>
					<?php } ?>
				</div>
				<?php } ?>
				<!-- end of reading -->
				<?php if(laura_globals('display_post_meta')) { ?>
				<div class="blog_author">
					<a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('Written by: ','laura'); echo get_the_author(); ?></a>
				</div>
				<?php } ?>				
				<!-- end of author -->
			</div> 
		</div>
	</div>		
</div>
