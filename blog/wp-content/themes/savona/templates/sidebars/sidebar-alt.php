<?php

// check if available
if ( ! is_active_sidebar( 'sidebar-alt' ) || savona_options( 'main_nav_show_sidebar' ) === false ) {
	return;
}

?>

<div class="sidebar-alt-wrap">
	<div class="sidebar-alt-close image-overlay"></div>
	<aside class="sidebar-alt">

		<div class="sidebar-alt-close-btn">
			<span></span>
			<span></span>
		</div>

		<?php dynamic_sidebar( 'sidebar-alt' ); ?>
		
	</aside>
</div>