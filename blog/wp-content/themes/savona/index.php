<?php 

get_header();

if ( is_home() && !is_paged() ) {

	if ( savona_options( 'featured_slider_label' ) === true || savona_options( 'featured_links_label' ) === true ) {
		// Featured Slider, Carousel
		if ( savona_options( 'featured_slider_label' ) === true ) {
			get_template_part( 'templates/header/featured', 'slider' );
		}

		// Featured Links, Banners
		if ( savona_options( 'featured_links_label' ) === true ) {
			get_template_part( 'templates/header/featured', 'links' ); 
		}
	}
}

?>

<div class="main-content clear-fix<?php echo esc_attr(savona_options( 'general_content_width' )) === 'boxed' ? ' boxed-wrapper': ''; ?>" data-layout="<?php echo esc_attr( savona_page_layout() ); ?>" data-sidebar-sticky="<?php echo esc_attr( savona_options( 'general_sidebar_sticky' )  ); ?>">
	
	<?php
	
	// Sidebar Left
	get_template_part( 'templates/sidebars/sidebar', 'left' ); 

	// Blog Grid Wrapper
	get_template_part( 'templates/grid/blog', 'grid' );

	// Sidebar Right
	get_template_part( 'templates/sidebars/sidebar', 'right' ); 

	?>

</div>

<?php get_footer(); ?>