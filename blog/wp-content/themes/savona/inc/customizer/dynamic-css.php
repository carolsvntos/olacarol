<?php

function savona_dynamic_css() {

// begin style block
$css = '<style id="savona_dynamic_css">';

/*
** Reusable Functions =====
*/

// true/false validaiton
function savona_true_false( $option ) {
	if ( $option === true ) {
		return true;
	} else {
		return false;
	}
}



/*
** Colors =====
*/

	// Body
	if ( ! get_theme_mod('background_color') ) {
		$css .= '
			body {
				background-color: #ffffff;
			}
		';
	}

	// Top Bar
	$css .= '
		#top-bar {
		  background-color: '. esc_html(savona_options( 'colors_top_bar_bg' )) .';
		}

		#top-bar a {
		  color: '. esc_html(savona_options( 'colors_top_bar_link' )) .';
		}

		#top-bar a:hover,
		#top-bar li.current-menu-item > a,
		#top-bar li.current-menu-ancestor > a,
		#top-bar .sub-menu li.current-menu-item > a,
		#top-bar .sub-menu li.current-menu-ancestor> a {
		  color: '. esc_html(savona_options( 'colors_top_bar_link_hover' )) .';
		}
		
		#top-menu .sub-menu,
		#top-menu .sub-menu a {
		  	background-color: '. esc_html(savona_options( 'colors_top_bar_bg' )) .';
			border-color: '. esc_html(savona_hex2rgba( savona_options( 'colors_top_bar_link' ), 0.05 )) .';
		}
	';

	// Page Header
	$header_text_color = get_header_textcolor();
	$css .= '
		.header-logo a,
		.site-description {
			color: #'. esc_html( $header_text_color ) .';
		}

		.entry-header {
			background-color: '. esc_html(savona_options( 'colors_header_bg' )) .';
		}
	';
	
	// Main Navigation
	$css .= '

		#featured-links h4 {
			background-color: '. esc_html(savona_hex2rgba( savona_options( 'colors_main_nav_bg' ), 0.85 )) .';
			color: '. esc_html(savona_options( 'colors_main_nav_link' )) .';
		}

		#main-nav a,
		#main-nav i,
		#main-nav #s {
			color: '. esc_html(savona_options( 'colors_main_nav_link' )) .';
		}

		.main-nav-sidebar span,
		.sidebar-alt-close-btn span {
			background-color: '. esc_html(savona_options( 'colors_main_nav_link' )) .';
		}

		#main-nav a:hover,
		#main-nav i:hover,
		#main-nav li.current-menu-item > a,
		#main-nav li.current-menu-ancestor > a,
		#main-nav .sub-menu li.current-menu-item > a,
		#main-nav .sub-menu li.current-menu-ancestor> a {
			color: '. esc_html(savona_options( 'colors_content_accent' )) .';
		}

		.main-nav-sidebar:hover span {
			background-color: '. esc_html(savona_options( 'colors_content_accent' )) .';
		}

		#main-menu .sub-menu,
		#main-menu .sub-menu a {
			background-color: '. esc_html(savona_options( 'colors_main_nav_bg' )) .';
			border-color: '. esc_html(savona_hex2rgba( savona_options( 'colors_main_nav_link' ), 0.05 )) .';
		}

		#main-nav #s {
			background-color: '. esc_html(savona_options( 'colors_main_nav_bg' )) .';
		}

		#main-nav #s::-webkit-input-placeholder { /* Chrome/Opera/Safari */
			color: '. esc_html(savona_hex2rgba( savona_options( 'colors_main_nav_link' ), 0.7 )) .';
		}
		#main-nav #s::-moz-placeholder { /* Firefox 19+ */
			color: '. esc_html(savona_hex2rgba( savona_options( 'colors_main_nav_link' ), 0.7 )) .';
		}
		#main-nav #s:-ms-input-placeholder { /* IE 10+ */
			color: '. esc_html(savona_hex2rgba( savona_options( 'colors_main_nav_link' ), 0.7 )) .';
		}
		#main-nav #s:-moz-placeholder { /* Firefox 18- */
			color: '. esc_html(savona_hex2rgba( savona_options( 'colors_main_nav_link' ), 0.7 )) .';
		}
	';

	// Content
	$css .= '
		/* Background */
		.sidebar-alt,
		#featured-links,
		.main-content,
		#featured-slider,
		#page-content select,
		#page-content input,
		#page-content textarea {
			background-color: '. esc_html(savona_options( 'colors_content_bg' )) .';
		}

		/* Text */
		#page-content,
		#page-content select,
		#page-content input,
		#page-content textarea,
		#page-content .post-author a,
		#page-content .savona-widget a,
		#page-content .comment-author {
			color: '. esc_html(savona_options( 'colors_content_text' )) .';
		}

		/* Title */
		#page-content h1 a,
		#page-content h1,
		#page-content h2,
		#page-content h3,
		#page-content h4,
		#page-content h5,
		#page-content h6,
		.post-content > p:first-child:first-letter,
		#page-content .author-description h4 a,
		#page-content .related-posts h4 a,
		#page-content .blog-pagination .previous-page a,
      	#page-content .blog-pagination .next-page a,
      	blockquote,
		#page-content .post-share a {
			color: '. esc_html(savona_options( 'colors_content_title' )) .';
		}

		#page-content h1 a:hover {
			color: '. esc_html(savona_hex2rgba( savona_options( 'colors_content_title' ) , 0.75 )).';
		}
	
		/* Meta */
		#page-content .post-date,
		#page-content .post-comments,
		#page-content .post-author,
		#page-content .related-post-date,
		#page-content .comment-meta a,
		#page-content .author-share a,
		#page-content .post-tags a,
		#page-content .tagcloud a,
		.widget_categories li,
		.widget_archive li,
		.ahse-subscribe-box p,
		.rpwwt-post-author,
		.rpwwt-post-categories,
		.rpwwt-post-date,
		.rpwwt-post-comments-number {
			color: '. esc_html(savona_options( 'colors_content_meta' )) .';
		}

		#page-content input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		  color: '. esc_html(savona_options( 'colors_content_meta' )) .';
		}
		#page-content input::-moz-placeholder { /* Firefox 19+ */
		  color: '. esc_html(savona_options( 'colors_content_meta' )) .';
		}
		#page-content input:-ms-input-placeholder { /* IE 10+ */
		  color: '. esc_html(savona_options( 'colors_content_meta' )) .';
		}
		#page-content input:-moz-placeholder { /* Firefox 18- */
		  color: '. esc_html(savona_options( 'colors_content_meta' )) .';
		}
		
	
		/* Accent */
		#page-content a,
		.post-categories {
			color: '. esc_html(savona_options( 'colors_content_accent' )) .';
		}
		
		.ps-container > .ps-scrollbar-y-rail > .ps-scrollbar-y {
			background: '. esc_html(savona_options( 'colors_content_accent' )) .';
		}

		#page-content a:hover {
			color: '. esc_html(savona_hex2rgba( savona_options( 'colors_content_accent' ), 0.8 )) .';
		}

		blockquote {
			border-color: '. esc_html(savona_options( 'colors_content_accent' )) .';
		}


		/* Selection */
		::-moz-selection {
			color: #ffffff;
			background: '. esc_html(savona_options( 'colors_content_accent' )) .';
		}
		::selection {
			color: #ffffff;
			background: '. esc_html(savona_options( 'colors_content_accent' )) .';
		}

		/* Border */
		#page-content .post-footer,
		#page-content .author-description,
		#page-content .related-posts,
		#page-content .entry-comments,
		#page-content .savona-widget li,
		#page-content #wp-calendar,
		#page-content #wp-calendar caption,
		#page-content #wp-calendar tbody td,
		#page-content .widget_nav_menu li a,
		#page-content .tagcloud a,
		#page-content select,
		#page-content input,
		#page-content textarea,
		.widget-title h2:before,
		.widget-title h2:after,
		.post-tags a,
		.gallery-caption,
		.wp-caption-text,
		table tr,
		table th,
		table td,
		pre {
			border-color: '. esc_html(savona_options( 'colors_content_border' )) .';
		}

		hr {
			background-color: '. esc_html(savona_options( 'colors_content_border' )) .';
		}

		/* Buttons */
		.widget_search i,
		.widget_search #searchsubmit,
		.single-navigation i,
		#page-content .submit,
		#page-content .blog-pagination.numeric a,
		#page-content .blog-pagination.load-more a,
		#page-content .savona-subscribe-box input[type="submit"],
		#page-content .widget_wysija input[type="submit"],
		#page-content .post-password-form input[type="submit"],
		#page-content .wpcf7 [type="submit"] {
			color: '. esc_html(savona_options( 'colors_button_text' )) .';
			background-color: '. esc_html(savona_options( 'colors_button' )) .';
		}
		.single-navigation i:hover,
		#page-content .submit:hover,
		#page-content .blog-pagination.numeric a:hover,
		#page-content .blog-pagination.numeric span,
		#page-content .blog-pagination.load-more a:hover,
		#page-content .savona-subscribe-box input[type="submit"]:hover,
		#page-content .widget_wysija input[type="submit"]:hover,
		#page-content .post-password-form input[type="submit"]:hover,
		#page-content .wpcf7 [type="submit"]:hover {
			color: '. esc_html(savona_options( 'colors_button_hover_text' )) .';
			background-color: '. esc_html(savona_options( 'colors_content_accent' )) .';
		}


		/* Image Overlay */
		.image-overlay,
		#infscr-loading,
		#page-content h4.image-overlay {
			color: '. esc_html(savona_options( 'colors_overlay_text' )) .';
			background-color: '. esc_html(savona_hex2rgba( savona_options( 'colors_overlay' ), 0.3 )) .';
		}

		.image-overlay a,
		.post-slider .prev-arrow,
		.post-slider .next-arrow,
		#page-content .image-overlay a,
		#featured-slider .slick-arrow,
		#featured-slider .slider-dots {
			color: '. esc_html(savona_options( 'colors_overlay_text' )) .';
		}

		.slide-caption {
			background: '. esc_html(savona_hex2rgba( savona_options( 'colors_overlay_text' ), 0.95 )) .';
		}

		#featured-slider .slick-active {
			background: '. esc_html(savona_options( 'colors_overlay_text' )) .';
		}
	';

	// Footer
	$css .= '
		#page-footer,
		#page-footer select,
		#page-footer input,
		#page-footer textarea {
			background-color: '. esc_html(savona_options( 'colors_footer_bg' )) .';
			color: '. esc_html(savona_options( 'colors_footer_text' )) .';
		}

		#page-footer,
		#page-footer a,
		#page-footer select,
		#page-footer input,
		#page-footer textarea {
			color: '. esc_html(savona_options( 'colors_footer_text' )) .';
		}

		#page-footer #s::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		  color: '. esc_html(savona_options( 'colors_footer_text' )) .';
		}
		#page-footer #s::-moz-placeholder { /* Firefox 19+ */
		  color: '. esc_html(savona_options( 'colors_footer_text' )) .';
		}
		#page-footer #s:-ms-input-placeholder { /* IE 10+ */
		  color: '. esc_html(savona_options( 'colors_footer_text' )) .';
		}
		#page-footer #s:-moz-placeholder { /* Firefox 18- */
		  color: '. esc_html(savona_options( 'colors_footer_text' )) .';
		}

		/* Title */
		#page-footer h1,
		#page-footer h2,
		#page-footer h3,
		#page-footer h4,
		#page-footer h5,
		#page-footer h6 {
			color: '. esc_html(savona_options( 'colors_footer_title' )) .';
		}

		#page-footer a:hover {
			color: '. esc_html(savona_options( 'colors_content_accent' )) .';
		}

		/* Border */
		#page-footer a,
		#page-footer .savona-widget li,
		#page-footer #wp-calendar,
		#page-footer #wp-calendar caption,
		#page-footer #wp-calendar tbody td,
		#page-footer .widget_nav_menu li a,
		#page-footer select,
		#page-footer input,
		#page-footer textarea,
		#page-footer .widget-title h2:before,
		#page-footer .widget-title h2:after,
		.footer-widgets {
			border-color: '. esc_html(savona_options( 'colors_footer_border' )) .';
		}

		#page-footer hr {
			background-color: '. esc_html(savona_options( 'colors_footer_border' )) .';
		}
	';

	// Preloader
	$css .= '
		.savona-preloader-wrap {
			background-color: '. esc_html(savona_options( 'colors_preloader_bg' )) .';
		}
	';

