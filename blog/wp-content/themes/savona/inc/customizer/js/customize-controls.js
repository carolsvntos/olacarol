/*
** Scripts within the customizer controls window.
*/

(function( $ ) {
	wp.customize.bind( 'ready', function() {

	/*
	** Reusable Functions
	*/
		// Label
		function savona_customizer_label( id, title ) {

			if ( id === 'custom_logo' || id === 'site_icon' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			} else {
				$( '#customize-control-savona_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

		// Checkbox Label
		function savona_customizer_checkbox_label( id ) {

			var id = '#customize-control-savona_options-'+ id;
			$( id ).addClass('tab-title');

			// on change
			$( id ).find('input[type="checkbox"]').change(function() {
				if ( $(this).is(':checked') ) {
					$(this).closest('li').parent('ul').find('li').not( '.section-meta,.tab-title'+ id ).find('.control-lock').remove();
				} else {
					$(this).closest('li').parent('ul').find('li').not( '.section-meta,.tab-title'+ id ).append('<div class="control-lock"></div>');
				}
			});

			// on load
			if ( ! $( id ).find('input[type="checkbox"]').is(':checked') ) {
				$( id ).closest('li').parent('ul').find('li').not( '.section-meta,.tab-title'+ id ).append('<div class="control-lock"></div>');
			}

		}

		// Select
		function savona_customizer_select( select, children, value ) {

			// on change
			$( '#customize-control-savona_options-'+ select ).find('select').change(function() {
				if ( $(this).val() === value ) {
					$(children).show();
				} else {
					$(children).hide();
				}
			});

			// on load
			if ( $( '#customize-control-savona_options-'+ select ).find('select').val() === value ) {
				$(children).show();
			} else {
				$(children).hide();
			}

		}


	/*
	** Tabs
	*/

		// Colors
		savona_customizer_label( 'colors_content_accent', 'General' );
		savona_customizer_label( 'background_image', 'Body Background' );

		// General Layouts
		savona_customizer_label( 'general_sidebar_width', 'General' );
		savona_customizer_label( 'general_header_width', 'Boxed Controls' );

		// Top Bar
		savona_customizer_checkbox_label( 'top_bar_label' );

		// Site Identity
		savona_customizer_label( 'custom_logo', 'Logo Setup' );
		savona_customizer_label( 'site_icon', 'Favicon' );

		// Main Navigation
		savona_customizer_checkbox_label( 'main_nav_label' );

		// Featured Slider
		savona_customizer_checkbox_label( 'featured_slider_label' );

		// Featured Links
		savona_customizer_checkbox_label( 'featured_links_label' );
		savona_customizer_label( 'featured_links_title_1', 'Featured Link #1' );
		savona_customizer_label( 'featured_links_title_2', 'Featured Link #2' );
		savona_customizer_label( 'featured_links_title_3', 'Featured Link #3' );

		// Blog Page
		savona_customizer_label( 'blog_page_post_description', 'General' );
		savona_customizer_label( 'blog_page_show_categories', 'Post Elements' );

		// Single Page
		savona_customizer_label( 'single_page_show_categories', 'Post Elements' );
		savona_customizer_label( 'single_page_related_title', 'Post Footer' );
		
		// Social Media
		savona_customizer_label( 'social_media_icon_1', 'Social Icon #1' );
		savona_customizer_label( 'social_media_icon_2', 'Social Icon #2' );
		savona_customizer_label( 'social_media_icon_3', 'Social Icon #3' );
		savona_customizer_label( 'social_media_icon_4', 'Social Icon #4' );

		// Contditional Logics
		savona_customizer_select( 'featured_slider_display', '#customize-control-savona_options-featured_slider_category', 'category' );
		savona_customizer_select( 'blog_page_post_description', '#customize-control-savona_options-blog_page_excerpt_length,#customize-control-savona_options-blog_page_grid_excerpt_length', 'excerpt' );


		// Add bottom space to tabs
		$('.tab-title').prev('li').not('.customize-section-description-container').css( 'padding-bottom', '20px' );


	/*
	** Fixes
	*/
	$('#customize-control-display_header_text').find('input').change(function(){
		var blogname = $('#customize-control-blogname').find('input').val();
		$('#customize-control-blogname').find('input').val( blogname + ' ').trigger('keyup');
		$('#customize-control-blogname').find('input').val( blogname ).trigger('keyup');
	});

	}); // wp.customize ready
})( jQuery );
