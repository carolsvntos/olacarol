<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  
  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 

    'sections'        => array( 
      array(
		'font'        => 'fa-cogs',
        'id'          => 'general',
        'title'       => 'General'
      ),
      array(
		'font'        => 'fa-cubes',
        'id'          => 'logo',
        'title'       => 'Logo'
      ),
      array(
		'font'        => 'fa-sliders',
        'id'          => 'home_page_revolution_slider',
        'title'       => 'Revolution slider'
      ),
      array(
		'font'        => 'fa-inbox',
        'id'          => 'post_box',
        'title'       => 'Featured Categories'
      ),
      array(
		'font'        => 'fa-clone',
        'id'          => 'about_us_block',
        'title'       => 'About us block'
      ),
      array(
		'font'        => 'fa-instagram',
        'id'          => 'instagram_block',
        'title'       => 'Instagram block'
      ),
      array(
		'font'        => 'fa-pencil',
        'id'          => 'blog_pages',
        'title'       => 'Blog pages'
      ),
      array(
		'font'        => 'fa-eraser',
        'id'          => 'styling_otions',
        'title'       => 'Style Your Theme'
      ),
	   array(
		'font'        => 'fa-css3',
        'id'          => 'custom_style',
        'title'       => 'Custom CSS'
      ),
      array(
		'font'        => 'fa-flickr',
        'id'          => 'custom_javascript_h',
        'title'       => 'Custom JavaScript'
      ),
      array(
		'font'        => 'fa-font',
        'id'          => 'typography',
        'title'       => 'Typography'
      ),
      array(
		'font'        => 'fa-connectdevelop',
        'id'          => 'social_options',
        'title'       => 'Social icons'
      ),
      array(
		'font'        => 'fa-folder',
        'id'          => '404_error_page',
        'title'       => '404 Error page'
      ),
      array(
		'font'        => 'fa-download',
        'id'          => 'footer_options',
        'title'       => 'Footer'
      ),
      array(
		'font'        => 'fa-support',
        'id'          => 'support',
        'title'       => 'Support & Child theme'
      ),
      array(
		'font'        => 'fa-upload',
        'id'          => 'import',
        'title'       => 'Import'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'grid_blog',
        'label'       => 'Which layout would you like to have for your blog?',
        'desc'        => 'Which layout would you like to have for your blog?',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Default Layout',
            'src'         => ''
          ),
          array(
            'value'       => '2',
            'label'       => 'Grid Layout',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'excpert_lenght',
        'label'       => 'Length of the excerpt for grid layout posts',
        'desc'        => 'Set how many words should be used in the excerpt for the grid layout.',
        'std'         => '',
        'type'        => 'numeric-slider',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '10,100,1',
        'class'       => '',
        'condition'   => 'grid_blog:is(2)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'display_scroll',
        'label'       => 'Display Navigation Scroll bar?',
        'desc'        => 'Scroll bar appears after you scroll down your website. If you wish to display this extra navigation menu with your logo set this setting to ON.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'top_bar',
        'label'       => 'Display upper bar with social icons and search?',
        'desc'        => 'This is the first block of the website above the logo. It contains social icons on the left and search widget on the right. Set this to ON if you wish to display it. Please note that even if you set this to ON you still have to add widgets under Appearance -&gt; Widgets. 

In our demos settings are:
- TOP SIDEBAR LEFT contains Premium Social widget.
- TOP SIDEBAR RIGHT contains Search widget.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'use_categories',
        'label'       => 'Display categories under Revolution slider?',
        'desc'        => 'Three categories below the slider allows you to add extra content that is not connected to your blog posts. The content can be anything from custom images to adverts.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'use_block2',
        'label'       => 'Display about us block under the three posts?',
        'desc'        => 'About us block below the slider is especially useful if you are using the full width version of the Theme. It can replace the about us section in the sidebar. Or you can even add something different here like a promotion with image and short description.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'use_block3',
        'label'       => 'Display Instagram block?',
        'desc'        => 'Instagram block above the footer can display your latest images from your Instagram. It\'s not connected to the Instagram in the sidebar, you can set that under Appearance -&gt; Widgets.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'use_fullwidth',
        'label'       => 'Use full width version of the blog?',
        'desc'        => 'Do you prefer full width layout of the blog? If yes, set this setting to on. You can set full width only for single blog pages via Theme options-> Blog pages -> DISPLAY SINGLE POST AS FULLWIDTH LAYOUT?',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'grid_blog:is(1)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'logo_position',
        'label'       => 'Where do you wish to display your logo?',
        'desc'        => 'Set the position of your logo!',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'logo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => 'Above menu',
            'src'         => ''
          ),
          array(
            'value'       => '2',
            'label'       => 'Under Menu',
            'src'         => ''
          ),
          array(
            'value'       => '3',
            'label'       => 'On the left side of menu',
            'src'         => ''
          )		  
        )
      ),	
      array(
        'id'          => 'use_site_title',
        'label'       => 'Do you wish to use site title?',
        'desc'        => 'Set this to ON if you wish to use site title instead of Logo',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'logo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),
      array(
        'id'          => 'load_google_fonts_site_title',
        'label'       => 'Load Google fonts',
        'desc'        => 'Add google fonts which are used in Typography Settings.',
        'std'         => 'Oswald',
        'type'        => 'google-fonts',
        'section'     => 'logo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'use_site_title:is(1)',
        'operator'    => 'and'
      ),	  
      array(
        'id'          => 'site_title_font',
        'label'       => 'Set site title typography',
        'desc'        => 'Change site title typography. Set the font family, size, color and style.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'logo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'use_site_title:is(1)',
        'operator'    => 'and'
      ),	  
      array(
        'id'          => 'logo',
        'label'       => 'Logo',
        'desc'        => 'Upload a logo for your theme, or specify the image url of your logo. (http://yoursite.com/logo.png)',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'logo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'use_site_title:is()',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'logo_retina',
        'label'       => 'Retina Logo',
        'desc'        => 'Upload a logo for your theme (retina dispplay), or specify the image url of your logo. (http://yoursite.com/logo@2x.png). Be sure to add @2x at the end, so if normal logo is logo.png, retina version is logo@2x.png',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'logo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'condition'   => 'use_site_title:is()',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'scroll_logo',
        'label'       => 'Custom Scroll Logo',
        'desc'        => 'Upload the logo that is displayed on the scroll bar. This is not required.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'logo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'condition'   => 'use_site_title:is()',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'use_rev_slider_home',
        'label'       => 'Do you wish to use the Revolution slider on Home Page?',
        'desc'        => 'Set this to ON if you wish to use the Revolution Slider on Home Page',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'home_page_revolution_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
      ),	  
      array(
        'id'          => 'rev_slider',
        'label'       => 'Revolution slider',
        'desc'        => 'Add Revolution slider alias for home page. Leave blank if you don\'t wish to have Revolution slider on the home page.',
        'std'         => '',
        'type'        => 'revslider_select',
        'section'     => 'home_page_revolution_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'use_rev_slider_home:is(1)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'rev_slider_margin',
        'label'       => 'Revolution slider top margin.',
        'desc'        => 'Set top margin for Revolution slider. If you wish for the Revolution slider to have a margin from menu set it here in px. In grid layout demo we use 30px margin.',
        'std'         => '0',
        'type'        => 'numeric-slider',
        'section'     => 'home_page_revolution_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '-20,50,1',
        'class'       => '',
        'condition'   => 'use_rev_slider_home:is(1)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'home_page_custom_post_blocks',
        'label'       => 'Home page custom categories blocks',
        'desc'        => 'This section is under Revolution slider in the live demo. If you wish to enable this option go to "General tab -&gt; Display categories under Revolution slider? and set it to "ON".

Three posts below the slider allows you to add extra content that is not connected to your blog posts. The content can be anything from custom images to adverts.',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'post_box',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'featured_categories',
        'label'       => 'Add featured categories.',
        'desc'        => 'You can add unlimited number of categories and sort them with drag and drop.',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'post_box',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'use_categories:is(1)',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'image',
            'label'       => 'Image',
            'desc'        => 'Add image.',
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'lower_title',
            'label'       => 'Lower title',
            'desc'        => 'Add lower title.',
            'std'         => 'Lower title',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),		  
          array(
            'id'          => 'link',
            'label'       => 'Link',
            'desc'        => 'Add link.',
            'std'         => 'https://premiumcoding.com',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),	  
      array(
        'id'          => 'featured_background',
        'label'       => 'Background color for the featured image boxes',
        'desc'        => 'Set the background color for the featured image boxes.',
        'std'         => '#fff',
        'type'        => 'colorpicker',
        'section'     => 'post_box',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),		  

      array(
        'id'          => 'about_us_block',
        'label'       => 'About us block',
        'desc'        => 'This section is under Revolution slider. If you wish to have enable this options go to "General tab -&gt; Display about us block under the three posts?" and set it to "ON".

About us block below the slider is especially useful if you are using the full width version of the Theme. It can replace the about us section in the sidebar. Or you can even add something different here like a promotion with image and short description.',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'about_us_block',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'block2_text',
        'label'       => 'Content text for the about us block',
        'desc'        => 'Set the content text for about us block. It can be anything.',
        'std'         => 'Set the text for about us block.',
        'type'        => 'textarea',
        'section'     => 'about_us_block',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'use_block2:is(1)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'block2_img',
        'label'       => 'Upload Image for About us block',
        'desc'        => 'Please upload your Image for About us block (usually your Avatar).',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'about_us_block',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'use_block2:is(1)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'block2_text',
        'label'       => 'Content text for the quote block',
        'desc'        => 'Set the text for about us block.',
        'std'         => 'Set the text for about us block.',
        'type'        => 'textarea',
        'section'     => 'about_us_block',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'use_block2:is(1)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'instagram_block',
        'label'       => 'Instagram Block',
        'desc'        => 'This section is above the footer. If you wish to have enable this option go to "General tab -&gt;Display Instagram block?" and set it to "ON"

Instagram block above the footer can display your latest images from your Instagram. It\'s not connected to the Instagram in the sidebar, you can set that under Appearance -&gt; Widgets.',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'instagram_block',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'block3_username',
        'label'       => 'Instagram block ID number',
        'desc'        => 'Enter the ID number of your instagram username. You can see this number under Instagram Feed plugin (User ID). Please be careful to enter a number and NOT your username. You can get this number from the "Instagram Feed" plugin settings.',
        'std'         => '3035270156',
        'type'        => 'text',
        'section'     => 'instagram_block',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'use_block3:is(1)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'block3_url',
        'label'       => 'Instagram block Username Link',
        'desc'        => 'Link to your profile on Instagram.',
        'std'         => 'http://instagram.com/laurapmc',
        'type'        => 'text',
        'section'     => 'instagram_block',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'use_block3:is(1)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'options_for_archive_category_view',
        'label'       => 'Options for archive/category view',
        'desc'        => 'Settings below will impact the functionality and design of your blog and archive pages (category for posts). You can decide which meta information you wish to display and which social icons you allow for sharing your content.',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'display_post_meta',
        'label'       => 'Display post meta information (date and author)',
        'desc'        => 'Check this if you wish to display post meta information such as date and author.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'display_socials',
        'label'       => 'Display social share icons?',
        'desc'        => 'Check this if you wish to display social share icons.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'display_reading',
        'label'       => 'Display reading time of the post?',
        'desc'        => 'Check this if you wish to display reading time of the post. This is displayed on category page under the post content.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'oiptions_for_single_post_page',
        'label'       => 'Options for single post',
        'desc'        => 'Settings below will impact the functionality and design of your single posts. You can decide which meta information you wish to display and which social icons you allow for sharing your content.',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'singe_fullwidth',
        'label'       => 'Display single post as fullwidth layout?',
        'desc'        => 'Check this if you wish to display sigle post fullwidth (without sidebar).',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
      array(
        'id'          => 'singe_sidebar',
        'label'       => 'Use different sidebar for single post?',
        'desc'        => 'Check this if you wish to use different sidebar ("Sidebar for single blog posts") for single post.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),		  
      array(
        'id'          => 'display_related',
        'label'       => 'Display related posts?',
        'desc'        => 'Check this if you wish to display related posts under the content of each post. Related posts are three posts that are connected to the current posts via categories.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'single_display_tags',
        'label'       => 'Display tags?',
        'desc'        => 'Check this if you wish to display tags under the main post content so your user can interact via tag connections.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'display_author_info',
        'label'       => 'Display author info?',
        'desc'        => 'Check this if you wish to display author information that is displayed below the content of each post. You can set the information for the author under Users -&gt; All Users. 

Plugin for better avatars can be downloaded from WordPress.org:
https://wordpress.org/plugins/wp-user-avatar/',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'single_display_post_meta',
        'label'       => 'Display post meta (date and author) on single blog post?',
        'desc'        => 'Check this if you wish to display meta information such as date and author.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'single_display_socials',
        'label'       => 'Display social share icons?',
        'desc'        => 'Check this if you wish to display social share icons on single blog posts.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'single_display_post_navigation',
        'label'       => 'Display post navigation?',
        'desc'        => 'Check this if you wish to enable prev/next navigation between posts. Post navigation can be found at the very end of each post, after the comments section. It allows you to move between posts (next and previous posts).',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'options_for_social_share_icons_on_single_post_and_category_archive_view',
        'label'       => 'Options for social share icons on single post and category/archive view',
        'desc'        => 'With this option you can select which social share icons you wish to show to your users.',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'single_display_share_select',
        'label'       => 'Social share icons to show',
        'desc'        => 'Select which social share icons you wish to show.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'blog_pages',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'display_socials:is(1),single_display_socials:is(1)',
        'operator'    => 'or',
        'choices'     => array( 
          array(
            'value'       => 'facebook_share',
            'label'       => 'Facebook',
            'src'         => ''
          ),
          array(
            'value'       => 'twitter_share',
            'label'       => 'Twitter',
            'src'         => ''
          ),
          array(
            'value'       => 'google_share',
            'label'       => 'Google plus',
            'src'         => ''
          ),
          array(
            'value'       => 'pinterest_share',
            'label'       => 'Pinterest',
            'src'         => ''
          ),
          array(
            'value'       => 'stumbleupon',
            'label'       => 'Stumbleupon',
            'src'         => ''
          ),
          array(
            'value'       => 'vk',
            'label'       => 'VK.COM',
            'src'         => ''
          ),		  
          array(
            'value'       => 'whatsapp',
            'label'       => 'Whatsapp',
            'src'         => ''
          )		  
        )
      ),
      array(
        'id'          => 'general_color_options',
        'label'       => 'General styling options',
        'desc'        => 'Main design aspects of your Theme can be set in the settings below.',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'mainColor',
        'label'       => 'Main theme Color',
        'desc'        => 'Set the main theme color. This is the leading color of the Theme and impacts the design in several places. If your blog or company has a leading color in the logo than this is the color you should set.',
        'std'         => '#f3a28b',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'main_border_color',
        'label'       => 'Main Border Color (for featured posts, related posts, widgets and comments)',
        'desc'        => 'Set the main Border Color (for featured posts, related posts, widgets and comments)',
        'std'         => '#f3a28b',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	
      array(
        'id'          => 'general_button_color_options',
        'label'       => 'MAIN BUTTON STYLING',
        'desc'        => 'Main design aspects for buttons can be set in the settings below.',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	 
      array(
        'id'          => 'button_border_color',
        'label'       => 'Button Border Color',
        'desc'        => 'Set the main button Border Color',
        'std'         => '#f3a28b',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	
      array(
        'id'          => 'button_background_color',
        'label'       => 'Button Background Color',
        'desc'        => 'Set the main button Background Color',
        'std'         => '#f3a28b',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),		  
      array(
        'id'          => 'button_font_color',
        'label'       => 'Buton Font Color',
        'desc'        => 'Set the main buton Font Color',
        'std'         => '#f3a28b',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'button_background_hover_color',
        'label'       => 'Button Background Color on Hover',
        'desc'        => 'Set the main button Background Color on Hover',
        'std'         => '#f3a28b',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	
      array(
        'id'          => 'button_font_hover_color',
        'label'       => 'Button Font Color on Hover',
        'desc'        => 'Set the main button Font Color on Hover',
        'std'         => '#f3a28b',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),		  	  
      array(
        'id'          => 'header_styling_options',
        'label'       => 'Header Styling',
        'desc'        => 'Below are the settings for designing your header.',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'display_header',
        'label'       => 'Hide header on home page?',
        'desc'        => 'If you wish to hide the header set this option to ON. This option is used if you use Revolution slider with menu. In our live demo this is used in the NEW PHOTOGRAPHY DEMO.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),  
      array(
        'id'          => 'top_menu_background_color',
        'label'       => 'Upper Bar background color',
        'desc'        => 'Pick a background color for the Upper Bar background color. This is the bar where social icons and search widget are placed in our live demos.',
        'std'         => '#222222',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'upper_bar_color',
        'label'       => 'Upper bar and scroll bar color',
        'desc'        => 'Set the color for elements for upper bar.',
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'menu_background_color',
        'label'       => 'Menu background color',
        'desc'        => 'Pick a background color for the menu. This is the background color for the main menu. In connection to this color you should also set the font color for the menu (dark background - light fonts and vice versa).',
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'header_background_color',
        'label'       => 'Header background color',
        'desc'        => 'Pick a background color for the Header in general.',
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'image_background_header',
        'label'       => 'Background Image for the header',
        'desc'        => 'If you wish to have a background image for the header instead of solid color you can set it here (leave blank if you don\'t need to  use image for your background).',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'use_menu_back',
        'label'       => 'Show solid background color when using background image?',
        'desc'        => 'Check this if you wish to use a solid color for the menu background when using background image.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'image_background_header:not()',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'menu_styling_options',
        'label'       => 'Menu styling options',
        'desc'        => 'Set styling for your menu.',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'menu_top_border',
        'label'       => 'Menu top border width',
        'desc'        => 'This is the border around menu and is the width of the higher border.',
        'std'         => '0',
        'type'        => 'numeric-slider',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '0,10,1',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'menu_bottom_border',
        'label'       => 'Width of your border for your menu (lower border)',
        'desc'        => 'This is the border around menu and is the width of the lower border.',
        'std'         => '0',
        'type'        => 'numeric-slider',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '0,10,1',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hamburger_menu_color',
        'label'       => 'Hamburger Menu Color',
        'desc'        => 'Set hamburger Menu Color (responsive menu button color)',
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
      array(
        'id'          => 'body_styling_options',
        'label'       => 'Body styling options',
        'desc'        => 'Set styling for the body section.',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'body_background_color',
        'label'       => 'Background color',
        'desc'        => 'Set the main color for your body background. This is the color that will be main background color of your website.',
        'std'         => '#fff',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sidebar_post_background_color',
        'label'       => 'Background color for blog, single post and sidebar',
        'desc'        => 'Set the background color for blog, single post and sidebar.',
        'std'         => '#fff',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'blog_meta_color',
        'label'       => 'Blog lower meta data color (reading time and social share)',
        'desc'        => 'Set the Blog lower meta data color (reading time and social share).',
        'std'         => '#fff',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
      array(
        'id'          => 'use_boxed',
        'label'       => 'Use boxed version?',
        'desc'        => 'Check this if you wish to use boxed version/design. You can see the example in our live demos.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'background_image_full',
        'label'       => 'Enable Background image (for boxed style)',
        'desc'        => 'Displays image as background for your boxed version.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'use_boxed:is(1)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'image_background',
        'label'       => 'Background Image (for boxed style)',
        'desc'        => 'Upload background image for your boxed version.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'use_boxed:is(1)',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_options',
        'label'       => 'Footer options',
        'desc'        => 'Options for footer section',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_background_color',
        'label'       => 'Footer background color',
        'desc'        => 'Here you can set footer background color.',
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_text_color',
        'label'       => 'Footer text color',
        'desc'        => 'Here you can set footer text color.',
        'std'         => '#222',
        'type'        => 'colorpicker',
        'section'     => 'styling_otions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'custom_style',
        'label'       => 'Custom CSS style',
        'desc'        => 'This is the place to enter your custom CSS if needed. If you are unsure what this field is for do not hesitate to contact us.',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'custom_style',
        'rows'        => '20',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),	  
      array(
        'id'          => 'custom_javascript',
        'label'       => 'Custom JavaScript',
        'desc'        => 'This is the place to enter your custom Java Script if needed. If you are unsure what this field is for do not hesitate to contact us.',
        'std'         => '',
        'type'        => 'javascript',
        'section'     => 'custom_javascript_h',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'google_fonts_heading',
        'label'       => 'Google Fonts',
        'desc'        => 'Typograhy is an important aspect of any blog Theme. You can add any font from <a href="https://fonts.google.com/"><b>Google Web font library</b></a>. First you need to add fonts that you wish to use in different parts of the theme (headings, body and menu). Default fonts will be loaded according to the layout you choose at the start.

Click on Add Google Font button and select the desired font from the drop-down menu. Set all variations of the font that you need (regular, italic, latin,...). Numbers from 100 to 900 means how bold the font is, so 100 is extra thin and 900 is extra bold. Please note that not all the fonts have all variations.',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'load_google_fonts',
        'label'       => 'Load Google fonts',
        'desc'        => 'Add google fonts which are used in Typography Settings.',
        'std'         => 'Oswald',
        'type'        => 'google-fonts',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'general_typography_settings',
        'label'       => 'General Typography settings',
        'desc'        => 'Set general typography options.',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'body_font',
        'label'       => 'Body Typography Settings',
        'desc'        => 'Change body typography. Set the font family, size, color and style.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_font',
        'label'       => 'Heading Typography Settings',
        'desc'        => 'Change heading typography. Set the font family and style.',
        'std'         => '',
        'type'        => 'typography_f_s',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => 'heading-font',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'menu_font',
        'label'       => 'Menu Typography Settings',
        'desc'        => 'Change munu typography. Set the font family.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'qoute_typography_settings',
        'label'       => 'Qoute Typography Settings',
        'desc'        => 'Qoute Typography Settings',
        'std'         => '',
        'type'        => 'typography_f_s',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'body_link_coler',
        'label'       => 'Link Typography (color of text links)',
        'desc'        => 'Change Link Typography (color of text links).',
        'std'         => '#343434',
        'type'        => 'colorpicker',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_font_h1',
        'label'       => 'H1 typography',
        'desc'        => 'Set H1 font size and color',
        'std'         => '',
        'type'        => 'typography_c_s',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_font_h2',
        'label'       => 'H2 typography',
        'desc'        => 'Set H2 font size and color.',
        'std'         => '',
        'type'        => 'typography_c_s',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_font_h3',
        'label'       => 'H3 typography',
        'desc'        => 'Set H3 font size and color.',
        'std'         => '',
        'type'        => 'typography_c_s',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_font_h4',
        'label'       => 'H4 typography',
        'desc'        => 'Set H4 font size and color.',
        'std'         => '',
        'type'        => 'typography_c_s',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_font_h5',
        'label'       => 'H5 typography',
        'desc'        => 'Set H5 font size and color.',
        'std'         => '',
        'type'        => 'typography_c_s',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_font_h6',
        'label'       => 'H6 typography',
        'desc'        => 'Set H6 font size and color.',
        'std'         => '',
        'type'        => 'typography_c_s',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'socialicons',
        'label'       => 'Add social profile icons',
        'desc'        => 'You can add unlimited number of social Icons and sort them with drag and drop.',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'social_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'url',
            'label'       => 'Icon',
            'desc'        => 'Add social icon from <a href="http://fontawesome.io/icons/" target="_blank"><b>Font Awesome library</b></a>.',
            'std'         => 'fa-facebook',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'link',
            'label'       => 'Link',
            'desc'        => 'Add link to your social profile.',
            'std'         => 'https://premiumcoding.com',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
      array(
        'id'          => 'social_icons_color',
        'label'       => 'Social icons color',
        'desc'        => 'Pick a color for the Social icons. This is used in top bar and footer.',
        'std'         => '#222222',
        'type'        => 'colorpicker',
        'section'     => 'social_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),		  
      array(
        'id'          => 'errorpagetitle',
        'label'       => '404 Error page Title',
        'desc'        => 'Set the title of the Error page (404 not found error).',
        'std'         => 'OOOPS! 404',
        'type'        => 'text',
        'section'     => '404_error_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'errorpage',
        'label'       => '404 Error page Title Content Text',
        'desc'        => 'Add a description for your 404 page.',
        'std'         => 'Sorry, but the page you are looking for has not been found.<br/>Try checking the URL for errors, then hit refresh.</br>Or you can simply click the icon below and go home:)',
        'type'        => 'textarea',
        'section'     => '404_error_page',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'copyright',
        'label'       => 'Copyright info',
        'desc'        => 'Add your Copyright or some other notice.',
        'std'         => '&#174; 2011 All rights reserved.',
        'type'        => 'textarea',
        'section'     => 'footer_options',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'simple_layout_builder',
        'label'       => 'Simple layout builder',
        'desc'        => '<br>If you wish to enable this options you need to set "General -&gt; Use theme simple layout builder?" to <b>"ON"</b>.
<br><br>
<span>Note:</span> Simple layout builder is in beta 3 stage. So please if you have any issues with the builder send us bug report via support tab in Theme\'s description. You can use the builder but it could still have some minor issues!
You can also send us feature requests. Thank you.<br><br>',
        'std'         => '',
        'type'        => 'heading',
        'section'     => 'simple_layout_builder',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sidebar_builder',
        'label'       => 'Sidebar builder',
        'desc'        => 'Here you can create custom sidebars.',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'simple_layout_builder',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'use_builder:is(1)',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'sidebar_description',
            'label'       => 'Description',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
      array(
        'id'          => 'test2',
        'label'       => 'Layout builder',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'simple_layout_builder',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'use_builder:is(1)',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'use_sidebar',
            'label'       => 'Use sidebar?',
            'desc'        => 'If you wish to use sidebar dor this options set to ON.',
            'std'         => '',
            'type'        => 'on-off',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'sidebar_select',
            'label'       => 'sidebar',
            'desc'        => '',
            'std'         => '',
            'type'        => 'sidebar-select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => 'use_post:not(1),use_sidebar:is(1),use_category:not(1)',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'use_post',
            'label'       => 'Use single post?',
            'desc'        => 'If you wish to display single post for this option set to ON.',
            'std'         => '',
            'type'        => 'on-off',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'single_post',
            'label'       => 'Single post',
            'desc'        => '',
            'std'         => '',
            'type'        => 'post-select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => 'use_post:is(1),use_sidebar:not(1),use_category:not(1)',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'use_category',
            'label'       => 'Use category list?',
            'desc'        => 'Select from which category you wish to display posts.',
            'std'         => '',
            'type'        => 'on-off',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'category_select',
            'label'       => 'Category',
            'desc'        => 'Select from which category you wish to display posts.',
            'std'         => '',
            'type'        => 'category-select',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => 'use_post:not(1),use_sidebar:not(1),use_category:is(1)',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'category_select_number',
            'label'       => 'How many post to display?',
            'desc'        => 'Select how mony post you wish to display.',
            'std'         => '',
            'type'        => 'numeric-slider',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '1,10,1',
            'class'       => '',
            'condition'   => 'use_post:not(1),use_sidebar:not(1),use_category:is(1)',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'dimension_select',
            'label'       => 'Dimensions',
            'desc'        => '',
            'std'         => '',
            'type'        => 'dimension',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'margin_select',
            'label'       => 'Margins',
            'desc'        => '',
            'std'         => '',
            'type'        => 'spacing',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
      array(
        'id'          => 'support_info',
        'label'       => 'Support Info',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'support',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'theme_documentation',
        'label'       => 'Theme documentation',
        'desc'        => 'Thank you for purchasing our theme. We hope that you will find it easy to use and customize. Please read the manual, because it covers almost all of the aspects needed about how to install and run the theme.<br><br> You can check the manual by clicking the help button on upper right corner. You can also download the documentation at: 
<ul><li>
<a href="https://premiumcoding.com/wp-content/uploads/2013/12/Laura-Wordpress-Theme-Documentation.pdf" target="_blank"><b>Documentation</b></a></li>
<li><a href="https://www.dropbox.com/s/9dldywuw6qn0q7s/laura-child.zip?dl=0"  target="_blank">Laura Child theme</a></li>
</ul>



<br><br>
If you have questions that are not answered in this guide, please go to the support system, where your questions will be answered:
<br><br>


<h3><a href="https://premiumcoding.com/login/" target="_blank">Support portal</a></h3>

<br>

Please verify the documentation and FAQ before posting.

If you like the theme, please show your appreciation by taking the time to rate it.
<br><br>
<h3>Plugins used in theme</h3>
<br>
<p>

Plugins that made the theme complete are in this directory. A short description is below.<br><br>

Theme uses several plugins for full functionality, below is a short description with links for all of them:<br><br>


1. Essential grid:<br>
   - this plugin is crucial as it adds galleries like seen in live demo. This is a premium plugin from Themepunch (just like Revolution Slider). It is an added value of $26. Plugin can be found inside theme folder /includes/plugins.
<br><br>
2. Revolution slider:<br>
   - another premium plugin from Themepunch that is used for great main Slideshows. It is an added value of $25. Plugin can be found inside theme folder /includes/plugins.
<br><br>
1. Instagram feed:<br>
   - this plugin adds the instagram gallery just above the footer. Instructions on how to connect to instagram are available in the plugin itself.
     Plugin can be downloaded from Wordpress repository at: <a href="https://wordpress.org/plugins/instagram-feed/" target="_blank">https://wordpress.org/plugins/instagram-feed/</a> 

<br><br>
2. Shortcodes ultimate:<br>
   - this plugin adds the shortcodes. Plugin is not neccessary but if you wish to use some nice typography effects like dropcap, quotes and columns, you will
     have to install it.
     Plugin can be downloaded from Wordpress repository at: <a href="https://wordpress.org/plugins/shortcodes-ultimate/" target="_blank">https://wordpress.org/plugins/shortcodes-ultimate/</a>  
<br><br>

3. Contact form:<br>
   - this is a plugin that you will need of you want to add the contact form. <br>Plugin can be downloaded
     from Wordpress repository at: <a href="http://wordpress.org/plugins/contact-form-7/" target="_blank">http://wordpress.org/plugins/contact-form-7/</a> 
<br><br>
4. Widgets Import:<br>
   - if you also wish to import widgets from demo, you can use this plugin: <a href="https://wordpress.org/plugins/widget-importer-exporter/" target="_blank">https://wordpress.org/plugins/widget-importer-exporter/</a> 
<br><br>
5. Recent tweets widget: <br>
   - this is a plugin that you will need of you want to add the twitter feed. Plugin can be downloaded
     from Wordpress repository at: <a href="https://wordpress.org/plugins/recent-tweets-widget/" target="_blank">https://wordpress.org/plugins/recent-tweets-widget/</a> 
<br><br>
6. Facebook pagelike widget - FACEBOOK FEED:<br>
   - this is a plugin that you will need of you want to add the facebook feed. Plugin can be downloaded
     from Wordpress repository at: <a href="https://wordpress.org/plugins/facebook-pagelike-widget/" target="_blank">https://wordpress.org/plugins/facebook-pagelike-widget/</a> 
<br><br>
7. Wysijan newsletters - NEWSLETTER PLUGIN:<br>
   - this is a plugin that you will need of you want to add the newsletter. Plugin can be downloaded
     from Wordpress repository at: <a href="https://wordpress.org/plugins/wysija-newsletters/" target="_blank">https://wordpress.org/plugins/wysija-newsletters/</a>
</p><br><br>




',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'support',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'import',
        'label'       => 'Auto Import options',
        'desc'        => 'With auto import you will import:
<ul>
 	<li>import demo content (pages and posts)</li>
 	<li>import theme options for selected import</li>
 	<li>import widgets</li>
 	<li>set menu locations</li>
 	<li>set home page</li>
	<li>import Revolution sliders</li>
</ul><br><br>
If auto imports fails you can still import it manually. Demo content is inside main zip file in demo folder.
<br><br>
For importing options use plugin : <a href="https://wordpress.org/plugins/options-importer/">Wp Options exporter</a>. Import only of_options_pmc option.
<br><br>
For import widgets use plugin : <a href="https://wordpress.org/plugins/widget-settings-importexport/">Widget settings export/import</a>
<br><br>
For WP xml import use default WP importer.<br><br> For Revolution sliders use default plugin import.
',
        'std'         => '',
        'type'        => 'import',
        'section'     => 'import',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}