/*
** General Layouts =====
*/
	// Site Width
	$css .= '
		.boxed-wrapper {
			max-width: '. (int)savona_options( 'general_site_width' ) .'px;
		}
	';
	
	// Sidebar Width
	$css .= '
		.sidebar-alt {
			width: '. ( (int)savona_options( 'general_sidebar_width' ) + 70 ) .'px;
			left: -'. ( (int)savona_options( 'general_sidebar_width' ) + 70 ) .'px; 
			padding: 85px 35px 0px;
		}

		.sidebar-left,
		.sidebar-right {
			width: '. ( (int)savona_options( 'general_sidebar_width' ) + (int)savona_options( 'blog_page_gutter_horz' ) ) .'px;
		}

		[data-layout*="rsidebar"] .main-container,
		[data-layout*="lsidebar"] .main-container {
			width: calc(100% - '. ( (int)savona_options( 'general_sidebar_width' ) + (int)savona_options( 'blog_page_gutter_horz' ) ) .'px);
			width: -webkit-calc(100% - '. ( (int)savona_options( 'general_sidebar_width' ) + (int)savona_options( 'blog_page_gutter_horz' ) ) .'px);
		}

		[data-layout*="lrsidebar"] .main-container {
			width: calc(100% - '. ( ( (int)savona_options( 'general_sidebar_width' ) + (int)savona_options( 'blog_page_gutter_horz' ) ) * 2 ) .'px);
			width: -webkit-calc(100% - '. ( ( (int)savona_options( 'general_sidebar_width' ) + (int)savona_options( 'blog_page_gutter_horz' ) ) * 2 ) .'px);
		}

		[data-layout*="fullwidth"] .main-container {
			width: 100%;
		}


	';

	// Padding
	$css .= '
	#top-bar > div,
	#main-nav > div,
	#featured-slider.boxed-wrapper,
	#featured-links,
	.main-content,
	.page-footer-inner {
		padding-left: '. (int)savona_options( 'general_content_padding' ) .'px;
		padding-right: '. (int)savona_options( 'general_content_padding' ) .'px;
	}
	';


