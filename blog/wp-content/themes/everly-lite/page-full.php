<?php
/*
Template Name: Page fullwidth
*/
?>


<?php get_header();
 ?>

<!-- main content start -->
<div class="mainwrap">
	<!--rev slider-->
	<?php $everly_data_post = get_post_custom(get_the_id()); 
	if(isset($everly_data_post["custom_post_rev"][0]) && ($everly_data_post["custom_post_rev"][0] != 'empty') && function_exists('putRevSlider')) { ?>
		<div class="everly-rev-slider">
		<?php putRevSlider(esc_html($everly_data_post["custom_post_rev"][0])); ?>
		</div>
		<?php
	}
	?>	<div class="main clearfix">
		<div class="content  singlepage">
			<div class="postcontent">
				<div class="posttext">
					<h1><?php the_title(); ?></h1>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="usercontent"><?php the_content(); ?></div>
					<?php endwhile; endif; ?>
				</div>
			</div>
			
		</div>
		<?php comments_template(); ?>	
	</div>
</div>
<?php get_footer(); ?>