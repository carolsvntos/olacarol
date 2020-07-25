<?php $postmeta = get_post_custom(get_the_id());   ?>
<?php if(laura_globals('display_post_meta')) { ?>
	<div class = "post-meta">
		<?php 
		$day = get_the_time('d');
		$month= get_the_time('m');
		$year= get_the_time('Y');
		?>
		<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_date() ?></a> <a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','laura'); echo get_the_author(); ?></a> 
		<?php if(empty($postmeta["laura_sigle_option_recipe"][0])){ ?>
			<a href="<?php echo the_permalink() ?>#comments"><?php comments_number(); ?></a>		
		<?php } else { ?>
			<?php echo esc_html__('Recipe rating: ','laura') . esc_attr(laura_recipe('wprm_rating')) ; ?>
		<?php } ?>		
			
	</div>
<?php } ?> <!-- end of post meta -->	