/*
** Top Bar =====
*/
	// Transparent
	if ( savona_true_false(savona_options( 'top_bar_transparent' )) === true ) {
		$css .= '
			#top-bar {
				position: absolute;
				top: 0;
				left: 0;
				z-index: 10;
				width: 100%;
				background-color: transparent !important;
			}
			.admin-bar #top-bar {
				top: 32px;
			}
		'; 
	}

	// Align
	if ( esc_html(savona_options( 'top_bar_align' )) === 'left-right' ) {
		$css .= '
			#top-menu {
				float: left;
			}
			.top-bar-socials {
				float: right;
			}
		'; 
	} elseif ( esc_html(savona_options( 'top_bar_align' )) === 'right-left' ) {
		$css .= '
			#top-menu {
				float: right;
			}
			.top-bar-socials {
				float: left;
			}
		'; 
	}


/*
** Page Header =====
*/
	// Height / Background
	$css .= '
		.entry-header {
			background-image:url('. esc_url( get_header_image() ) .');
		}
	';

	// Header Logo
	$css .= '
		.logo-img {
			max-width: '. (int)savona_options( 'title_tagline_logo_width' ) .'px;
		}
	';


/*
** Main Navigation =====
*/
	
	// Align
	$css .= '
		#main-nav {
			text-align: '. esc_html(savona_options( 'main_nav_align' )) .';
		}
	';

	if ( savona_options( 'main_nav_align' ) === 'center' ) {
		$css .= '
			.main-nav-sidebar {
			  position: absolute;
			  top: 0px;
			  left: '. esc_html(savona_options( 'general_content_padding' )) .'px;
			  z-index: 1;
			}
						
			.main-nav-icons {
			  position: absolute;
			  top: 0px;
			  right: '. esc_html(savona_options( 'general_content_padding' )) .'px;
			  z-index: 2;
			}
		';
	} else {
		$css .= '
			.main-nav-sidebar {
			  float: left;
			  margin-right: 15px;
			}
						
			.main-nav-icons {
			 float: right;
			 margin-left: 15px;
			}
		';
	}


