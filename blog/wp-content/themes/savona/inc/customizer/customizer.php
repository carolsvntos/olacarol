<?php

/*
** Register Theme Customizer
*/
function savona_customize_register( $wp_customize ) {

/*
** Sanitization Callbacks =====
*/
	// checkbox
	function savona_sanitize_checkbox( $input ) {
		return $input ? true : false;
	}
	
	// select
	function savona_sanitize_select( $input, $setting ) {
		
		// check for slug
		$input = sanitize_key( $input );
		
		// get all select options
		$options = $setting->manager->get_control( $setting->id )->choices;
		
		// return default if not valid
		return ( array_key_exists( $input, $options ) ? $input : $setting->default );
	}

	// number absint
	function savona_sanitize_number_absint( $number, $setting ) {

		// ensure $number is an absolute integer
		$number = absint( $number );

		// return default if not integer
		return ( $number ? $number : $setting->default );

	}

	// textarea
	function savona_sanitize_textarea( $input ) {

		$allowedtags = array(
			'a' => array(
				'href' 		=> array(),
				'title' 	=> array(),
				'_blank'	=> array()
			),
			'img' => array(
				'src' 		=> array(),
				'alt' 		=> array(),
				'width'		=> array(),
				'height'	=> array(),
				'style'		=> array(),
				'class'		=> array(),
				'id'		=> array()
			),
			'br' 	 => array(),
			'em' 	 => array(),
			'strong' => array()
		);

		// return filtered html
		return wp_kses( $input, $allowedtags );

	}

	// Custom Controls
	function savona_sanitize_custom_control( $input ) {
		return $input;
	}


/*
** Reusable Functions =====
*/
	// checkbox
	function savona_checkbox_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;

			$section_id = 'savona_'. $section;

		$wp_customize->add_setting( 'savona_options['. $section .'_'. $id .']', array(
			'default'	 => savona_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'savona_sanitize_checkbox'
		) );
		$wp_customize->add_control( 'savona_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> $section_id,
			'type'		=> 'checkbox',
			'priority'	=> $priority
		) );
	}

	// text
	function savona_text_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'savona_options['. $section .'_'. $id .']', array(
			'default'	 => savona_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'savona_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> 'savona_'. $section,
			'type'		=> 'text',
			'priority'	=> $priority
		) );
	}

	// color
	function savona_color_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'savona_options['. $section .'_'. $id .']', array(
			'default'	 => savona_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'savona_options['. $section .'_'. $id .']', array(
			'label' 	=> $name,
			'section' 	=> 'savona_'. $section,
			'priority'	=> $priority
		) ) );
	}

	// textarea
	function savona_textarea_control( $section, $id, $name, $description, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'savona_options['. $section .'_'. $id .']', array(
			'default'	 => savona_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'savona_sanitize_textarea'
		) );
		$wp_customize->add_control( 'savona_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'description'	=> wp_kses_post($description),
			'section'		=> 'savona_'. $section,
			'type'			=> 'textarea',
			'priority'		=> $priority
		) );
	}

	// url
	function savona_url_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'savona_options['. $section .'_'. $id .']', array(
			'default'	 => savona_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control( 'savona_options['. $section .'_'. $id .']', array(
			'label'		=> $name,
			'section'	=> 'savona_'. $section,
			'type'		=> 'text',
			'priority'	=> $priority
		) );
	}

	// number absint
	function savona_number_absint_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;

		if ( $section !== 'title_tagline' ) {
			$section_id = 'savona_'. $section;
		} else {
			$section_id = $section;
		}

		$wp_customize->add_setting( 'savona_options['. $section .'_'. $id .']', array(
			'default'	 => savona_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'savona_sanitize_number_absint'
		) );
		$wp_customize->add_control( 'savona_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> $section_id,
			'type'			=> 'number',
			'input_attrs' 	=> $atts,
			'priority'		=> $priority
		) );
	}

	// select
	function savona_select_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'savona_options['. $section .'_'. $id .']', array(
			'default'	 => savona_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'savona_sanitize_select'
		) );
		$wp_customize->add_control( 'savona_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> 'savona_'. $section,
			'type'			=> 'select',
			'choices' 		=> $atts,
			'priority'		=> $priority
		) );
	}

	// radio
	function savona_radio_control( $section, $id, $name, $atts, $transport, $priority ) {
		global $wp_customize;

		
			$section_id = 'savona_'. $section;
		
		$wp_customize->add_setting( 'savona_options['. $section .'_'. $id .']', array(
			'default'	 => savona_options( $section .'_'. $id),
			'type'		 => 'option',
			'transport'	 => $transport,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'savona_sanitize_select'
		) );
		$wp_customize->add_control( 'savona_options['. $section .'_'. $id .']', array(
			'label'			=> $name,
			'section'		=> $section_id,
			'type'			=> 'radio',
			'choices' 		=> $atts,
			'priority'		=> $priority
		) );
	}

	// image
	function savona_image_control( $section, $id, $name, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'savona_options['. $section .'_'. $id .']', array(
		    'default' 	=> savona_options( $section .'_'. $id),
		    'type' 		=> 'option',
		    'transport' => $transport,
		    'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control(
			new WP_Customize_Image_Control( $wp_customize, 'savona_options['. $section .'_'. $id .']', array(
				'label'    => $name,
				'section'  => 'savona_'. $section,
				'priority' => $priority
			)
		) );
	}

	// image crop
	function savona_image_crop_control( $section, $id, $name, $width, $height, $transport, $priority ) {
		global $wp_customize;
		$wp_customize->add_setting( 'savona_options['. $section .'_'. $id .']', array(
			'default' 	=> '',
			'type' 		=> 'option',
			'transport' => $transport,
			'sanitize_callback' => 'savona_sanitize_number_absint'
		) );
		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'savona_options['. $section .'_'. $id .']', array(
				'label'    		=> $name,
				'section'  		=> 'savona_'. $section,
				'flex_width'  	=> false,
				'flex_height' 	=> false,
				'width'       	=> $width,
				'height'      	=> $height,
				'priority' 		=> $priority
			)
		) );
	}

	// Pro Version
	class Savona_Customize_Pro_Version extends WP_Customize_Control {
		public $type = 'pro_options';

		public function render_content() {
			echo '<span>Want more <strong>'. esc_html( $this->label ) .'</strong>?</span>';
			echo '<a href="'. esc_url($this->description) .'" target="_blank">';
				echo '<span class="dashicons dashicons-info"></span>';
				echo '<strong> '. esc_html__( 'See Savona PRO', 'savona' ) .'<strong></a>';
			echo '</a>';
		}
	}

	// Pro Version Links
	class Savona_Customize_Pro_Version_Links extends WP_Customize_Control {
		public $type = 'pro_links';

		public function render_content() {
			?>
			<ul>
				<li class="customize-control">
					<h3><?php esc_html_e( 'Upgrade', 'savona' ); ?> <span>*</span></h3>
					<p><?php esc_html_e( 'Upgrade to Pro version for Demo Content, unlimited custom Colors, rich Typography options, multiple variation of Blog Feed layout and way much more. Also Premium Support included.', 'savona' ); ?></p>
					<a href="<?php echo esc_url('http://optimathemes.com/themes/savona-pro?ref=savona-free-customizer-about-section-buypro'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Get Savona Pro', 'savona' ); ?></a>
				</li>
				<li class="customize-control">
					<h3><?php esc_html_e( 'Documentation', 'savona' ); ?></h3>
					<p><?php esc_html_e( 'Read how to customize the theme, set up widgets, and learn all the possible options available to you.', 'savona' ); ?></p>
					<a href="<?php echo esc_url('http://optimathemes.com/themes/savona/docs/?ref=savona-free-customizer-about-section-docs-btn/'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Documentation', 'savona' ); ?></a>
				</li>
				<li class="customize-control">
					<h3><?php esc_html_e( 'Demo Content', 'savona' ); ?></h3>
					<p><?php esc_html_e( 'You can download and import our demo file to get the same demo content as shown on our website. For more details please read theme documentation.', 'savona' ); ?></p>
					<a href="<?php echo esc_url('http://optimathemes.com/themes/savona/democontent/savona_free_demo_content.html?ref=savona-free-customizer-about-section-demoxml-btn'); ?>" target="_blank" class="button button-primary widefat"><?php esc_html_e( 'Download Demo Content', 'savona' ); ?></a>
				</li>
			</ul>
			<?php
		}
	}	



