<?php
add_action( 'after_setup_theme', 'laura_theme_setup' );
function laura_theme_setup() {
	/*woocommerce support*/
	add_theme_support( 'post-formats', array( 'link', 'gallery', 'video' , 'audio', 'quote') );
	/*feed support*/
	add_theme_support( 'automatic-feed-links' );
	/*post thumb support*/
	add_theme_support( 'post-thumbnails' ); // this enable thumbnails and stuffs
	/*title*/
	add_theme_support( 'title-tag' );
	/*lang*/
	load_theme_textdomain( 'laura', get_template_directory() . '/lang' );
	/*setting thumb size*/
	add_image_size( 'laura-gallery', 120,80, true ); 
	add_image_size( 'laura-widget', 255,170, true );
	add_image_size( 'laura-postBlock', 1500, 720, true );
	add_image_size( 'laura-related', 345,230, true );
	add_image_size( 'laura-postGridBlock', 390,240, true );
	
	require( get_template_directory() . '/updater/theme-updater.php' );	

	register_nav_menus(array(
	
			'laura_mainmenu' => esc_html__('Main Menu','laura'),
			'laura_respmenu' => esc_html__('Responsive Menu','laura'),	
			'laura_scrollmenu' => esc_html__('Scroll Menu','laura'),	
			
	));	
		
		
    register_sidebar(array(
        'id' => 'laura_sidebar',
        'name' => esc_html__('Sidebar main','laura'),
        'description' => esc_html__('This is main sidebar used in category, single post view and all pages with sidebar','laura'),		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	
    register_sidebar(array(
        'id' => 'laura-sidebar-single',
        'name' => esc_html__('Sidebar for single blog posts','laura'),
        'description' => esc_html__('This sidebar is for single blog posts. You can disable this options via Theme Options','laura'),		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	

    register_sidebar(array(
        'id' => 'laura_sidebar-top-left',
        'name' => esc_html__('Top sidebar left','laura'),
        'description' => esc_html__('This sidebar is located above header section and it on the left side.','laura'),		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));		  

    register_sidebar(array(
        'id' => 'laura_sidebar-top-right',
        'name' => esc_html__('Top sidebar right','laura'),
        'description' => esc_html__('This sidebar is located above header section and it on the right side.','laura'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));		
	
    register_sidebar(array(
        'id' => 'laura_sidebar-logo',
        'name' => esc_html__('Sidebar for advert in logo area','laura'),
        'description' => esc_html__('This sidebar is located inside the header on the right side of logo.','laura'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));			

    register_sidebar(array(
        'id' => 'laura-sidebar-under-header-left',
        'name' => esc_html__('Sidebar under header left','laura'),
        'description' => esc_html__('This sidebar is located just after header section on the left side.','laura'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
		
    register_sidebar(array(
        'id' => 'laura-sidebar-under-header-right',
        'name' => esc_html__('Sidebar under header right','laura'),
        'description' => esc_html__('This sidebar is located just after header section on the right side.','laura'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	
    register_sidebar(array(
        'id' => 'laura-sidebar-under-header-fullwidth',
        'name' => esc_html__('Sidebar under header full width','laura'),
        'description' => esc_html__('This sidebar is located just after header and it is fullwidth.','laura'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
	
	
    register_sidebar(array(
        'id' => 'laura-sidebar-footer-fullwidth',
        'name' => esc_html__('Sidebar above footer full width','laura'),
        'description' => esc_html__('This sidebar is located above footer and it is fullwidth.','laura'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	
    register_sidebar(array(
        'id' => 'laura-sidebar-footer-left',
        'name' => esc_html__('Sidebar above footer left','laura'),
        'description' => esc_html__('This sidebar is located above footer on the left side.','laura'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
		
    register_sidebar(array(
        'id' => 'laura-sidebar-footer-right',
        'name' => esc_html__('Sidebar above footer right','laura'),
        'description' => esc_html__('This sidebar is located above footer on the right side.','laura'),		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));			
	
		
 
		
    register_sidebar(array(
        'id' => 'laura_footer1',
        'name' => esc_html__('Footer sidebar 1','laura'),
        'description' => esc_html__('This sidebar is located inside footer as first sidebar.','laura'),		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'id' => 'laura_footer2',
        'name' => esc_html__('Footer sidebar 2','laura'),
        'description' => esc_html__('This sidebar is located inside footer as second sidebar.','laura'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
	
    
    register_sidebar(array(
        'id' => 'laura_footer3',
        'name' => esc_html__('Footer sidebar 3','laura'),
        'description' => esc_html__('This sidebar is located inside footer as third sidebar.','laura'),		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
	
	
	// Responsive walker menu
	class laura_Walker_Responsive_Menu extends Walker_Nav_Menu {
		
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
			global $wp_query;		
			$item_output = $attributes = $prepend ='';
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = join( ' ', apply_filters( '', array_filter( $classes ), $item ) );			
			$class_names = ' class="'. esc_attr( $class_names ) . '"';			   
			// Create a visual indent in the list if we have a child item.
			$visual_indent = ( $depth ) ? str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle"></i>', $depth) : '';
			// Load the item URL
			$attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url ) .'"' : '';
			// If we have hierarchy for the item, add the indent, if not, leave it out.
			// Loop through and output each menu item as this.
			if($depth != 0) {
				$item_output .= '<a '. $class_names . $attributes .'>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle"></i>' . $item->title. '</a><br>';
			} else {
				$item_output .= '<a ' . $class_names . $attributes .'><strong>'.$prepend.$item->title.'</strong></a><br>';
			}
			// Make the output happen.
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	
	
	// Main walker menu	
	class laura_Walker_Main_Menu extends Walker_Nav_Menu
	{		
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		   $this->curItem = $item;
		   global $wp_query;
		   $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		   $class_names = $value = '';
		   $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		   $class_names = ' class="'. esc_attr( $class_names ) . '"';
		   $image  = ! empty( $item->custom )     ? ' <img src="'.esc_attr($item->custom).'">' : '';
		   $output .= $indent . '<li id="menu-item-'.rand(0,9999).'-'. $item->ID . '"' . $value . $class_names .'>';
		   $attributes_title  = ! empty( $item->attr_title ) ? ' <i class="fa '  . esc_attr( $item->attr_title ) .'"></i>' : '';
		   $attributes  = ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		   $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		   $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		   $prepend = '';
		   $append = '';
		   if($depth != 0)
		   {
				$append = $prepend = '';
		   }
			$item_output = $args->before;
			$item_output .= '<a '. $attributes .'>';
			$item_output .= $attributes_title.$args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
			$item_output .= $args->link_after;
			$item_output .= '</a>';	
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	
	

}

define('BOX_PATH', get_template_directory() . '/includes/boxes/');
define('OPTIONS', 'of_options_pmc'); // Name of the database row where your options are stored
/*theme options*/
require( get_template_directory()  . '/option-tree/assets/theme-mode/functions.php' );

require_once (get_template_directory() . '/option-tree/import/plugins/options-importer.php');   // Options panel settings and custom settings
add_option('IMPORT_LAURA_OPTION', 'false');
add_option('IMPORT_OLD_OPTIONS', 'false');


if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	//Call action that sets
	if(get_option('IMPORT_LAURA_OPTION') == 'false'){
		import(get_template_directory() . '/option-tree/import/options.json');
		laura_options('default-layout-sidebar');
		update_option('IMPORT_LAURA_OPTION', 'true');
		update_option('IMPORT_OLD_OPTIONS', 'true' );
		wp_redirect(  esc_url_raw(admin_url( 'themes.php?page=ot-theme-options#section_import' )) );
	}
	else{
		wp_redirect(  esc_url_raw(admin_url( 'themes.php?page=ot-theme-options' )) );
	}
}

// Build Options

$includes =  get_template_directory() . '/includes/';
$widget_includes =  get_template_directory() . '/includes/widgets/';
/* include custom widgets */
require_once ($widget_includes . 'recent_post_widget.php'); 
require_once ($widget_includes . 'popular_post_widget.php');
require_once ($widget_includes . 'social_widget.php');
require_once ($widget_includes . 'post_widget.php');
require_once ($widget_includes . 'post_slider_widget.php');
require_once ($widget_includes . 'video_widget.php');
/* include scripts */
function laura_scripts() {
	/*scripts*/
	wp_enqueue_script('fitvideos', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'),true,false);		
	wp_enqueue_script('scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.js', array('jquery'),true,true);	
	wp_enqueue_script('laura_customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'),true,true);  	
	wp_enqueue_script('retinaimages', get_template_directory_uri() . '/js/retina.min.js', array('jquery'),true,true);	
	wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'),true,true);
	wp_enqueue_script('cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array('jquery'),true,true);		
	wp_register_script('news', get_template_directory_uri() . '/js/jquery.li-scroller.1.0.js', array('jquery'),true,true);  
	wp_enqueue_script('gistfile', get_template_directory_uri() . '/js/gistfile_pmc.js', array('jquery') ,true,true);  
	wp_enqueue_script('bxSlider', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery') ,true,false);  	
	wp_enqueue_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery') ,true,true);  
	wp_enqueue_script('infinity', get_template_directory_uri() . '/js/pmc_infinity.js', array('jquery') ,true,false);  	
	$share_options = ot_get_option( 'single_display_share_select' );
	if(!empty($share_options[0])){	
		wp_enqueue_script('addthis', 'https://s7.addthis.com/js/300/addthis_widget.js', array('jquery') ,true,false); 
	}
	if ( is_singular() && get_option( 'thread_comments' ) ) {wp_enqueue_script( 'comment-reply' ); }
	wp_enqueue_script('jquery-ui-tabs');
	/*style*/
	
	wp_enqueue_style( 'laura-style', get_template_directory_uri() . '/style.css' );

	$css_dir = get_template_directory() . '/css/'; // Shorten code, save 1 call
	ob_start(); // Capture all output (output buffering)
	require($css_dir . 'style_options.php'); // Generate CSS
	$css = ob_get_clean(); // Get generated CSS (output buffering)
    wp_add_inline_style( 'laura-style', $css );

	wp_enqueue_script('font-awesome_pms', 'https://use.fontawesome.com/30ede005b9.js' , '',null);				
}
add_action( 'wp_enqueue_scripts', 'laura_scripts' );



function laura_load_admin_style() {
	wp_enqueue_style( 'laura-style-admin', get_template_directory_uri() . '/css/admin_style.css' );
}

add_action( 'admin_enqueue_scripts', 'laura_load_admin_style' );
require_once ($includes . 'class-tgm-plugin-activation.php');

/*shorcode to excerpt*/
remove_filter( 'get_the_excerpt', 'wp_trim_excerpt'  ); //Remove the filter we don't want
add_filter( 'get_the_excerpt', 'laura_wp_trim_excerpt' ); //Add the modified filter
add_filter( 'the_excerpt', 'do_shortcode' ); //Make sure shortcodes get processed


function laura_wp_trim_excerpt($text = '') {
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');
		//$text = strip_shortcodes( $text ); //Comment out the part we don't want
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$excerpt_length = apply_filters('excerpt_length', 900);
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}

/*add boxed to body class*/

add_filter('body_class','laura_body_class');

function laura_body_class($classes) {
	$laura_data = get_option(OPTIONS);
	$class = '';
	if(!empty($laura_data['use_boxed'])){
		$classes[] = 'laura_boxed';
	}
	if(laura_globals('use_fullwidth')) {
		$classes[] = 'laura_fullwidth';
	}
	return $classes;
}

/* custom breadcrumb */
function laura_breadcrumb($title = false) {
	$laura_data = get_option(OPTIONS);
	$breadcrumb = '';
	if (!is_home()) {
		if (is_single()) {
			if (is_single()) {
				$name = '';
				if($title == false){
					$breadcrumb .= $name .' <span>'. get_the_title().'</span>';
				}
				else{
					$breadcrumb .= get_the_title();
				}
			}	
		} elseif (is_page()) {
			$breadcrumb .=  '<span>'.get_the_title().'</span>';
		}
		else if(is_tag()){
			$tag = get_query_var('tag');
			$tag = str_replace('-',' ',$tag);
			$breadcrumb .=  '<span>'.$tag.'</span>';
		}
		else if(is_search()){
			$breadcrumb .= esc_html__('Search results for ', 'laura') .'<span>'.get_search_query().'</span>';			
		} 
		else if(is_category()){
			$cat = get_query_var('cat');
			$cat = get_category($cat);
			$breadcrumb .=  '<span>'.$cat->name.'</span>';
		}
		else if(is_archive()){
			$breadcrumb .=  '<span>'.esc_html__('Archive','laura').'</span>';
		}	
		else{
			$breadcrumb .=  esc_html__('Home','laura');
		}

	}
	return $breadcrumb ;
}

/*remove post type from search*/
add_action( 'init', 'laura_remove_from_search', 99 );
 
function laura_remove_from_search() {
	global $wp_post_types;
	if ( post_type_exists( 'essential_grid' ) ) {
	    // exclude from search results
		$wp_post_types['essential_grid']->exclude_from_search = true;
	}
	if ( post_type_exists( 'nutrition-label' ) ) {
		// exclude from search results
		$wp_post_types['nutrition-label']->exclude_from_search = true;
	}	
}


/* social share links */
function laura_socialLinkSingle($link,$title) {
	$social = '';
	$social  .= '<div class="addthis_toolbox">';
	$social .= '<div class="laura-share">' . esc_html__('Share: ','laura') .  '</div><div class="custom_images">';
	$share_options = ot_get_option( 'single_display_share_select' );
	if(!empty($share_options[0])){
	$social .= '<a class="addthis_button_facebook" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'" ><i class="fa fa-facebook"></i></a>';
	}
	if(!empty($share_options[1])){
	$social .= '<a class="addthis_button_twitter" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-twitter"></i></a>';  
	}
	if(!empty($share_options[2])){
	$social .= '<a class="addthis_button_google_plusone_share" addthis:url="'.esc_url($link).'" g:plusone:count="false" addthis:title="'.esc_attr($title).'"><i class="fa fa-google-plus"></i></a>'; 	
	}	
	if(!empty($share_options[3])){
	$social .= '<a class="addthis_button_pinterest_share" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-pinterest"></i></a>'; 
	}
	if(!empty($share_options[4])){
	$social .= '<a class="addthis_button_stumbleupon" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-stumbleupon"></i></a>';
	}
	if(!empty($share_options[5])){
	$social .= '<a class="addthis_button_vk" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-vk"></i></a>';
	}	
	if(!empty($share_options[6])){
	$social .= '<a class="addthis_button_whatsapp" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-whatsapp"></i></a>';
	}	
	$social .='</div>';	
	$social .= '</div>'; 
	echo $social;
	
	
}
/* links to social profile */
function laura_socialLink() {
	$social = '';
	$laura_data = get_option(OPTIONS); 
	$icons = $laura_data['socialicons'];
	if(is_array($icons)){
		foreach ($icons as $icon){
			$social .= '<a target="_blank"  href="'.esc_url($icon['link']).'" title="'.esc_attr($icon['title']).'"><i class="fa '.esc_attr($icon['url']).'"></i></a>';	
		}
	}
	echo $social;
}


if( !function_exists( 'laura_fallback_menu' ) )
{

	function laura_fallback_menu()
	{
		$current = "";
		if (is_front_page()){$current = "class='current-menu-item'";} 
		echo "<div class='fallback_menu'>";
		echo "<ul class='Laura_fallback menu'>";
		echo "<li $current><a href='".esc_url(esc_url(home_url('/')))."'>".esc_attr__('Home','laura')."</a></li>";
		wp_list_pages('title_li=&sort_column=menu_order');
		echo "</ul></div>";
	}
}

/* get image from post */
function laura_getImage($id, $image){
	$return = '';
	if ( has_post_thumbnail($id) ){
		$return = get_the_post_thumbnail($id,$image);
		}
	else
		$return = '';
	
	return 	$return;
}

if ( ! isset( $content_width ) ) $content_width = 1180;

/*script for search text*/
function laura_add_this_script_footer(){ 

	$laura_script = '	
		"use strict"; 
		jQuery(document).ready(function($){	
			jQuery(".searchform #s").attr("value","'. esc_html__("Search and hit enter...","laura").'");	
			jQuery(".searchform #s").focus(function() {
				jQuery(".searchform #s").val("");
			});
			
			jQuery(".searchform #s").focusout(function() {
				if(jQuery(".searchform #s").attr("value") == "")
					jQuery(".searchform #s").attr("value","'. esc_html__("Search and hit enter...","laura") .'");
			});		
				
		});	
		
		';
	wp_add_inline_script( 'laura_customjs', $laura_script );
}

add_action( 'wp_enqueue_scripts', 'laura_add_this_script_footer' );



/* laura security for escaping variables*/
function laura_security($string){
	echo stripslashes(wp_kses(stripslashes($string),array('img' => array('src' => array(),'alt'=>array()),'a' => array('href' => array()),'span' => array(),'div' => array('class' => array()),'b' => array(),'strong' => array(),'br' => array(),'p' => array()))); 

}

/* SEARCH FORM */
function laura_search_form( $form ) {
	$form = '<form method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<input type="text" value="' . get_search_query() . '" name="s" id="s" />
	<i class="fa fa-search search-desktop"></i>
	</form>';

	return $form;
}
add_filter( 'get_search_form', 'laura_search_form' );


/*change excerpt end display*/
function laura_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'laura_excerpt_more' );


add_filter( 'the_content_more_link', 'laura_modify_read_more_link' );
function laura_modify_read_more_link() {
	$postmeta = get_post_custom(get_the_id()); 
	/*if not recipe post*/
	if(empty($postmeta["laura_sigle_option_recipe"][0])){
		return '<div class="laura-read-more"><a class="more-link" href="' . get_permalink() . '">'.esc_html__('Continue reading','laura').'</a></div>';
	/*if recipe post*/
	 } else { 
		return '<div class="laura-read-more"><a class="more-link" href="' . get_permalink() . '">'.esc_html__('Check out the recipe','laura').'</a></div>'; 
	} 	
}
/* get recipe meta*/
function laura_recipe($meta){
	if(class_exists('WPRM_Recipe_Manager')){
		$post_content = get_post(get_the_id());
		$content = $post_content->post_content;
		$recipes = WPRM_Recipe_Manager::get_recipe_ids_from_content( $content  );
		$recipe_out = WPRM_Recipe_Manager::get_recipe( $recipes[0]);
		$recipe = new WPRM_Recipe($recipes[0]);
		$recipe_meta = get_post_custom( $recipes[0] );
		if($meta == 'wprm_rating'){
			$rating = unserialize( $recipe_meta['wprm_rating'][0]);
			if($rating['count'] > 0 ){
				$rating_out = new WPRM_Template_Helper();
				return $rating_out->rating_stars( $rating, false );
			} else {
				return '<div class="wprm-recipe-rating">'. esc_attr__('Not yet rated','laura'). '</div>';
			}
		} else {
			return 	$recipe_meta[$meta][0];
		}
	}
}
/*show recipe on image hover*/
function laura_recipe_hover(){
	if(class_exists('WPRM_Recipe_Manager')){
		$post_content = get_post(get_the_id());
		$content = $post_content->post_content;
		$recipes = WPRM_Recipe_Manager::get_recipe_ids_from_content( $content  );
		$recipe_out = WPRM_Recipe_Manager::get_recipe( $recipes[0]);
		$recipe = new WPRM_Recipe($recipes[0]);
		$recipe_meta = get_post_custom( $recipes[0] );
		$ingredients = unserialize( $recipe_meta['wprm_ingredients'][0]); 
		if ( count( $ingredients ) > 0 ) : ?>
		<div class="wprm-recipe-ingredients-container laura-hover-recipe">
			<h3 class="wprm-recipe-header"><?php echo esc_attr(WPRM_Template_Helper::label( 'ingredients' )); ?></h3>
			<?php foreach ( $ingredients as $ingredient_group ) : ?>
			<div class="wprm-recipe-ingredient-group">
				<?php if ( $ingredient_group['name'] ) : ?>
				<h4 class="wprm-recipe-group-name wprm-recipe-ingredient-group-name"><?php echo esc_attr($ingredient_group['name']); ?></h4>
				<?php endif; // Ingredient group name. ?>
				<ul class="wprm-recipe-ingredients">
					<?php foreach ( $ingredient_group['ingredients'] as $ingredient ) : ?>
					<li class="wprm-recipe-ingredient" itemprop="recipeIngredient">
						<?php if ( $ingredient['amount'] ) : ?>
						<span class="wprm-recipe-ingredient-amount"><?php echo esc_attr($ingredient['amount']); ?></span>
						<?php endif; // Ingredient amount. ?>
						<?php if ( $ingredient['unit'] ) : ?>
						<span class="wprm-recipe-ingredient-unit"><?php echo esc_attr($ingredient['unit']); ?></span>
						<?php endif; // Ingredient unit. ?>
						<span class="wprm-recipe-ingredient-name"><?php echo esc_attr(WPRM_Template_Helper::ingredient_name( $ingredient, true )); ?></span>
						<?php if ( $ingredient['notes'] ) : ?>
						<span class="wprm-recipe-ingredient-notes"><?php echo esc_attr($ingredient['notes']); ?></span>
						<?php endif; // Ingredient notes. ?>
					</li>
					<?php endforeach; // Ingredients. ?>
				</ul>
			</div>
		 <?php endforeach; // Ingredient groups. ?>

		</div>
		<?php endif; // Ingredients. 
	}
}


/*set excerpt lenght for grid layout*/
if(!function_exists('laura_custom_excerpt_length')){
	function laura_custom_excerpt_length( $length ) {
		return 999;
	}
	add_filter( 'excerpt_length', 'laura_custom_excerpt_length', 999 );
}

add_filter('dynamic_sidebar_params','laura_blog_widgets');
 
/* Register our callback function */
function laura_blog_widgets($params) {	 
 
     global $blog_widget_num; //Our widget counter variable
 
     //Check if we are displaying "Footer Sidebar"
      if(isset($params[0]['id']) && $params[0]['id'] == 'sidebar-delas-blog'){
         $blog_widget_num++;
		$divider = 2; //This is number of widgets that should fit in one row		
 
         //If it's third widget, add last class to it
         if($blog_widget_num % $divider == 0){
	    $class = 'class="last '; 
	    $params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']);
	 }
 
	}
 
      return $params;
}

/*reading time*/
function laura_estimated_reading_time( $id) {
	$post = get_post($id);
    $words = str_word_count( strip_tags( $post-> post_content ) );
    $minutes = floor( $words / 200 );
	if($minutes < 1) $minutes = 1;
	wp_reset_postdata(); 
    return $minutes;
}

/*post options*/
function laura_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}

// function to count views.
function laura_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/*globals*/
function laura_globals($var){
	$laura_data = get_option(OPTIONS);
	if(!empty($laura_data[$var])){
		return true;
	}
	else{
		return false;
	}

}

/*get data from options*/
function laura_data($data){
	$laura_data = get_option(OPTIONS);
	if(isset($laura_data[$data])){
		return $laura_data[$data];	
	} else {
		return '';	
	}
}


function laura_block_one(){
$laura_data = get_option(OPTIONS);
$categories = $laura_data['featured_categories']; ?>
<div class="block1"> 
<?php
	foreach ($categories as $key => $category) {
		?>
		<a <?php if( ($key-1) % 3 == 0) echo 'class="last"';?>href="<?php echo esc_url($category['link']) ?>" title="Image">
		
			<div class="block1_img">
				<img src="<?php echo esc_url($category['image']) ?>" alt="<?php echo esc_html($category['title']) ?>">
			</div>
			
			<div class="block1_all_text">
				<div class="block1_text">
					<p><?php echo esc_html($category['title']) ?></p>
				</div>
				<div class="block1_lower_text">
					<p><?php echo esc_html($category['lower_title']) ?></p>
				</div>
			</div>									
		</a>						
	<?php
	} ?>
</div>
<?php
}


function laura_block_two(){
$laura_data = get_option(OPTIONS);
?>
	<div class="block2">
		<div class="block2_content">
					
			<div class="block2_img">
				<img class="block2_img_big" src="<?php echo esc_url($laura_data['block2_img']) ?>" alt="Image">
			</div>						
			
			<div class="block2_text">
				<p><?php laura_security($laura_data['block2_text']) ?></p>
			</div>
		</div>								
	</div>
<?php
}

/*laura logo output*/
function laura_logo(){?>
	<div class="logo-inner">
	    <div id="logo" class="<?php if(is_active_sidebar( 'laura_sidebar-logo' )) { echo 'logo-sidebar'; } ?>">
			<?php if(!laura_globals('use_site_title')) { ?>
				<?php $logo = esc_url(laura_data('logo')); ?>
				<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php if (!empty($logo)) {?>
				<?php echo esc_url($logo); ?><?php } else {?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php }?>"  alt="<?php esc_html(bloginfo('name')); ?> - <?php esc_html(bloginfo('description')) ?>" /></a>
			<?php } else { ?>
				<a class = "blog-name" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
			<?php } ?>
		</div>	
		<?php if(is_active_sidebar( 'laura_sidebar-logo' )) { ?> 
			<div class="logo-advertise">
				<?php if(is_active_sidebar( 'laura_sidebar-logo' )) { ?>
					<?php dynamic_sidebar( 'laura_sidebar-logo' ); ?>
				<?php } ?>
			</div>
		<?php } ?>									
	</div>	
<?php
}

/* remove double // char */
function laura_stripText($string) 
{ 
    return str_replace("\\",'',$string);
} 

/*import plugins*/

add_action( 'tgmpa_register', 'laura_required_plugins' );

function laura_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
	
		array(
				'name'      => esc_html__('Shortcode Ultimate','laura'),
				'slug'      => 'shortcodes-ultimate',
				'required'  => false,
			),		
		array(
				'name'      => esc_html__('Contact Form 7','laura'),
				'slug'      => 'contact-form-7',
				'required'  => false,
			),				
		array(
				'name'      => esc_html__('MailPoet Newsletters','laura'),
				'slug'      => 'wysija-newsletters',
				'required'  => false,
			),			
		array(
				'name'      => esc_html__('Instagram Feed','laura'),
				'slug'      => 'instagram-feed',
				'required'  => false,
			),							
			
			
				
    );

    $config = array(
        'id'           => 'laura',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => get_template_directory() . '/includes/plugins/',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'laura' ),
            'menu_title'                      => __( 'Install Plugins', 'laura' ),
            'installing'                      => __( 'Installing Plugin: %s', 'laura' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'laura' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'laura' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'laura' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'laura' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'laura' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'laura' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'laura' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'laura' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'laura' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'laura' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'laura' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'laura' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'laura' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'laura' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}
?>