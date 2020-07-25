<!-- main content start -->
<div class="mainwrap blog <?php if(is_front_page()) echo 'home' ?> <?php if(!laura_globals('use_fullwidth')) echo 'sidebar' ?> grid">
	<?php if(!is_front_page()) { ?>
		<div class="laura-breadcrumb">
			<div class="browsing"><?php esc_attr_e('Browsing Category','laura'); ?></div>
			<?php echo laura_breadcrumb(); ?>
		</div>
	<?php } ?>
	<div class="main clearfix">		
		<div class="content blog">
			<div id="pmc-tabs">
				<?php if(is_front_page()) { ?>
				<ul>
				<li><a class="tab1" href="#tabs-1"><?php esc_html_e('Recent posts','laura'); ?></a></li>
				<li><a class="tab2" href="#tabs-2"><?php esc_html_e('Popular posts','laura'); ?></a></li>
				</ul>
				<?php } ?>
				<div class="pmc-tabs">
					<div id="tabs-1" >
					<?php  get_template_part('category-grid-latest','latest-post'); ?>
					</div>
					<?php if(is_front_page()) { ?>
					<div id="tabs-2" >
					<?php get_template_part('category-grid-popular','popular-post'); ?>
					</div>
					<?php } ?>
				</div>
			</div>		
			<div class="infinity-more"><?php esc_html_e('Load more posts','laura'); ?></div>
			<div class="infinity-more-loading"><i  class="fa fa-spinner fa-spin"></i></div>
			<div class="navi-grid">
				<?php
					get_template_part('includes/wp-pagenavi','navigation');
					if(function_exists('laura_wp_pagenavi')) { laura_wp_pagenavi(); }
				?>
			</div>
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
