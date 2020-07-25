<?php

// Open Links in New Tab
$links_window = ( savona_options( 'featured_links_window' ) === true )?'_blank':'_self';

?>

<div id="featured-links" class="<?php echo esc_attr(savona_options( 'general_links_width' )) === 'boxed' ? ' boxed-wrapper': ''; ?> clear-fix">

	<!-- Link 1 -->
	<?php if ( savona_options( 'featured_links_image_1' ) !== '' ): ?>
	<div class="featured-link">
		<img src="<?php echo esc_url( wp_get_attachment_url( savona_options( 'featured_links_image_1' ) ) ); ?>" alt="Link 1">
		<a href="<?php echo esc_url( savona_options( 'featured_links_url_1' ) ); ?>" target="<?php echo esc_attr($links_window); ?>">
			<div class="cv-outer">
				<div class="cv-inner">
					<h4><?php echo esc_html( savona_options( 'featured_links_title_1' ) ); ?></h4>
				</div>
			</div>
		</a>
	</div>
	<?php endif; ?>

	<!-- Link 2 -->
	<?php if ( savona_options( 'featured_links_image_2' ) !== '' ): ?>
	<div class="featured-link">
		<img src="<?php echo esc_url( wp_get_attachment_url( savona_options( 'featured_links_image_2' ) ) ); ?>" alt="Link 2">
		<a href="<?php echo esc_url( savona_options( 'featured_links_url_2' ) ); ?>" target="<?php echo esc_attr($links_window); ?>">
			<div class="cv-outer">
				<div class="cv-inner">
					<h4><?php echo esc_html( savona_options( 'featured_links_title_2' ) ); ?></h4>
				</div>
			</div>
		</a>
	</div>
	<?php endif; ?>

	<!-- Link 3 -->
	<?php if ( savona_options( 'featured_links_image_3' ) !== '' ): ?>
	<div class="featured-link">
		<img src="<?php echo esc_url( wp_get_attachment_url( savona_options( 'featured_links_image_3' ) ) ); ?>" alt="Link 3">
		<a href="<?php echo esc_url( savona_options( 'featured_links_url_3' ) ); ?>" target="<?php echo esc_attr($links_window); ?>">
			<div class="cv-outer">
				<div class="cv-inner">
					<h4><?php echo esc_html( savona_options( 'featured_links_title_3' ) ); ?></h4>
				</div>
			</div>
		</a>
	</div>
	<?php endif; ?>

</div><!-- #featured-links -->