/*
** Pro Version =====
*/

	// add Colors section
	$wp_customize->add_section( 'savona_pro' , array(
		'title'		 => esc_html__( 'About Savona', 'savona' ),
		'priority'	 => 1,
		'capability' => 'edit_theme_options'
	) );

	// Pro Version
	$wp_customize->add_setting( 'pro_version_', array(
		'sanitize_callback' => 'savona_sanitize_custom_control'
	) );
	$wp_customize->add_control( new Savona_Customize_Pro_Version_Links ( $wp_customize,
			'pro_version_', array(
				'section'	=> 'savona_pro',
				'type'		=> 'pro_links',
				'label' 	=> '',
				'priority'	=> 1
			)
		)
	);


/*
** Colors =====
*/

	// add Colors section
	$wp_customize->add_section( 'savona_colors' , array(
		'title'		 => esc_html__( 'Colors', 'savona' ),
		'priority'	 => 1,
		'capability' => 'edit_theme_options'
	) );

	// Content Accent
	savona_color_control( 'colors', 'content_accent', esc_html__( 'Accent', 'savona' ), 'postMessage', 3 );

	$wp_customize->get_control( 'header_textcolor' )->section = 'savona_colors';
	$wp_customize->get_control( 'header_textcolor' )->priority = 6;
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Header Background
	savona_color_control( 'colors', 'header_bg', esc_html__( 'Header Background Color', 'savona' ), 'postMessage', 9 );
	
	// Body Background
	$wp_customize->get_control( 'background_color' )->section = 'savona_colors';
	$wp_customize->get_control( 'background_color' )->priority = 12;
	$wp_customize->get_control( 'background_color' )->label = 'Body Background Color';

	$wp_customize->get_control( 'background_image' )->section = 'savona_colors';
	$wp_customize->get_control( 'background_image' )->priority = 15;
	$wp_customize->get_control( 'background_preset' )->section = 'savona_colors';
	$wp_customize->get_control( 'background_preset' )->priority = 18;
	$wp_customize->get_control( 'background_position' )->section = 'savona_colors';
	$wp_customize->get_control( 'background_position' )->priority = 21;
	$wp_customize->get_control( 'background_size' )->section = 'savona_colors';
	$wp_customize->get_control( 'background_size' )->priority = 23;
	$wp_customize->get_control( 'background_repeat' )->section = 'savona_colors';
	$wp_customize->get_control( 'background_repeat' )->priority = 25;
	$wp_customize->get_control( 'background_attachment' )->section = 'savona_colors';
	$wp_customize->get_control( 'background_attachment' )->priority = 27;

	// Pro Version
	$wp_customize->add_setting( 'pro_version_colors', array(
		'sanitize_callback' => 'savona_sanitize_custom_control'
	) );
	$wp_customize->add_control( new Savona_Customize_Pro_Version ( $wp_customize,
			'pro_version_colors', array(
				'section'	  => 'savona_colors',
				'type'		  => 'pro_options',
				'label' 	  => esc_html__( 'Colors', 'savona' ),
				'description' => esc_html( 'optimathemes.com/themes/savona-pro?ref=savona-free-colors-customizer' ),
				'priority'	  => 100
			)
		)
	);

