<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" >
<!-- start -->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="format-detection" content="telephone=no">
	
	<?php wp_head();?>
</head>		
<!-- start body -->
<body <?php body_class(); ?> >
	<!-- start header -->
			<!-- fixed menu -->		
			<?php 
			?>	
			<?php if(laura_globals('display_scroll')) { ?>
			<div class="pagenav fixedmenu">						
				<div class="holder-fixedmenu">							
					<div class="logo-fixedmenu">								
					<?php if(laura_globals('scroll_logo') && !laura_globals('use_site_title')){ ?>
						<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(laura_data('scroll_logo')); ?>" data-rjs="3" alt="<?php esc_html(bloginfo('name')); ?> - <?php esc_html(bloginfo('description')) ?>" ></a>
					<?php } else { ?>
						<a class = "blog-name-scroll" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
					<?php } ?>
					</div>
						<div class="menu-fixedmenu home">
						<?php
						if ( has_nav_menu( 'laura_scrollmenu' ) ) {
						wp_nav_menu( array(
						'container' =>false,
						'container_class' => 'menu-scroll',
						'theme_location' => 'laura_scrollmenu',
						'echo' => true,
						'fallback_cb' => 'laura_fallback_menu',
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'walker' => new laura_Walker_Main_Menu())
						);
						}
						?>	
					</div>
				</div>	
			</div>
			<?php } ?>
				<header>
				<!-- top bar -->
				<?php if(laura_globals('top_bar')) { ?>
					<div class="top-wrapper">
						<div class="top-wrapper-content">
							<div class="top-left">
								<?php if(is_active_sidebar( 'laura_sidebar-top-left' )) { ?>
									<?php dynamic_sidebar( 'laura_sidebar-top-left' ); ?>
								<?php } ?>
							</div>
							<div class="top-right">
								<?php if(is_active_sidebar( 'laura_sidebar-top-right' )) { ?>
									<?php dynamic_sidebar( 'laura_sidebar-top-right' ); ?>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>			
					<div id="headerwrap">			
						<!-- logo and main menu -->
						<div id="header">
							<div class="header-image">
							<!-- respoonsive menu main-->
							<!-- respoonsive menu no scrool bar -->
							<div class="respMenu noscroll">
								<div class="resp_menu_button"><i class="fa fa-list-ul fa-2x"></i></div>
								<?php 
								if ( has_nav_menu( 'laura_respmenu' ) ) {
									$menuParameters =  array(
									  'theme_location' => 'laura_respmenu', 
									  'walker'         => new laura_Walker_Responsive_Menu(),
									  'echo'            => false,
									  'container_class' => 'menu-main-menu-container',
									  'items_wrap'     => '<div class="event-type-selector-dropdown">%3$s</div>',
									);
									echo strip_tags(wp_nav_menu( $menuParameters ), '<a>,<br>,<div>,<i>,<strong>' );
								}
								?>	
							</div>	
							<!-- logo -->
							<?php if(laura_data('logo_position') == 1 ){ 
								laura_logo();
							} ?>
							</div>
							<!-- main menu -->
							<div class="pagenav <?php if( laura_data('logo_position') == 3  ){ echo 'logo-left-menu'; } ?>"> 	
							<?php if( laura_data('logo_position') == 3  ){ 
									laura_logo();
								} ?>								
								<div class="pmc-main-menu">
								<?php
									if ( has_nav_menu( 'laura_mainmenu' ) ) {	
										wp_nav_menu( array(
										'container' =>false,
										'container_class' => 'menu-header home',
										'menu_id' => 'menu-main-menu-container',
										'theme_location' => 'laura_mainmenu',
										'echo' => true,
										'fallback_cb' => 'laura_fallback_menu',
										'before' => '',
										'after' => '',
										'link_before' => '',
										'link_after' => '',
										'depth' => 0,
										'walker' => new laura_Walker_Main_Menu()));								
									} ?>											
								</div> 	
							</div> 
							<?php if(laura_data('logo_position') == 2){ 
								laura_logo();
							} ?>							
						</div>
					</div> 												
				</header>	
				<?php
				if(function_exists( 'putRevSlider')){						
					if(laura_globals('use_rev_slider_home') && is_front_page() ){ ?>
						<div id="laura-slider-wrapper">
							<div id="laura-slider">
								<?php putRevSlider(laura_data('rev_slider'),"homepage") ?>
							</div>
						</div>
					<?php } ?>
				<?php } ?>		
				<?php 					
				if(is_front_page() && laura_globals('use_categories')){ ?>
						<?php laura_block_one(); ?>
					<?php } ?>	
					<?php if(is_front_page() && laura_globals('use_block2') ){ ?>	
						<?php laura_block_two(); ?>
					<?php } ?>				
				<?php if(is_front_page()){ ?>
				<?php laura_custom_layout(); ?>
				<?php } ?>				