/*
** Featured Slider =====
*/

	if ( esc_html(savona_options( 'main_nav_position' )) === 'below' ) {
		$css .= '
			#featured-slider.boxed-wrapper {
			  padding-top: 41px;
			}
		';
	}
	

/*
** Featured Links =====
*/
	// Layout
	$featured_links = array(
		esc_url(savona_options( 'featured_links_image_1' )),
		esc_url(savona_options( 'featured_links_image_2' )),
		esc_url(savona_options( 'featured_links_image_3' )),
		esc_url(savona_options( 'featured_links_image_4' )),
		esc_url(savona_options( 'featured_links_image_5' ))
	);

	$featured_links = savona_true_false(savona_options( 'featured_links_fill' )) ? array_filter( $featured_links ) : $featured_links;
	$featured_links_gutter = 0;

	// Gutter
	if ( savona_true_false(savona_options( 'featured_links_gutter_horz' )) === true ) {
		$featured_links_gutter = 30;
		$css .= '
			#featured-links .featured-link {
				margin-right: '. $featured_links_gutter .'px;
			}
			#featured-links .featured-link:last-of-type {
				margin-right: 0;
			}
		';
	}

	// Columns
	$css .= '
		#featured-links .featured-link {
			width: calc( (100% - '. ( (count(array_filter($featured_links)) - 1) * $featured_links_gutter ) .'px) / '. count( $featured_links ) .');
			width: -webkit-calc( (100% - '. ( (count(array_filter($featured_links)) - 1) * $featured_links_gutter ) .'px) / '. count( $featured_links ) .');
		}
	';