/*
** General Layouts =====
*/

	// add General Layouts section
	$wp_customize->add_section( 'savona_general' , array(
		'title'		 => esc_html__( 'General Layouts', 'savona' ),
		'priority'	 => 3,
		'capability' => 'edit_theme_options'
	) );

	// Sidebar Width
	savona_number_absint_control( 'general', 'sidebar_width', esc_html__( 'Sidebar Width', 'savona' ), array( 'step' => '1' ), 'refresh', 3 );

	// Sticky Sidebar
	savona_checkbox_control( 'general', 'sidebar_sticky', esc_html__( 'Enable Sticky Sidebar', 'savona' ), 'refresh', 5 );

	$boxed_width = array(
		'full' 		=> esc_html__( 'Full', 'savona' ),
		'contained' => esc_html__( 'Contained', 'savona' ),
		'boxed' 	=> esc_html__( 'Boxed', 'savona' ),
	);

	// Header Width
	savona_select_control( 'general', 'header_width', esc_html__( 'Header Width', 'savona' ), $boxed_width, 'refresh', 25 );

	$boxed_width_slider = array(
		'full' => esc_html__( 'Full', 'savona' ),
		'boxed' => esc_html__( 'Boxed', 'savona' ),
	);

	// Slider Width
	savona_select_control( 'general', 'slider_width', esc_html__( 'Featured Slider Width', 'savona' ), $boxed_width_slider, 'refresh', 27 );
	
	// Featured Links Width
	savona_select_control( 'general', 'links_width', esc_html__( 'Featured Links Width', 'savona' ), $boxed_width_slider, 'refresh', 28 );

	// Content Width
	savona_select_control( 'general', 'content_width', esc_html__( 'Content Width', 'savona' ), $boxed_width_slider, 'refresh', 29 );

	// Single Content Width
	savona_select_control( 'general', 'single_width', esc_html__( 'Single Content Width', 'savona' ), $boxed_width_slider, 'refresh', 31 );

	// Footer Width
	savona_select_control( 'general', 'footer_width', esc_html__( 'Footer Width', 'savona' ), $boxed_width, 'refresh', 33 );

	// Pro Version
	$wp_customize->add_setting( 'pro_version_general_layouts', array(
		'sanitize_callback' => 'savona_sanitize_custom_control'
	) );
	$wp_customize->add_control( new Savona_Customize_Pro_Version ( $wp_customize,
			'pro_version_general_layouts', array(
				'section'	  => 'savona_general',
				'type'		  => 'pro_options',
				'label' 	  => esc_html__( 'Layout Options', 'savona' ),
				'description' => esc_html( 'optimathemes.com/themes/savona-pro?ref=savona-free-general-layouts-customizer' ),
				'priority'	  => 100
			)
		)
	);


