<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package Fashify
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function fashify_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'fashify_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'post-details'    => array(
			'stylesheet' => 'fashify-style',
			'date'       => '.posted-on',
			'categories' => '.entry-categories',
			'tags'       => '.entry-tags',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
		'featured-images' => array(
			'archive'    => true,
			'post'       => true,
			'page'       => true,
		),
	) );
}
add_action( 'after_setup_theme', 'fashify_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function fashify_infinite_scroll_render() {
    $homepage_layout = get_theme_mod( 'fashify_homepage_layout', 'default' );
    $archive_layout = get_theme_mod( 'fashify_archive_layout', 'default' );

    $count = 0;
	while ( have_posts() ) {
		the_post();
		if ( is_search() || is_archive() ) :
            switch ( $archive_layout ) {
                   case 'grid':
                       get_template_part( 'template-parts/content', 'grid' );
                       break;

                   case 'list':
                       get_template_part( 'template-parts/content', 'list' );
                       break;

                   default:
                       get_template_part( 'template-parts/content', 'grid-large' );
                       break;
            }
		else :
            switch ( $homepage_layout ) {
                case 'home1':
                    get_template_part( 'template-parts/content', 'grid' );
                    break;

                case 'home2':
                    get_template_part( 'template-parts/content', 'list' );
                    break;

                case 'home3':
                    if ( $count == 0) {
                        get_template_part( 'template-parts/content', 'grid-large' );
                    }
                    elseif ( $count < 5 ) {
                        get_template_part( 'template-parts/content', 'grid' );
                    }
                    else {
                        get_template_part( 'template-parts/content', 'list' );
                    }
                    break;

                case 'home4':
                    if ( $count == 0) {
                        get_template_part( 'template-parts/content', 'grid-large' );
                    }
                    else {
                        get_template_part( 'template-parts/content', 'grid' );
                    }
                    break;

                case 'home5':
                    if ( $count == 0) {
                        get_template_part( 'template-parts/content', 'grid-large' );
                    }
                    else {
                        get_template_part( 'template-parts/content', 'list' );
                    }
                    break;

                default:
                    get_template_part( 'template-parts/content', 'grid-large' );
                    break;
            }
		endif;

        $count++;
	}
}