/*
** Blog Page =====
*/

	// Gutter
	$css .= '	
		.blog-grid > li {
			margin-bottom: ' . (int)savona_options( 'blog_page_gutter_vert' ) . 'px;
		}


		[data-layout*="col2"] .blog-grid > li,
		[data-layout*="col3"] .blog-grid > li,
		[data-layout*="col4"] .blog-grid > li {
			display: inline-block;
			vertical-align: top;
			margin-right: '. (int)savona_options( 'blog_page_gutter_horz' ) .'px;
		}

		[data-layout*="col2"] .blog-grid > li:nth-of-type(2n+2),
		[data-layout*="col3"] .blog-grid > li:nth-of-type(3n+3),
		[data-layout*="col4"] .blog-grid > li:nth-of-type(4n+4) {
			margin-right: 0;
		}
		
		[data-layout*="col1"] .blog-grid > li {
			width: 100%;
		}

		[data-layout*="col2"] .blog-grid > li {
			width: calc((100% - ' . (int)savona_options( 'blog_page_gutter_horz' ) . 'px ) /2);
			width: -webkit-calc((100% - ' . (int)savona_options( 'blog_page_gutter_horz' ) . 'px ) /2);
		}

		[data-layout*="col3"] .blog-grid > li {
			width: calc((100% - 2 * ' . ( (int)savona_options( 'blog_page_gutter_horz' ) ) . 'px ) /3);
			width: -webkit-calc((100% - 2 * ' . ( (int)savona_options( 'blog_page_gutter_horz' ) ) . 'px ) /3);
		}

		[data-layout*="col4"] .blog-grid > li {
			width: calc((100% - 3 * ' . ( (int)savona_options( 'blog_page_gutter_horz' ) ) . 'px ) /4);
			width: -webkit-calc((100% - 3 * ' . ( (int)savona_options( 'blog_page_gutter_horz' ) ) . 'px ) /4);
		}

		[data-layout*="rsidebar"] .sidebar-right {
			padding-left: ' . (int)savona_options( 'blog_page_gutter_horz' ) . 'px;
		}

		[data-layout*="lsidebar"] .sidebar-left {
			padding-right: ' . (int)savona_options( 'blog_page_gutter_horz' ) . 'px;
		}

		[data-layout*="lrsidebar"] .sidebar-right {
			padding-left: ' . (int)savona_options( 'blog_page_gutter_horz' ) . 'px;
		}

		[data-layout*="lrsidebar"] .sidebar-left {
			padding-right: ' . (int)savona_options( 'blog_page_gutter_horz' ) . 'px;
		}
	';

	// Blog Page Dropcups
	if ( savona_true_false(savona_options( 'blog_page_show_dropcaps' )) === true && !is_single() && !is_page() ) {
		$css .= '
			
			.post-content > p:first-child:first-letter { /* MOD */
			  float: left;
			  margin: 0px 12px 0 0;
			  font-size: 80px;
			  line-height: 65px;
			  text-align: center;
			}

			@-moz-document url-prefix() {
				.post-content > p:first-child:first-letter {
				    margin-top: 10px !important;
				}
			}
		';
	}

	// Single Page Dropcups
	if ( savona_true_false(savona_options( 'single_page_show_dropcaps' )) === true && is_single() ) {
		$css .= '
			.post-content > p:first-child:first-letter { /* MOD */
			  float: left;
			  margin: 0px 12px 0 0;
			  font-size: 80px;
			  line-height: 65px;
			  text-align: center;
			}

			@-moz-document url-prefix() {
				.post-content > p:first-child:first-letter {
				    margin-top: 10px !important;
				}
			}
		';
	}