/*
** Top Bar =====
*/

	// add Top Bar section
	$wp_customize->add_section( 'savona_top_bar' , array(
		'title'		 => esc_html__( 'Top Bar', 'savona' ),
		'priority'	 => 5,
		'capability' => 'edit_theme_options'
	) );

	// Top Bar label
	savona_checkbox_control( 'top_bar', 'label', esc_html__( 'Top Bar', 'savona' ), 'refresh', 1 );


/*
** Site Identity =====
*/

	// Logo Width
	savona_number_absint_control( 'title_tagline', 'logo_width', esc_html__( 'Width', 'savona' ), array( 'step' => '10' ), 'postMessage', 8 );

	$wp_customize->get_control( 'custom_logo' )->transport = 'selective_refresh';


/*
** Main Navigation =====
*/

	// add Main Navigation section
	$wp_customize->add_section( 'savona_main_nav' , array(
		'title'		 => esc_html__( 'Main Navigation', 'savona' ),
		'priority'	 => 23,
		'capability' => 'edit_theme_options'
	) );

	// Main Navigation
	savona_checkbox_control( 'main_nav', 'label', esc_html__( 'Main Navigation', 'savona' ), 'refresh', 1 );

	$main_nav_align = array(
		'left' => esc_html__( 'Left', 'savona' ),
		'center' => esc_html__( 'Center', 'savona' ),
		'right' => esc_html__( 'Right', 'savona' ),
	);

	// Align
	savona_select_control( 'main_nav', 'align', esc_html__( 'Align', 'savona' ), $main_nav_align, 'refresh', 7 );

	$main_nav_position = array(
		'above' => esc_html__( 'Above Page Header', 'savona' ),
		'below' => esc_html__( 'Below Page Header', 'savona' ),
	);

	// Show Search Icon
	savona_checkbox_control( 'main_nav', 'show_search', esc_html__( 'Show Search Icon', 'savona' ), 'refresh', 13 );

	// Show Sidebar Icon
	savona_checkbox_control( 'main_nav', 'show_sidebar', esc_html__( 'Show Sidebar Icon', 'savona' ), 'refresh', 15 );


