<?php get_header(); ?>


<!-- Page Content -->
<div class="main-content clear-fix<?php echo ( savona_options( 'general_single_width' ) === 'boxed'  ) ? ' boxed-wrapper': ''; ?>" data-layout="<?php echo esc_attr( savona_page_layout() ); ?>" data-sidebar-sticky="<?php echo esc_attr( savona_options( 'general_sidebar_sticky' )  ); ?>">


	<?php

	// Sidebar Alt 
	get_template_part( 'templates/sidebars/sidebar', 'alt' ); 

	// Sidebar Left
	get_template_part( 'templates/sidebars/sidebar', 'left' );

	?>

	<!-- Main Container -->
	<div class="main-container">

		<?php

		// Single Post
		get_template_part( 'templates/single/post', 'content' );

		// Author Description
		if ( savona_options( 'single_page_show_author_desc' ) === true ) {
			get_template_part( 'templates/single/author', 'description' );
		}

		// Single Navigation
		if ( savona_options( 'single_page_show_author_nav' ) === true ) {
			get_template_part( 'templates/single/single', 'navigation' );
		}
	
		// Related Posts
		if ( savona_options( 'single_page_related_orderby' ) !== 'none' ) {
			savona_related_posts( savona_options( 'single_page_related_title' ), savona_options( 'single_page_related_orderby' ) );
		}

		// Comments
		if ( savona_options( 'single_page_show_comments_area' ) === true ) {
			get_template_part( 'templates/single/comments', 'area' );
		}

		?>

	</div><!-- .main-container -->


	<?php // Sidebar Right

	get_template_part( 'templates/sidebars/sidebar', 'right' );

	?>

</div><!-- #page-content -->

<?php get_footer(); ?>