/*
** Page Footer =====
*/

	// Widget Columns
	if ( esc_html(savona_options( 'page_footer_columns' )) === 'three' ) {
		$css .= '
			.footer-widgets > .savona-widget {
				width: 30%;
				margin-right: 5%;
			}

			.footer-widgets > .savona-widget:nth-child(3n+3) {
				margin-right: 0;
			}

			.footer-widgets > .savona-widget:nth-child(3n+4) {
				clear: both;
			}
		';
	}

	if ( esc_html(savona_options( 'page_footer_columns' )) === 'four' ) {
		$css .= '
			.footer-widgets > .savona-widget {
				width: 22%;
				margin-right: 4%;
			}

			.footer-widgets > .savona-widget:nth-child(4n+4) {
				margin-right: 0;
			}

			.footer-widgets > .savona-widget:nth-child(4n+5) {
				clear: both;
			}
		';
	}



	// Align

	if ( esc_html(savona_options( 'page_footer_align' )) === 'center' ) {
		$css .= '
			.footer-copyright {
				text-align: center;
			}
		'; 
	} elseif ( esc_html(savona_options( 'page_footer_align' )) === 'left-right' ) {
		$css .= '
			.copyright-info {
				float: left;
			}
			.footer-socials {
				float: right;
			}
		'; 
	} elseif ( esc_html(savona_options( 'page_footer_align' )) === 'right-left' ) {
		$css .= '
			.copyright-info {
				float: right;
			}
			.footer-socials {
				float: left;
			}
		'; 
	}