/*
** Featured Slider =====
*/

	// add featured slider section
	$wp_customize->add_section( 'savona_featured_slider' , array(
		'title'		 => esc_html__( 'Featured Slider', 'savona' ),
		'priority'	 => 25,
		'capability' => 'edit_theme_options'
	) );

	// Featured Slider
	savona_checkbox_control( 'featured_slider', 'label', esc_html__( 'Featured Slider', 'savona' ), 'refresh', 1 );

	$slider_display = array(
		'all' 		=> 'All Posts',
		'category' 	=> 'by Post Category'
	);
	 
	// Display
	savona_select_control( 'featured_slider', 'display', esc_html__( 'Display Posts', 'savona' ), $slider_display, 'refresh', 2 );

	$slider_cats = array();

	foreach ( get_categories() as $categories => $category ) {
	    $slider_cats[$category->term_id] = $category->name;
	}
	 
	// Category
	savona_select_control( 'featured_slider', 'category', esc_html__( 'Select Category', 'savona' ), $slider_cats, 'refresh', 3 );

	// Amount
	savona_number_absint_control( 'featured_slider', 'amount', esc_html__( 'Number of Slides', 'savona' ), array( 'step' => '1', 'max' => '3' ), 'refresh', 10 );

	$slider_culumns = array( 'step' => '1', 'min' => '1', 'max' => '4' );

	// Navigation
	savona_checkbox_control( 'featured_slider', 'navigation', esc_html__( 'Show Navigation Arrows', 'savona' ), 'refresh', 25 );

	// Pagination
	savona_checkbox_control( 'featured_slider', 'pagination', esc_html__( 'Show Pagination Dots', 'savona' ), 'refresh', 30 );

	//Featured Slider Information
	class Savona_Customize_Pro_Info extends WP_Customize_Control {
		public $type = 'pro_options';

		public function render_content() {
			echo '<span><strong>Note:</strong> Posts should have featured image for the slider to work.</span>';
		}
	}

	$wp_customize->add_setting( 'pro_version_featured_info', array(
		'sanitize_callback' => 'savona_sanitize_custom_control'
	) );

	$wp_customize->add_control( new Savona_Customize_Pro_Info ( $wp_customize,
			'pro_version_featured_info', array(
				'section'	  => 'savona_featured_slider',
				'type'		  => 'pro_options',
				'priority'	  => 100
			)
		)
	);

	$wp_customize->add_setting( 'pro_version_featured_slider', array(
		'sanitize_callback' => 'savona_sanitize_custom_control'
	) );
	$wp_customize->add_control( new Savona_Customize_Pro_Version ( $wp_customize,
			'pro_version_featured_slider', array(
				'section'	  => 'savona_featured_slider',
				'type'		  => 'pro_options',
				'label' 	  => esc_html__( 'Slider Options ', 'savona' ),
				'description' => esc_html( 'optimathemes.com/themes/savona-pro?ref=savona-free-featured-slider-customizer' ),
				'priority'	  => 100
			)
		)
	);


