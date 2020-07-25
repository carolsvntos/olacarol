<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" >
<!-- start -->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="format-detection" content="telephone=no">
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) {wp_enqueue_script( 'comment-reply' ); }?>
	
	<?php wp_head();?>
</head>		
<!-- start body -->
<body <?php body_class(); ?> >
	<!-- start header -->
			<!-- fixed menu -->		
			<?php 
			?>	
			
			<div class="pagenav fixedmenu">						
				<div class="holder-fixedmenu">							
					<div class="logo-fixedmenu">								
					<?php if(everly_globals('scroll_logo')){ ?>
						<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(everly_data('scroll_logo')); ?>" alt="<?php bloginfo('name'); ?> - <?php bloginfo('description') ?>" ></a>
					<?php } ?>
					</div>
						<div class="menu-fixedmenu home">
						<?php
						if ( has_nav_menu( 'everly_scrollmenu' ) ) {
						wp_nav_menu( array(
						'container' =>false,
						'container_class' => 'menu-scroll',
						'theme_location' => 'everly_scrollmenu',
						'echo' => true,
						'fallback_cb' => 'everly_fallback_menu',
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'walker' => new everly_Walker_Main_Menu())
						);
						}
						?>	
					</div>
				</div>	
			</div>
				<header>
				<!-- top bar -->
				<?php if(everly_globals('top_bar')) { ?>
					<div class="top-wrapper">
						<div class="top-wrapper-content">
							<div class="top-left">
								<?php dynamic_sidebar( 'everly_sidebar-top-left' ); ?>
							</div>
							<div class="top-right">
								<?php dynamic_sidebar( 'everly_sidebar-top-right' ); ?>
							</div>
						</div>
					</div>
					<?php } ?>			
					<div id="headerwrap">			
						<!-- logo and main menu -->
						<div id="header">
							<!-- respoonsive menu main-->
							<!-- respoonsive menu no scrool bar -->
							<div class="respMenu noscroll">
								<div class="resp_menu_button"><i class="fa fa-list-ul fa-2x"></i></div>
								<?php 
								if ( has_nav_menu( 'everly_respmenu' ) ) {
									$menuParameters =  array(
									  'theme_location' => 'everly_respmenu', 
									  'walker'         => new everly_Walker_Responsive_Menu(),
									  'echo'            => false,
									  'container_class' => 'menu-main-menu-container',
									  'items_wrap'     => '<div class="event-type-selector-dropdown">%3$s</div>',
									);
									echo strip_tags(wp_nav_menu( $menuParameters ), '<a>,<br>,<div>,<i>,<strong>' );
								}
								?>	
							</div>	
							<!-- logo -->
							<div class="logo-inner">
								<div id="logo" class="<?php if(is_active_sidebar( 'everly_sidebar-logo' )) { echo 'logo-sidebar'; } ?>">
									<?php $logo = esc_url(everly_data('logo')); ?>
									<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php if (!empty($logo)) {?>
									<?php echo esc_url($logo); ?><?php } else {?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php }?>" alt="<?php bloginfo('name'); ?> - <?php bloginfo('description') ?>" /></a>
								</div>
								<?php if(is_active_sidebar( 'everly_sidebar-logo' )) { ?> 
									<div class="logo-advertise">
										<?php dynamic_sidebar( 'everly_sidebar-logo' ); ?>
									</div>
								<?php } ?>									
							</div>	
							
							<!-- main menu -->
							<div class="pagenav"> 	
								<div class="pmc-main-menu">
								<?php
									if ( has_nav_menu( 'everly_mainmenu' ) ) {	
										wp_nav_menu( array(
										'container' =>false,
										'container_class' => 'menu-header home',
										'menu_id' => 'menu-main-menu-container',
										'theme_location' => 'everly_mainmenu',
										'echo' => true,
										'fallback_cb' => 'everly_fallback_menu',
										'before' => '',
										'after' => '',
										'link_before' => '',
										'link_after' => '',
										'depth' => 0,
										'walker' => new everly_Walker_Main_Menu()));								
									} ?>											
								</div> 	
							</div> 
						</div>
					</div> 							
					<?php
					include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
					if(is_plugin_active( 'revslider/revslider.php')){						
						if(everly_globals('rev_slider') && is_front_page() ){ ?>
							<div id="everly-slider-wrapper">
								<div id="everly-slider">
									<?php putRevSlider(everly_data('rev_slider'),"homepage") ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>							
				
					<?php 					
					if(is_front_page() && everly_globals('use_block1')){ ?>
						<?php everly_block_one(); ?>
					<?php } ?>	
					<?php if(is_front_page() && everly_globals('use_block2') ){ ?>	
						<?php everly_block_two(); ?>
					<?php } ?>
				</header>	
				<?php if(is_front_page()){ ?>
				<div class="sidebars-wrap top">
					<div class="sidebars">
						<div class="sidebar-left-right">
							<div class="left-sidebar">
								<?php dynamic_sidebar( 'everly_sidebar-under-header-left' ); ?>
							</div>
							<div class="right-sidebar">
								<?php dynamic_sidebar( 'everly-sidebar-under-header-right' ); ?>
							</div>
						</div>					
						<div class="sidebar-fullwidth">
							<?php dynamic_sidebar( 'everly-sidebar-under-header-fullwidth' ); ?>
						</div>				
					</div>
				</div>
				<?php } ?>		