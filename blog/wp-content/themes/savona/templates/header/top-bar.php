<?php if ( savona_options( 'top_bar_label' ) === true ) : ?>

<div id="top-bar" class="clear-fix">
	<div <?php echo esc_attr(savona_options( 'general_header_width' )) === 'contained' ? 'class="boxed-wrapper"': ''; ?>>
		
		<?php

		// Menu
		if ( savona_options( 'top_bar_show_menu' ) === true ) {
			wp_nav_menu( array(
				'theme_location' 	=> 'top',
				'menu_id' 		 	=> 'top-menu',
				'menu_class' 		=> '',
				'container' 	 	=> 'nav',
				'container_class'	=> 'top-menu-container',
				'fallback_cb' 		=> 'top_menu_fallback'
			) );
		}
		
		// Social Icons
		if ( savona_options( 'top_bar_show_socials' ) === true ) {	
			savona_social_media( 'top-bar-socials' );
		}

		?>

	</div>
</div><!-- #top-bar -->

<?php endif; ?>