/*
** Featured Links =====
*/

	// add featured links section
	$wp_customize->add_section( 'savona_featured_links' , array(
		'title'		 => esc_html__( 'Featured Links', 'savona' ),
		'priority'	 => 27,
		'capability' => 'edit_theme_options'
	) );

	// Featured Links
	savona_checkbox_control( 'featured_links', 'label', esc_html__( 'Featured Links', 'savona' ), 'refresh', 1 );

	// Link #1 Title
	savona_text_control( 'featured_links', 'title_1', esc_html__( 'Title', 'savona' ), 'refresh', 9 );

	// Link #1 URL
	savona_url_control( 'featured_links', 'url_1', esc_html__( 'URL', 'savona' ), 'refresh', 11 );

	// Link #1 Image
	savona_image_crop_control( 'featured_links', 'image_1', esc_html__( 'Image', 'savona' ), 600, 340, 'refresh', 13 );

	// Link #2 Title
	savona_text_control( 'featured_links', 'title_2', esc_html__( 'Title', 'savona' ), 'refresh', 15 );

	// Link #2 URL
	savona_url_control( 'featured_links', 'url_2', esc_html__( 'URL', 'savona' ), 'refresh', 17 );

	// Link #2 Image
	savona_image_crop_control( 'featured_links', 'image_2', esc_html__( 'Image', 'savona' ), 600, 340, 'refresh', 19 );

	// Link #3 Title
	savona_text_control( 'featured_links', 'title_3', esc_html__( 'Title', 'savona' ), 'refresh', 21 );

	// Link #3 URL
	savona_url_control( 'featured_links', 'url_3', esc_html__( 'URL', 'savona' ), 'refresh', 23 );

	// Link #3 Image
	savona_image_crop_control( 'featured_links', 'image_3', esc_html__( 'Image', 'savona' ), 600, 340, 'refresh', 25 );


/*
** Blog Page =====
*/

	// add Blog Page section
	$wp_customize->add_section( 'savona_blog_page' , array(
		'title'		 => esc_html__( 'Blog Page', 'savona' ),
		'priority'	 => 29,
		'capability' => 'edit_theme_options'
	) );

	$post_description = array(
		'none' 		=> esc_html__( 'None', 'savona' ),
		'excerpt' 	=> esc_html__( 'Post Excerpt', 'savona' ),
		'content' 	=> esc_html__( 'Post Content', 'savona' ),
	);

	// Post Description
	savona_select_control( 'blog_page', 'post_description', esc_html__( 'Post Description', 'savona' ), $post_description, 'refresh', 3 );

	$post_pagination = array(
		'default' 	=> esc_html__( 'Default', 'savona' ),
		'numeric' 	=> esc_html__( 'Numeric', 'savona' ),
	);

	// Post Pagination
	savona_select_control( 'blog_page', 'post_pagination', esc_html__( 'Post Pagination', 'savona' ), $post_pagination, 'refresh', 5 );

	// Show Categories
	savona_checkbox_control( 'blog_page', 'show_categories', esc_html__( 'Show Categories', 'savona' ), 'refresh', 6 );

	// Show Date
	savona_checkbox_control( 'blog_page', 'show_date', esc_html__( 'Show Date', 'savona' ), 'refresh', 7 );

	// Show Comments
	savona_checkbox_control( 'blog_page', 'show_comments', esc_html__( 'Show Comments', 'savona' ), 'refresh', 9 );

	// Show Drop Caps
	savona_checkbox_control( 'blog_page', 'show_dropcaps', esc_html__( 'Show Drop Caps', 'savona' ), 'refresh', 11 );

	// Show Author
	savona_checkbox_control( 'blog_page', 'show_author', esc_html__( 'Show Author', 'savona' ), 'refresh', 16 );

	$related_posts = array(
		'none' 		=> esc_html__( 'None', 'savona' ),
		'related' 	=> esc_html__( 'Related', 'savona' )
	);

	// Related Posts Orderby
	savona_select_control( 'blog_page', 'related_orderby', esc_html__( 'Related Posts Display', 'savona' ), $related_posts, 'refresh', 33 );

	// Pro Version
	$wp_customize->add_setting( 'pro_version_blog_page', array(
		'sanitize_callback' => 'savona_sanitize_custom_control'
	) );
	$wp_customize->add_control( new Savona_Customize_Pro_Version ( $wp_customize,
			'pro_version_blog_page', array(
				'section'	  => 'savona_blog_page',
				'type'		  => 'pro_options',
				'label' 	  => esc_html__( 'Blog Options ', 'savona' ),
				'description' => esc_html( 'optimathemes.com/themes/savona-pro?ref=savona-free-blog-page-customizer' ),
				'priority'	  => 100
			)
		)
	);



