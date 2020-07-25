<?php
add_action( 'after_setup_theme', 'everly_theme_setup' );
function everly_theme_setup() {
	/*woocommerce support*/
	add_theme_support( 'post-formats', array( 'link', 'everly-gallery', 'video' , 'audio', 'quote') );
	/*feed support*/
	add_theme_support( 'automatic-feed-links' );
	/*post thumb support*/
	add_theme_support( 'post-thumbnails' ); // this enable thumbnails and stuffs
	/*title*/
	add_theme_support( 'title-tag' );
	/*lang*/
	load_theme_textdomain( 'everly-lite', get_template_directory() . '/lang' );
	/*setting thumb size*/
	add_image_size( 'everly-gallery', 120,80, true ); 
	add_image_size( 'everly-widget', 220,150, true );
	add_image_size( 'everly-postBlock', 1180, 770, true );
	add_image_size( 'everly-related', 345,230, true );
	add_image_size( 'everly-postGridBlock', 590,390, true );
	add_image_size( 'everly-postGridBlock-2', 590,437, true );	
	register_nav_menus(array(
	
			'everly_mainmenu' => esc_html__('Main Menu','everly-lite'),
			'everly_respmenu' => esc_html__('Responsive Menu','everly-lite'),	
			'everly_scrollmenu' => esc_html__('Scroll Menu','everly-lite'),	
			
	));	
	
	/*updater*/
	require( get_template_directory() . '/updater/theme-updater.php' );
		
    register_sidebar(array(
        'id' => 'everly_sidebar',
        'name' => esc_html__('Sidebar main','everly-lite'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	

    register_sidebar(array(
        'id' => 'everly_sidebar-top-left',
        'name' => esc_html__('Top sidebar left','everly-lite'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));		  

    register_sidebar(array(
        'id' => 'everly_sidebar-top-right',
        'name' => esc_html__('Top sidebar right','everly-lite'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));		
		
 
    register_sidebar(array(
        'id' => 'everly_sidebar-logo',
        'name' => esc_html__('Sidebar for advert in logo area','everly-lite'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));	

    register_sidebar(array(
        'id' => 'everly_sidebar-under-header-left',
        'name' => esc_html__('Sidebar under header left','everly-lite'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
		
    register_sidebar(array(
        'id' => 'everly-sidebar-under-header-right',
        'name' => esc_html__('Sidebar under header right','everly-lite'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	
    register_sidebar(array(
        'id' => 'everly-sidebar-under-header-fullwidth',
        'name' => esc_html__('Sidebar under header full width','everly-lite'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
	
	
    register_sidebar(array(
        'id' => 'everly-sidebar-footer-fullwidth',
        'name' => esc_html__('Sidebar above footer full width','everly-lite'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	
    register_sidebar(array(
        'id' => 'everly-sidebar-footer-left',
        'name' => esc_html__('Sidebar above footer left','everly-lite'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
		
    register_sidebar(array(
        'id' => 'everly-sidebar-footer-right',
        'name' => esc_html__('Sidebar above footer right','everly-lite'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));			
	
		
    register_sidebar(array(
        'id' => 'everly_footer1',
        'name' => esc_html__('Footer sidebar 1','everly-lite'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'id' => 'everly_footer2',
        'name' => esc_html__('Footer sidebar 2','everly-lite'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
	
    
    register_sidebar(array(
        'id' => 'everly_footer3',
        'name' => esc_html__('Footer sidebar 3','everly-lite'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
	
	
	// Responsive walker menu
	class everly_Walker_Responsive_Menu extends Walker_Nav_Menu {
		
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
	class everly_Walker_Main_Menu extends Walker_Nav_Menu
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




/*-----------------------------------------------------------------------------------*/
// Options Framework
/*-----------------------------------------------------------------------------------*/
// Paths to admin functions
define('EVERLY_ADMIN_PATH', get_template_directory() . '/admin/');
define('EVERLY_BOX_PATH', get_template_directory() . '/includes/boxes/');
define('EVERLY_ADMIN_DIR', get_template_directory_uri() . '/admin/');
define('EVERLY_OPTIONS', 'of_options_pmc'); // Name of the database row where your options are stored
require_once (get_template_directory() . '/admin/import/plugins/options-importer.php');   // Options panel settings and custom settings
add_option('IMPORT_EVERLY_OPTION_1', 'false');
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	//Call action that sets
	if(get_option('IMPORT_EVERLY_OPTION_1') == 'false'){
		import(get_template_directory() . '/admin/import/everly_option_1.json');
		update_option('IMPORT_EVERLY_OPTION_1', 'true');
		wp_redirect(  esc_url_raw(admin_url( 'themes.php?page=optionsframework&pmc_import=false' )) );
	}
	else{
		wp_redirect(  esc_url_raw(admin_url( 'themes.php?page=optionsframework' )) );
	}
}

// Build Options

require_once (get_template_directory() . '/admin/theme-options.php');   // Options panel settings and custom settings
require_once (get_template_directory() . '/admin/admin-interface.php');  // Admin Interfaces
$everly_includes =  get_template_directory() . '/includes/';
$everly_widget_includes =  get_template_directory() . '/includes/widgets/';
/* include custom widgets */
require_once ($everly_widget_includes . 'recent_post_widget.php'); 
require_once ($everly_widget_includes . 'popular_post_widget.php');
require_once ($everly_widget_includes . 'social_widget.php');
require_once ($everly_widget_includes . 'post_widget.php');
require_once ($everly_widget_includes . 'post_slider_widget.php');
require_once ($everly_widget_includes . 'video_widget.php');
/* include scripts */
function everly_scripts() {
	/*scripts*/
	wp_enqueue_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'),true,true);	
	wp_enqueue_script('jquery.scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.js', array('jquery'),true,true);	
	wp_enqueue_script('retina', get_template_directory_uri() . '/js/retina.min.js', array('jquery'),true,true);	
	wp_enqueue_script('everly_customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'),true,true);  	      
	wp_enqueue_script('jquery.prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'),true,true);
	wp_enqueue_script('jquery.easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'),true,true);
	wp_enqueue_script('jquery.cycle.all.min', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array('jquery'),true,true);		
	wp_enqueue_script('istfile_pmc', get_template_directory_uri() . '/js/gistfile_pmc.js', array('jquery') ,true,true);  
	wp_enqueue_script('jquery.bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery') ,true,false);  	
	wp_enqueue_script('pmc_infinity', get_template_directory_uri() . '/js/pmc_infinity.js', array('jquery') ,true,false);  	
	wp_enqueue_script('jquery-ui-tabs');
	/*style*/
	wp_enqueue_style( 'prettyphoto', get_template_directory_uri() . '/css/prettyPhoto.css', 'style');
	
	global $everly_data;
	if(isset($everly_data['body_font'])){			
		if(($everly_data['body_font']['face'] != 'verdana') and ($everly_data['body_font']['face'] != 'trebuchet') and 
			($everly_data['body_font']['face'] != 'georgia') and ($everly_data['body_font']['face'] != 'Helvetica Neue') and 
			($everly_data['body_font']['face'] != 'times,tahoma') and ($everly_data['body_font']['face'] != 'arial')) {	
				if(isset($everly_data['google_body_custom']) && $everly_data['google_body_custom'] != ''){
					$font_explode = explode(' ' , $everly_data['google_body_custom']);
					$font_body  = '';
					$size = count($font_explode);
					$count = 0;
					if(count($font_explode) > 0){
						foreach($font_explode as $font){
							if($count < $size-1){
								$font_body .= $font_explode[$count].'+';
							}
							else{
								$font_body .= $font_explode[$count];
							}
							$count++;
						}
					}else{
						$font_body = $everly_data['google_body_custom'];
					}
				}else{
					$font_body = $everly_data['body_font']['face'];
				}					
		}						
	}		
	if(isset($everly_data['heading_font'])){			
		if(($everly_data['heading_font']['face'] != 'verdana') and ($everly_data['heading_font']['face'] != 'trebuchet') and 
			($everly_data['heading_font']['face'] != 'georgia') and ($everly_data['heading_font']['face'] != 'Helvetica Neue') and 
			($everly_data['heading_font']['face'] != 'times,tahoma') and ($everly_data['heading_font']['face'] != 'arial')) {	
				if(isset($everly_data['google_heading_custom']) && $everly_data['google_heading_custom'] != ''){
					$font_explode = explode(' ' , $everly_data['google_heading_custom']);
					$font_heading  = '';
					$size = count($font_explode);
					$count = 0;
					if(count($font_explode) > 0){
						foreach($font_explode as $font){
							if($count < $size-1){
								$font_heading .= $font_explode[$count].'+';
							}
							else{
								$font_heading .= $font_explode[$count];
							}
							$count++;
						}
					}else{
						$font_heading = $everly_data['google_heading_custom'];
					}
				}else{
					$font_heading = $everly_data['heading_font']['face'];
				}
		
				$font_heading = '|'.$font_heading;		
		}						
	}
	if(!empty($everly_data['google_menu_custom'])){			
		$font_explode = explode(' ' , esc_attr($everly_data['google_menu_custom']));
		$font_menu  = '';
		$size = count($font_explode);
		$count = 0;
		if(count($font_explode) > 0){
			foreach($font_explode as $font){
				if($count < $size-1){
					$font_menu .= $font_explode[$count].'+';
				}
				else{
					$font_menu .= $font_explode[$count];
				}
				$count++;
			}
		}else{
			$font_menu = esc_attr($everly_data['google_menu_custom']);
		}
		$font_menu = '|'. esc_attr($everly_data['google_menu_custom']);		
	}	
	
	/* FONT FOR QUOTE */
	
	if(!empty($everly_data['google_quote_custom'])){			
		$font_explode = explode(' ' , esc_attr($everly_data['google_quote_custom']));
		$font_quote  = '';
		$size = count($font_explode);
		$count = 0;
		if(count($font_explode) > 0){
			foreach($font_explode as $font){
				if($count < $size-1){
					$font_quote .= $font_explode[$count].'+';
				}
				else{
					$font_quote .= $font_explode[$count];
				}
				$count++;
			}
		}else{
			$font_quote = esc_attr($everly_data['google_quote_custom']);
		}
		$font_quote = '|'. esc_attr($everly_data['google_quote_custom']);		
	}		

	wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css?family='.$font_body . $font_heading . $font_menu . $font_quote, false);		

	wp_enqueue_script('font-awesome_pms', 'https://use.fontawesome.com/30ede005b9.js' , '',null);				
}
add_action( 'wp_enqueue_scripts', 'everly_scripts' );
require_once (get_template_directory() . '/admin/admin-functions.php');  // Theme actions based on options settings
require_once ($everly_includes . 'class-tgm-plugin-activation.php');
 
/*add boxed to body class*/

add_filter('body_class','everly_body_class');

function everly_body_class($classes) {
	global $everly_data;
	$class = '';
	if(isset($everly_data['use_boxed'])){
		$classes[] = 'everly_boxed';
	}
	return $classes;
}

/* custom breadcrumb */
function everly_breadcrumb($title = false) {
	global $everly_data;
	$breadcrumb = '';
	if (!is_home()) {
		if($title == false){
			$breadcrumb .= '<a href="';
			$breadcrumb .=  esc_url(home_url('/'));
			$breadcrumb .=  '">';
			$breadcrumb .= esc_html__('Home', 'everly-lite');
			$breadcrumb .=  "</a> &#187; ";
		}
		if (is_single()) {
			if (is_single()) {
				$name = '';
				if($title == false){
					$breadcrumb .= $name .' &#187; <span>'. get_the_title().'</span>';
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
			$breadcrumb .= esc_html__('Search results for ', 'everly-lite') .'"<span>'.get_search_query().'</span>"';			
		} 
		else if(is_category()){
			$cat = get_query_var('cat');
			$cat = get_category($cat);
			$breadcrumb .=  '<span>'.$cat->name.'</span>';
		}
		else if(is_archive()){
			$breadcrumb .=  '<span>'.esc_html__('Archive','everly-lite').'</span>';
		}	
		else{
			$breadcrumb .=  esc_html__('Home','everly-lite');
		}

	}
	return $breadcrumb ;
}
/* social share links */
function everly_socialLinkSingle($link,$title) {
	$social = '';
	$social  .= '<div class="addthis_toolbox">';
	$social .= '<div class="custom_images">';
	$social .= '<a class="addthis_button_facebook" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'" ><i class="fa fa-facebook"></i></a>';
	$social .= '<a class="addthis_button_twitter" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-twitter"></i></a>';  
	$social .= '<a class="addthis_button_pinterest_share" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-pinterest"></i></a>'; 
	$social .= '<a class="addthis_button_google_plusone_share" addthis:url="'.esc_url($link).'" g:plusone:count="false" addthis:title="'.esc_attr($title).'"><i class="fa fa-google-plus"></i></a>'; 	
	$social .= '<a class="addthis_button_stumbleupon" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-stumbleupon"></i></a>';
	$social .='</div><script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js"></script>';	
	$social .= '</div>'; 
	echo $social;
	
	
}
/* links to social profile */
function everly_socialLink() {
	$social = '';
	global $everly_data; 
	$icons = $everly_data['socialicons'];
	if(is_array($icons)){
		foreach ($icons as $icon){
			$social .= '<a target="_blank"  href="'.esc_url($icon['link']).'" title="'.esc_attr($icon['title']).'"><i class="fa '.esc_attr($icon['url']).'"></i></a>';	
		}
	}
	echo $social;
}

add_filter('the_content', 'everly_addlightbox');
/* add lightbox to images*/
function everly_addlightbox($content)
{	global $post;
	$pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
  	$replacement = '<a$1href=$2$3.$4$5 rel="lightbox[%LIGHTID%]"$6>';
    $content = preg_replace($pattern, $replacement, $content);
	if(isset($post->ID))
		$content = str_replace("%LIGHTID%", $post->ID, $content);
    return $content;
}
/* remove double // char */
function everly_stripText($string) 
{ 
    return str_replace("\\",'',$string);
} 
	
/* custom post types */	
add_action('save_post', 'everly_update_post_type');
add_action("admin_init", "everly_add_meta_box");



function everly_add_meta_box(){
	add_meta_box("everly_post_type", esc_attr__("Everly Lite options",'everly-lite'), "everly_post_type", "post", "normal", "high");	
	
}	



function everly_post_type(){
	global $post;
	$everly_data = get_post_custom(get_the_id());

	if (isset($everly_data["video_post_url"][0])){
		$video_post_url = $everly_data["video_post_url"][0];
	}else{
		$video_post_url = "";
	}	
	
	if (isset($everly_data["link_post_url"][0])){
		$link_post_url = $everly_data["link_post_url"][0];
	}else{
		$link_post_url = "";
	}	
	
	if (isset($everly_data["audio_post_url"][0])){
		$audio_post_url = $everly_data["audio_post_url"][0];
	}else{
		$audio_post_url = "";
	}


?>
    <div id="portfolio-category-options">
        <table cellpadding="15" cellspacing="15">		
            <tr class="videoonly" style="border-bottom:1px solid #000;">
            	<td><label><?php esc_attr_e('Video URL(*required) - add if you select video post:','everly-lite') ?> <i style="color: #999999;"></i></label><br><input name="video_post_url" value="<?php echo esc_attr($video_post_url); ?>" /> </td>	
			</tr>		
            <tr class="linkonly" >
            	<td><label><?php esc_attr_e('Link URL - add if you select link post : ','everly-lite') ?><i style="color: #999999;"></i></label><br><input name="link_post_url"  value="<?php echo esc_attr($link_post_url); ?>" /></td>
            </tr>				
            <tr class="audioonly">
            	<td><label><?php esc_attr_e('Audio URL - add if you select audio post ','everly-lite') ?> <i style="color: #999999;"></i></label><br><input name="audio_post_url"  value="<?php echo esc_attr($audio_post_url); ?>" /></td>
            </tr>	
            <tr class="nooptions">
            	<td><?php esc_attr_e('No options for this post type.','everly-lite') ?> </td>
            </tr>				
        </table>
    </div>
	<style>
	div#portfolio-category-options table {width:100%;}
	div#portfolio-category-options td textarea {width:100%; height:80px}
	#portfolio-category-options input {width:100%}
	</style>
	<script>
	"use strict"; 
	jQuery(document).ready(function(){	
			if (jQuery("input[name=post_format]:checked").val() == 'video'){
				jQuery('.videoonly').show();
				jQuery('.audioonly, .linkonly , .nooptions').hide();}
				
			else if (jQuery("input[name=post_format]:checked").val() == 'link'){
				jQuery('.linkonly').show();
				jQuery('.videoonly, .select_video,.nooptions').hide();	}	
				
			else if (jQuery("input[name=post_format]:checked").val() == 'audio'){
				jQuery('.videoonly, .linkonly,.nooptions').hide();	
				jQuery('.audioonly').show();}						
			else{
				jQuery('.videoonly').hide();
				jQuery('.audioonly').hide();
				jQuery('.linkonly').hide();
				jQuery('.nooptions').show();}	
			
			jQuery("input[name=post_format]").change(function(){
			if (jQuery("input[name=post_format]:checked").val() == 'video'){
				jQuery('.videoonly').show();
				jQuery('.audioonly, .linkonly,.nooptions').hide();}
				
			else if (jQuery("input[name=post_format]:checked").val() == 'link'){
				jQuery('.linkonly').show();
				jQuery('.videoonly, .audioonly,.nooptions').hide();	}	
				
			else if (jQuery("input[name=post_format]:checked").val() == 'audio'){
				jQuery('.videoonly, .linkonly,.nooptions').hide();	
				jQuery('.audioonly').show();}	
				
			else{
				jQuery('.videoonly').hide();
				jQuery('.audioonly').hide();
				jQuery('.linkonly').hide();
				jQuery('.nooptions').show();}				
		});
	});
	</script>	
      
<?php
	
}
function everly_update_post_type(){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){

		if( isset($_POST["video_post_url"]) ) {
			update_post_meta($post->ID, "video_post_url", $_POST["video_post_url"]);
		}		
		if( isset($_POST["link_post_url"]) ) {
			update_post_meta($post->ID, "link_post_url", $_POST["link_post_url"]);
		}	
		if( isset($_POST["audio_post_url"]) ) {
			update_post_meta($post->ID, "audio_post_url", $_POST["audio_post_url"]);
		}							
		
	}
	
	
	
}
if( !function_exists( 'everly_fallback_menu' ) )
{

	function everly_fallback_menu()
	{
		$current = "";
		if (is_front_page()){$current = "class='current-menu-item'";} 
		echo "<div class='fallback_menu'>";
		echo "<ul class='Everly Lite_fallback menu'>";
		echo "<li $current><a href='".esc_url(esc_url(home_url('/')))."'>".esc_attr__('Home','everly-lite')."</a></li>";
		wp_list_pages('title_li=&sort_column=menu_order');
		echo "</ul></div>";
	}
}

add_filter( 'the_category', 'everly_add_nofollow_cat' );  

function everly_add_nofollow_cat( $text ) { 
	$text = str_replace('rel="category tag"', "", $text); 
	return $text; 
}

/* get image from post */
function everly_getImage($id, $image){
	$return = '';
	if ( has_post_thumbnail() ){
		$return = get_the_post_thumbnail($id,$image);
		}
	else
		$return = '';
	
	return 	$return;
}

if ( ! isset( $content_width ) ) $content_width = 800;


function everly_add_this_script_footer(){ 

	$everly_script = '	
		"use strict"; 
		jQuery(document).ready(function($){	
			jQuery(".searchform #s").attr("value","'. esc_html__("Search and hit enter...",'everly-lite').'");	
			jQuery(".searchform #s").focus(function() {
				jQuery(".searchform #s").val("");
			});
			
			jQuery(".searchform #s").focusout(function() {
				if(jQuery(".searchform #s").attr("value") == "")
					jQuery(".searchform #s").attr("value","'. esc_html__("Search and hit enter...",'everly-lite') .'");
			});		
				
		});	
		
		';
	wp_add_inline_script( 'everly_customjs', $everly_script );
}

add_action( 'wp_enqueue_scripts', 'everly_add_this_script_footer' );

function everly_security($string){
	echo wp_kses(stripslashes($string),array('img' => array('src' => array(),'alt'=>array()),'a' => array('href' => array()),'span' => array(),'div' => array('class' => array()),'b' => array(),'strong' => array(),'br' => array(),'p' => array())); 

}

/* SEARCH FORM */
function everly_search_form( $form ) {
	$form = '<form method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
	<input type="text" value="' . get_search_query() . '" name="s" id="s" />
	<i class="fa fa-search search-desktop"></i>
	</form>';

	return $form;
}
add_filter( 'get_search_form', 'everly_search_form' );



	add_action('save_post', 'everly_update_post_rev');
	add_action("admin_init", "everly_add_rev");
	
	function everly_add_rev(){
	
	$screens = array( 'post', 'page' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			"everly_post_content", esc_attr("Everly Lite Options",'everly-lite'), "everly_post_content",
			$screen,'side','high'
		);
	}	
		
		
	}	
	


	
	function everly_post_content(){	
		global $post;	
		$everly_data = get_post_custom(get_the_id());
		if (isset($everly_data["custom_post_rev"][0])){		
			$custom_post_rev = $everly_data["custom_post_rev"][0];	
		}else{		
			$custom_post_rev = "";	
		}		
		global $wp_registered_sidebars;
		if (isset($everly_data["sidebar"][0])){
			$sidebar = $everly_data["sidebar"][0];
		}else{
			$sidebar = "";
		}	?>	
         <table cellpadding="15" cellspacing="0">	
			<tr>
			<td><label><?php esc_html_e('Select custom revolution slider:','everly-lite') ?> </label>				
			<br>	
				<?php if(shortcode_exists( 'rev_slider')) {  ?>
				<select id="custom_post_rev"  name="custom_post_rev">	
				<option value="empty" <?php if($custom_post_rev == 'empty') echo 'selected'; ?>><?php esc_html_e('Empty','everly-lite'); ?></option>	
				<?php 				
				$slider = new RevSlider();				
				$arrSliders = $slider->getArrSliders();				
				if(!empty($arrSliders)){ 	
					$revSliderArray = array();					
					foreach($arrSliders as $sliders){ ?>
						<option value="<?php echo esc_attr($sliders->getAlias()); ?>" <?php if($sliders->getAlias() == $custom_post_rev) echo 'selected'; ?>>
						<?php echo esc_attr($sliders->getShowTitle()) ?>
						</option>						
					<?php
					} 						
				}																
				?>

				<?php } ?>
			</td>            
			</tr>		
		</table>  	
		
	<?php	
	}
	
	function everly_update_post_rev()
	{
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){

		if( isset($_POST["custom_post_rev"]) ) {
			update_post_meta($post->ID, "custom_post_rev", $_POST["custom_post_rev"]);
		}		
		if( isset($_POST["sidebar"]) ) {
			update_post_meta($post->ID, "sidebar", $_POST["sidebar"]);
		}	
	}
	}
	
/*the_excerpt*/

function everly_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'everly_excerpt_length', 999 );

function everly_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'everly_excerpt_more' );


add_filter( 'the_content_more_link', 'everly_modify_read_more_link' );
function everly_modify_read_more_link() {
return '<div class="everly-read-more"><a class="more-link" href="' . get_permalink() . '">'.esc_html__('Continue reading','everly-lite').'</a></div>';
}

add_filter('dynamic_sidebar_params','everly_blog_widgets');
 
/* Register our callback function */
function everly_blog_widgets($params) {	 
 
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
function everly_estimated_reading_time( $id) {
	$post = get_post($id);
    $words = str_word_count( strip_tags( $post-> post_content ) );
    $minutes = floor( $words / 200 );
	if($minutes < 1) $minutes = 1;
	wp_reset_postdata(); 
    return $minutes;
}

/*post options*/
function everly_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
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
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function everly_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    everly_set_post_views($post_id);
}
add_action( 'wp_head', 'everly_track_post_views');

function everly_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/*globals*/

function everly_globals($var){
	global $everly_data;
	if(!empty($everly_data[$var])){
		return true;
	}

}

function everly_data($data){
	$everly_data = get_option(EVERLY_OPTIONS);
	if(isset($everly_data[$data])){
		return $everly_data[$data];	
	} else {
		return '';	
	}
}

function everly_block_one(){
global $everly_data;
?>
	<div class="block1">
		<a href="<?php echo esc_url($everly_data['block1_link1']) ?>" title="Image">
		
			<div class="block1_img">
				<img src="<?php echo esc_url($everly_data['block1_img1']) ?>" alt="<?php echo esc_html($everly_data['block1_text1']) ?>">
			</div>
			
			<div class="block1_all_text">
				<div class="block1_text">
					<p><?php echo esc_html($everly_data['block1_text1']) ?></p>
				</div>
				<div class="block1_lower_text">
					<p><?php echo esc_html($everly_data['block1_lower_text1']) ?></p>
				</div>
			</div>									
		</a>
		<a href="<?php echo esc_url($everly_data['block1_link2']) ?>" title="Image" >							
			
			<div class="block1_img">
				<img src="<?php echo esc_url($everly_data['block1_img2']) ?>" alt="<?php echo esc_html($everly_data['block1_text2']) ?>">
			</div>
			
			<div class="block1_all_text">
				<div class="block1_text">
					<p><?php echo esc_html($everly_data['block1_text2']) ?></p>
				</div>
				<div class="block1_lower_text">
					<p><?php echo esc_html($everly_data['block1_lower_text2']) ?></p>
				</div>
			</div>									
			
		</a>
		<a href="<?php echo esc_url($everly_data['block1_link3']) ?>" title="Image" >								
			<div class="block1_img">
				<img src="<?php echo esc_url($everly_data['block1_img3']) ?>" alt="<?php echo esc_html($everly_data['block1_text3']) ?>">
			</div>
			
			<div class="block1_all_text">
				<div class="block1_text">
					<p><?php echo esc_html($everly_data['block1_text3']) ?></p>
				</div>
				<div class="block1_lower_text">
					<p><?php echo esc_html($everly_data['block1_lower_text3']) ?></p>
				</div>
			</div>
			
		</a>							
	</div>
<?php
}


function everly_block_two(){
global $everly_data;
?>
	<div class="block2">
		<div class="block2_content">
					
			<div class="block2_img">
				<img class="block2_img_big" src="<?php echo esc_url($everly_data['block2_img']) ?>" alt="<?php echo esc_html($everly_data['block2_title']) ?>">
			</div>						
			
			<div class="block2_text">
				<p><?php everly_security($everly_data['block2_text']) ?></p>
			</div>
		</div>								
	</div>
<?php
}

/*import plugins*/

add_action( 'tgmpa_register', 'everly_required_plugins' );

function everly_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
				
		array(
				'name'      => esc_attr__('Shortcode Ultimate','everly-lite'),
				'slug'      => 'shortcodes-ultimate',
				'required'  => false,
			),		
		array(
				'name'      => esc_attr__('Contact Form 7','everly-lite'),
				'slug'      => 'contact-form-7',
				'required'  => false,
			),			
		array(
				'name'      => esc_attr__('Facebook Page Like Widget','everly-lite'),
				'slug'      => 'facebook-pagelike-widget',
				'required'  => false,
			),	
		array(
				'name'      => esc_attr__('Recent tweets widget','everly-lite'),
				'slug'      => 'recent-tweets-widget',
				'required'  => false,
			),		
		array(
				'name'      => esc_attr__('MailPoet Newsletters','everly-lite'),
				'slug'      => 'wysija-newsletters',
				'required'  => false,
			),			
		array(
				'name'      => esc_attr__('Instagram Feed','everly-lite'),
				'slug'      => 'instagram-feed',
				'required'  => false,
			),			
		array(
				'name'      => esc_attr__('SoundCloud Shortcode','everly-lite'),
				'slug'      => 'instagram-feed',
				'required'  => false,
			),	
			
			
			
				
    );

    $config = array(
        'id'           => 'everly-lite',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => get_template_directory() . '/includes/plugins/',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'everly-lite' ),
            'menu_title'                      => __( 'Install Plugins', 'everly-lite' ),
            'installing'                      => __( 'Installing Plugin: %s', 'everly-lite' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'everly-lite' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'everly-lite' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'everly-lite' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'everly-lite' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'everly-lite' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'everly-lite' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'everly-lite' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'everly-lite' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'everly-lite' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'everly-lite' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'everly-lite' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'everly-lite' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'everly-lite' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'everly-lite' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}
?>