/*
** Woocommerce =====
*/

	/* Text */
	$css .= '
		.woocommerce div.product .stock,
		.woocommerce div.product p.price,
		.woocommerce div.product span.price,
		.woocommerce ul.products li.product .price,
		.woocommerce-Reviews .woocommerce-review__author,
		.woocommerce form .form-row .required,
		.woocommerce form .form-row.woocommerce-invalid label,
		.woocommerce #page-content div.product .woocommerce-tabs ul.tabs li a {
		    color: '. esc_html(savona_options( 'colors_content_text' )) .';
		}

		.woocommerce a.remove:hover {
		    color: '. esc_html(savona_options( 'colors_content_text' )) .' !important;
		}
	';

	/* Meta */
	$css .= '
		.woocommerce a.remove,
		.woocommerce .product_meta,
		#page-content .woocommerce-breadcrumb,
		#page-content .woocommerce-review-link,
		#page-content .woocommerce-breadcrumb a,
		#page-content .woocommerce-MyAccount-navigation-link a,
		.woocommerce .woocommerce-info:before,
		.woocommerce #page-content .woocommerce-result-count,
		.woocommerce-page #page-content .woocommerce-result-count,
		.woocommerce-Reviews .woocommerce-review__published-date,
		.woocommerce .product_list_widget .quantity,
		.woocommerce .widget_products .amount,
		.woocommerce .widget_price_filter .price_slider_amount,
		.woocommerce .widget_recently_viewed_products .amount,
		.woocommerce .widget_top_rated_products .amount,
		.woocommerce .widget_recent_reviews .reviewer {
		    color: '. esc_html(savona_options( 'colors_content_meta' )) .';
		}

		.woocommerce a.remove {
		    color: '. esc_html(savona_options( 'colors_content_meta' )) .' !important;
		}
	';

	/* Accent */
	$css .= '
		p.demo_store,
		.woocommerce-store-notice,
		.woocommerce span.onsale {
		   background-color: '. esc_html(savona_options( 'colors_content_accent' )) .';
		}

		.woocommerce .star-rating::before,
		.woocommerce .star-rating span::before,
		.woocommerce #page-content ul.products li.product .button,
		#page-content .woocommerce ul.products li.product .button,
		#page-content .woocommerce-MyAccount-navigation-link.is-active a,
		#page-content .woocommerce-MyAccount-navigation-link a:hover {
		   color: '. esc_html(savona_options( 'colors_content_accent' )) .';
		}
	';

	/* Border Color */
	$css .= '
		.woocommerce form.login,
		.woocommerce form.register,
		.woocommerce-account fieldset,
		.woocommerce form.checkout_coupon,
		.woocommerce .woocommerce-info,
		.woocommerce .woocommerce-error,
		.woocommerce .woocommerce-message,
		.woocommerce .widget_shopping_cart .total,
		.woocommerce.widget_shopping_cart .total,
		.woocommerce-Reviews .comment_container,
		.woocommerce-cart #payment ul.payment_methods,
		#add_payment_method #payment ul.payment_methods,
		.woocommerce-checkout #payment ul.payment_methods,
		.woocommerce div.product .woocommerce-tabs ul.tabs::before,
		.woocommerce div.product .woocommerce-tabs ul.tabs::after,
		.woocommerce div.product .woocommerce-tabs ul.tabs li,
		.woocommerce .woocommerce-MyAccount-navigation-link,
		.select2-container--default .select2-selection--single {
			border-color: '. esc_html(savona_options( 'colors_content_border' )) .';
		}

		.woocommerce-cart #payment,
		#add_payment_method #payment,
		.woocommerce-checkout #payment,
		.woocommerce .woocommerce-info,
		.woocommerce .woocommerce-error,
		.woocommerce .woocommerce-message,
		.woocommerce div.product .woocommerce-tabs ul.tabs li {
			background-color: '. esc_html(savona_hex2rgba( savona_options( 'colors_content_border' ), 0.3 )) .';
		}

		.woocommerce-cart #payment div.payment_box::before,
		#add_payment_method #payment div.payment_box::before,
		.woocommerce-checkout #payment div.payment_box::before {
			border-color: '. esc_html(savona_hex2rgba( savona_options( 'colors_content_border' ), 0.5 )) .';
		}

		.woocommerce-cart #payment div.payment_box,
		#add_payment_method #payment div.payment_box,
		.woocommerce-checkout #payment div.payment_box {
			background-color: '. esc_html(savona_hex2rgba( savona_options( 'colors_content_border' ), 0.5 )) .';
		}
	';

	/* Buttons */
	$css .= '
		#page-content .woocommerce input.button,
		#page-content .woocommerce a.button,
		#page-content .woocommerce a.button.alt,
		#page-content .woocommerce button.button.alt,
		#page-content .woocommerce input.button.alt,
		#page-content .woocommerce #respond input#submit.alt,
		.woocommerce #page-content .widget_product_search input[type="submit"],
		.woocommerce #page-content .woocommerce-message .button,
		.woocommerce #page-content a.button.alt,
		.woocommerce #page-content button.button.alt,
		.woocommerce #page-content #respond input#submit,
		.woocommerce #page-content .widget_price_filter .button,
		.woocommerce #page-content .woocommerce-message .button,
		.woocommerce-page #page-content .woocommerce-message .button,
		.woocommerce #page-content nav.woocommerce-pagination ul li a,
		.woocommerce #page-content nav.woocommerce-pagination ul li span {
			color: '. esc_html(savona_options( 'colors_button_text' )) .';
			background-color: '. esc_html(savona_options( 'colors_button' )) .';
		}

		#page-content .woocommerce input.button:hover,
		#page-content .woocommerce a.button:hover,
		#page-content .woocommerce a.button.alt:hover,
		#page-content .woocommerce button.button.alt:hover,
		#page-content .woocommerce input.button.alt:hover,
		#page-content .woocommerce #respond input#submit.alt:hover,
		.woocommerce #page-content .woocommerce-message .button:hover,
		.woocommerce #page-content a.button.alt:hover,
		.woocommerce #page-content button.button.alt:hover,
		.woocommerce #page-content #respond input#submit:hover,
		.woocommerce #page-content .widget_price_filter .button:hover,
		.woocommerce #page-content .woocommerce-message .button:hover,
		.woocommerce-page #page-content .woocommerce-message .button:hover,
		.woocommerce #page-content nav.woocommerce-pagination ul li a:hover,
		.woocommerce #page-content nav.woocommerce-pagination ul li span.current {
			color: '. esc_html(savona_options( 'colors_button_hover_text' )) .';
			background-color: '. esc_html(savona_options( 'colors_content_accent' )) .';
		}

		.woocommerce #page-content nav.woocommerce-pagination ul li a.prev,
		.woocommerce #page-content nav.woocommerce-pagination ul li a.next {
			color: '. esc_html(savona_options( 'colors_button' )) .';
		}

		.woocommerce #page-content nav.woocommerce-pagination ul li a.prev:hover,
		.woocommerce #page-content nav.woocommerce-pagination ul li a.next:hover {
			color: '. esc_html(savona_options( 'colors_content_accent' )) .';
		}

		.woocommerce #page-content nav.woocommerce-pagination ul li a.prev:after,
		.woocommerce #page-content nav.woocommerce-pagination ul li a.next:after {
			color: '. esc_html(savona_options( 'colors_button_text' )) .';
		}

		.woocommerce #page-content nav.woocommerce-pagination ul li a.prev:hover:after,
		.woocommerce #page-content nav.woocommerce-pagination ul li a.next:hover:after {
			color: '. esc_html(savona_options( 'colors_button_hover_text' )) .';
		}
	';