/*
** Single Page =====
*/

	// add single Page section
	$wp_customize->add_section( 'savona_single_page' , array(
		'title'		 => esc_html__( 'Single Page', 'savona' ),
		'priority'	 => 31,
		'capability' => 'edit_theme_options'
	) );

	// Show Categories
	savona_checkbox_control( 'single_page', 'show_categories', esc_html__( 'Show Categories', 'savona' ), 'refresh', 5 );

	// Show Date
	savona_checkbox_control( 'single_page', 'show_date', esc_html__( 'Show Date', 'savona' ), 'refresh', 7 );

	// Show Comments
	savona_checkbox_control( 'single_page', 'show_comments', esc_html__( 'Show Comments', 'savona' ), 'refresh', 13 );

	// Show Author
	savona_checkbox_control( 'single_page', 'show_author', esc_html__( 'Show Author', 'savona' ), 'refresh', 15 );

	// Show Author Description
	savona_checkbox_control( 'single_page', 'show_author_desc', esc_html__( 'Show Author Description', 'savona' ), 'refresh', 18 );

	// Related Posts Orderby
	savona_select_control( 'single_page', 'related_orderby', esc_html__( 'Related Posts - Display', 'savona' ), $related_posts, 'refresh', 23 );


/*
** Social Media =====
*/

	// add social media section
	$wp_customize->add_section( 'savona_social_media' , array(
		'title'		 => esc_html__( 'Social Media', 'savona' ),
		'priority'	 => 33,
		'capability' => 'edit_theme_options'
	) );
	
	// Social Window
	savona_checkbox_control( 'social_media', 'window', esc_html__( 'Show Social Icons in New Window', 'savona' ), 'refresh', 1 );

	// Social Icons Array
	$social_icons = array(
		'facebook' 				=> '&#xf09a;',
		'facebook-official'		=> '&#xf230;',
		'facebook-square' 		=> '&#xf082;',
		'twitter' 				=> '&#xf099;',
		'twitter-square' 		=> '&#xf081;',
		'google' 				=> '&#xf1a0;',
		'google-plus' 			=> '&#xf0d5;',
		'google-plus-official'	=> '&#xf2b3;',
		'google-plus-square'	=> '&#xf0d4;',
		'linkedin'				=> '&#xf0e1;',
		'linkedin-square' 		=> '&#xf08c;',
		'pinterest' 			=> '&#xf0d2;',
		'pinterest-p' 			=> '&#xf231;',
		'pinterest-square'		=> '&#xf0d3;',
		'behance' 				=> '&#xf1b4;',
		'behance-square'		=> '&#xf1b5;',
		'tumblr' 				=> '&#xf173;',
		'tumblr-square' 		=> '&#xf174;',
		'reddit' 				=> '&#xf1a1;',
		'reddit-alien' 			=> '&#xf281;',
		'reddit-square' 		=> '&#xf1a2;',
		'dribbble' 				=> '&#xf17d;',
		'vk' 					=> '&#xf189;',
		'skype' 				=> '&#xf17e;',
		'film' 					=> '&#xf008;',
		'youtube-play' 			=> '&#xf16a;',
		'youtube' 				=> '&#xf167;',
		'youtube-square' 		=> '&#xf166;',
		'vimeo-square' 			=> '&#xf194;',
		'soundcloud' 			=> '&#xf1be;',
		'instagram' 			=> '&#xf16d;',
		'flickr' 				=> '&#xf16e;',
		'rss' 					=> '&#xf09e;',
		'rss-square' 			=> '&#xf143;',
		'heart' 				=> '&#xf004;',
		'heart-o' 				=> '&#xf08a;',
		'github' 				=> '&#xf09b;',
		'github-alt' 			=> '&#xf113;',
		'github-square' 		=> '&#xf092;',
		'stack-overflow' 		=> '&#xf16c;',
		'qq' 					=> '&#xf1d6;',
		'weibo' 				=> '&#xf18a;',
		'weixin' 				=> '&#xf1d7;',
		'xing' 					=> '&#xf168;',
		'xing-square' 			=> '&#xf169;',
		'gamepad' 				=> '&#xf11b;',
		'medium' 				=> '&#xf23a;',
		'envelope' 				=> '&#xf0e0;',
		'envelope-o' 			=> '&#xf003;',
		'envelope-square ' 		=> '&#xf199;',
		'etsy' 					=> '&#xf2d7;',
		'snapchat' 				=> '&#xf2ab;',
		'snapchat-ghost' 		=> '&#xf2ac;',
		'snapchat-square'		=> '&#xf2ad;',
		'meetup' 				=> '&#xf2e0;',
	);

	// Social #1 Icon
	savona_select_control( 'social_media', 'icon_1', esc_html__( 'Select Icon', 'savona' ), $social_icons, 'refresh', 3 );

	// Social #1 Icon
	savona_url_control( 'social_media', 'url_1', esc_html__( 'URL', 'savona' ), 'refresh', 5 );

	// Social #2 Icon
	savona_select_control( 'social_media', 'icon_2', esc_html__( 'Select Icon', 'savona' ), $social_icons, 'refresh', 7 );

	// Social #2 Icon
	savona_url_control( 'social_media', 'url_2', esc_html__( 'URL', 'savona' ), 'refresh', 9 );

	// Social #3 Icon
	savona_select_control( 'social_media', 'icon_3', esc_html__( 'Select Icon', 'savona' ), $social_icons, 'refresh', 11 );

	// Social #3 Icon
	savona_url_control( 'social_media', 'url_3', esc_html__( 'URL', 'savona' ), 'refresh', 13 );

	// Social #4 Icon
	savona_select_control( 'social_media', 'icon_4', esc_html__( 'Select Icon', 'savona' ), $social_icons, 'refresh', 15 );

	// Social #4 Icon
	savona_url_control( 'social_media', 'url_4', esc_html__( 'URL', 'savona' ), 'refresh', 17 );


