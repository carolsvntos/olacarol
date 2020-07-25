<?php $postmeta = get_post_custom(get_the_id());  ?> 
<?php if(!is_single()) { ?>
	<div class="topBlog">	
		<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ' ', 'laura' ) ) . '</em>'; ?> </div>
		<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to ','laura'); ?><?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php if(laura_globals('display_post_meta')) { ?>
			<div class = "post-meta">
				<?php 
				$day = get_the_time('d');
				$month= get_the_time('m');
				$year= get_the_time('Y');
				?>
				<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_date() ?></a> 
				<?php if(is_single()) { ?>
					<a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','laura'); echo get_the_author(); ?></a>
				<?php } ?>	
				<?php if(empty($postmeta["laura_sigle_option_recipe"][0])){ ?>
					<a href="<?php echo the_permalink() ?>#comments"><?php comments_number(); ?></a>		
				<?php } else { ?>
					<?php echo '<a class="recipe-rating" href="'. esc_url(get_the_permalink()) .'#comments">' . esc_html__('Recipe rating: ','laura')  . laura_recipe('wprm_rating').'</a>' ; ?>
				<?php } ?>		
					
			</div>
		<?php } ?>		
	</div>		
<?php } else { ?>
	<div class="topBlog">	
		<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ' ', 'laura' ) ) . '</em>'; ?> </div>
		<h1 class="title"> <?php the_title(); ?></h1>
		<?php if(laura_globals('display_post_meta')) { ?>
			<div class = "post-meta">
				<?php 
				$day = get_the_time('d');
				$month= get_the_time('m');
				$year= get_the_time('Y');
				?>
				<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_date() ?></a> 
				<?php if(is_single()) { ?>
					<a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','laura'); echo get_the_author(); ?></a>
				<?php } ?>	
				<?php if(empty($postmeta["laura_sigle_option_recipe"][0])){ ?>
					<a href="<?php echo the_permalink() ?>#comments"><?php comments_number(); ?></a>		
				<?php } else { ?>
					<?php echo '<a class="recipe-rating" href="'. esc_url(get_the_permalink()) .'#comments">' . esc_html__('Recipe rating: ','laura')  . laura_recipe('wprm_rating').'</a>' ; ?>
				<?php } ?>		
					
			</div>
		<?php } ?>			
	</div>			
<?php } ?>