/*
** Preloader =====
*/

	$css .= '.cssload-cube{background-color:'.esc_html(savona_options('colors_preloader_anim')).';width:9px;height:9px;position:absolute;margin:auto;animation:cssload-cubemove 2s infinite ease-in-out;-o-animation:cssload-cubemove 2s infinite ease-in-out;-ms-animation:cssload-cubemove 2s infinite ease-in-out;-webkit-animation:cssload-cubemove 2s infinite ease-in-out;-moz-animation:cssload-cubemove 2s infinite ease-in-out}.cssload-cube1{left:13px;top:0;animation-delay:.1s;-o-animation-delay:.1s;-ms-animation-delay:.1s;-webkit-animation-delay:.1s;-moz-animation-delay:.1s}.cssload-cube2{left:25px;top:0;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube3{left:38px;top:0;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube4{left:0;top:13px;animation-delay:.1s;-o-animation-delay:.1s;-ms-animation-delay:.1s;-webkit-animation-delay:.1s;-moz-animation-delay:.1s}.cssload-cube5{left:13px;top:13px;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube6{left:25px;top:13px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube7{left:38px;top:13px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube8{left:0;top:25px;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube9{left:13px;top:25px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube10{left:25px;top:25px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube11{left:38px;top:25px;animation-delay:.5s;-o-animation-delay:.5s;-ms-animation-delay:.5s;-webkit-animation-delay:.5s;-moz-animation-delay:.5s}.cssload-cube12{left:0;top:38px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube13{left:13px;top:38px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube14{left:25px;top:38px;animation-delay:.5s;-o-animation-delay:.5s;-ms-animation-delay:.5s;-webkit-animation-delay:.5s;-moz-animation-delay:.5s}.cssload-cube15{left:38px;top:38px;animation-delay:.6s;-o-animation-delay:.6s;-ms-animation-delay:.6s;-webkit-animation-delay:.6s;-moz-animation-delay:.6s}.cssload-spinner{margin:auto;width:49px;height:49px;position:relative}@keyframes cssload-cubemove{35%{transform:scale(0.005)}50%{transform:scale(1.7)}65%{transform:scale(0.005)}}@-o-keyframes cssload-cubemove{35%{-o-transform:scale(0.005)}50%{-o-transform:scale(1.7)}65%{-o-transform:scale(0.005)}}@-ms-keyframes cssload-cubemove{35%{-ms-transform:scale(0.005)}50%{-ms-transform:scale(1.7)}65%{-ms-transform:scale(0.005)}}@-webkit-keyframes cssload-cubemove{35%{-webkit-transform:scale(0.005)}50%{-webkit-transform:scale(1.7)}65%{-webkit-transform:scale(0.005)}}@-moz-keyframes cssload-cubemove{35%{-moz-transform:scale(0.005)}50%{-moz-transform:scale(1.7)}65%{-moz-transform:scale(0.005)}}';




// end style block
$css .= '</style>';

// return generated & compressed CSS
//echo str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css); 
echo ent2ncr(str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', ent2ncr($css))); 

} // end savona_dynamic_css()
add_action( 'wp_head', 'savona_dynamic_css' );