<?php
/**
 * Initialize the laura Meta Boxes. 
 */
add_action( 'admin_init', 'laura_meta_boxes' );

/**
 * Meta Boxes laura code.
 *
 * You can find all the available option types in laura-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function laura_meta_boxes() {
  
  /**
   * Create a laura meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */

  $laura_meta_box_post = array(
    'id'          => 'laura_meta_box',
    'title'       => esc_html__( 'Laura Options', 'laura' ),
    'desc'        => '',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => esc_html__( 'Laura post options', 'laura' ),
        'id'          => 'laura_post_options',
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__( 'Set the fullwidth layout for this post.', 'laura' ),
        'id'          => 'laura_sigle_option_fullwidth',
        'type'        => 'on-off',
        'desc'        => esc_html__('If set to ON this post will have the fullwidth layout.','laura'),
        'std'         => ''
      ),
      array(
        'label'       => esc_html__( 'Use different sidebar for the single post?', 'laura' ),
        'id'          => 'laura_sigle_option_sidebar',
        'type'        => 'on-off',
        'desc'        => esc_html__('If set to ON this post will use different sidebar ("Sidebar for single blog posts").','laura'),
        'std'         => '',
        'condition'   => 'laura_sigle_option_fullwidth:is()',
        'operator'    => 'and',				
		),
      array(
        'label'       => esc_html__( 'Use Revolution slider instead of thr featured image?', 'laura' ),
        'id'          => 'laura_sigle_option_revslider',
        'type'        => 'on-off',
        'desc'        => esc_html__('If set to ON this post will use Revolution Slider instead of the feautured image.','laura'),
        'std'         => '',	
      ),
      array(
        'label'       => esc_html__( 'Use Revolution slider instead of featured image?', 'laura' ),
        'id'          => 'laura_sigle_option_revslider_alias',
        'type'        => 'revslider_select',
        'desc'        => esc_html__('If set to ON this you will use Revolution Slider instead of the feautured image.','laura'),
        'std'         => '',	
        'condition'   => 'laura_sigle_option_revslider:is(1)',
        'operator'    => 'and',				
      ),	  
    )
  );
  
  $laura_meta_box_page = array(
    'id'          => 'laura_meta_box',
    'title'       => esc_html__( 'Laura Options', 'laura' ),
    'desc'        => '',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => esc_html__( 'Laura page options', 'laura' ),
        'id'          => 'laura_pafe_options',
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__( 'Use Revolution slider instead of featured image?', 'laura' ),
        'id'          => 'laura_sigle_option_revslider',
        'type'        => 'on-off',
        'desc'        => esc_html__('If set to ON this page will use Revolution Slider instead of feautured image.','laura'),
        'std'         => '',	
      ),
      array(
        'label'       => esc_html__( 'Use Revolution slider instead of featured image?', 'laura' ),
        'id'          => 'laura_sigle_option_revslider_alias',
        'type'        => 'revslider_select',
        'desc'        => esc_html__('If set to ON this pyou will use Revolution Slider instead of feautured image.','laura'),
        'std'         => '',	
        'condition'   => 'laura_sigle_option_revslider:is(1)',
        'operator'    => 'and',				
      ),	  
    )
  );  
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) ){
    ot_register_meta_box( $laura_meta_box_post );
	ot_register_meta_box( $laura_meta_box_page );
	}

}