/*
** Page Footer =====
*/

	// add page footer section
	$wp_customize->add_section( 'savona_page_footer' , array(
		'title'		 => esc_html__( 'Page Footer', 'savona' ),
		'priority'	 => 35,
		'capability' => 'edit_theme_options'
	) );

	$copyright_description = 'Enter <strong>$year</strong> to update the year automatically and <strong>$copy</strong> for the copyright symbol.<br><br>Example: $year Savona Theme $copy.';

	// Copyright
	savona_textarea_control( 'page_footer', 'copyright', esc_html__( 'Copyright', 'savona' ), $copyright_description, 'refresh', 3 );

	// Pro Version
	$wp_customize->add_setting( 'pro_version_page_footer', array(
		'sanitize_callback' => 'savona_sanitize_custom_control'
	) );
	$wp_customize->add_control( new Savona_Customize_Pro_Version ( $wp_customize,
			'pro_version_page_footer', array(
				'section'	  => 'savona_page_footer',
				'type'		  => 'pro_options',
				'label' 	  => esc_html__( 'Footer Options', 'savona' ),
				'description' => esc_html( 'optimathemes.com/themes/savona/customizer/free/page-footer.html?ref=savona-free-page-footer-customizer' ),
				'priority'	  => 100
			)
		)
	);


/*
** Preloader =====
*/

	// add Preloader section
	$wp_customize->add_section( 'savona_preloader' , array(
		'title'		 => esc_html__( 'Preloader', 'savona' ),
		'priority'	 => 45,
		'capability' => 'edit_theme_options'
	) );

	// Preloading Animation
	savona_checkbox_control( 'preloader', 'label', esc_html__( 'Preloading Animation', 'savona' ), 'refresh', 1 );
	

}
add_action( 'customize_register', 'savona_customize_register' );


/*
** Bind JS handlers to instantly live-preview changes
*/
function savona_customize_preview_js() {
	wp_enqueue_script( 'savona-customize-preview', get_theme_file_uri( '/inc/customizer/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'savona_customize_preview_js' );

/*
** Load dynamic logic for the customizer controls area.
*/
function savona_panels_js() {
	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/font-awesome.css' ) );
	wp_enqueue_style( 'savona-customizer-ui-css', get_theme_file_uri( '/inc/customizer/css/customizer-ui.css' ) );
	wp_enqueue_script( 'savona-customize-controls', get_theme_file_uri( '/inc/customizer/js/customize-controls.js' ), array(), '1.0', true );

}
add_action( 'customize_controls_enqueue_scripts', 'savona_panels_js' );
