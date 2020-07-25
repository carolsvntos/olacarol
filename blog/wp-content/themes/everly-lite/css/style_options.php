<?php
global $everly_data; 
$use_bg = ''; $background = ''; $custom_bg = ''; $body_face = ''; $use_bg_full = ''; $bg_img = ''; $bg_prop = '';



if(isset($everly_data['background_image_full'])) {
	$use_bg_full = $everly_data['background_image_full'];
	
}

if(isset($everly_data['use_boxed'])){
	$use_boxed = $everly_data['use_boxed'];
}
else{
	$use_boxed = 0;
}

if($use_bg_full) {


	if($use_bg_full && isset($everly_data['use_boxed']) && $everly_data['use_boxed'] == 1) {
		$bg_img = $everly_data['image_background'];
		$bg_prop = '';
	}

	

	
	$background = 'url('. $bg_img .') '.$bg_prop ;

}


	
	if(isset($everly_data['google_menu_custom']) && $everly_data['google_menu_custom'] != ''){
		$font_menu = explode(':',$everly_data['google_menu_custom']);
		if(count($font_menu)>1) {
			$font_menu = $font_menu[0];
		}
		else{
			$font_menu = $everly_data['google_menu_custom'];
		}
	}else{
		$font_menu = explode(':',$font_menu);
		if(count($font_menu)>1) {
			$font_menu = $font_menu[0];
		}
		else{
			$font_menu = $font_menu;
		}
	}		
	
	if(isset($everly_data['google_quote_custom']) && $everly_data['google_quote_custom'] != ''){
		$font_quote = explode(':',$everly_data['google_quote_custom']);
		if(count($font_quote)>1) {
			$font_quote = $font_quote[0];
		}
		else{
			$font_quote = $everly_data['google_quote_custom'];
		}
	}else{
		$font_quote = explode(':',$font_quote);
		if(count($font_quote)>1) {
			$font_quote = $font_quote[0];
		}
		else{
			$font_quote = $font_quote;
		}
	}	

	if(isset($everly_data['google_heading_custom']) && $everly_data['google_heading_custom'] != ''){
		$font_heading = explode(':',$everly_data['google_heading_custom']);
		if(count($font_heading)>1) {
			$font_heading = $font_heading[0];
		}
		else{
			$font_heading= $everly_data['google_heading_custom'];
		}	
	}else{
		$font_heading = explode(':',$font_heading);
		if(count($font_heading)>1) {
			$font_heading = $font_heading[0];
		}
		else{
			$font_heading=$font_heading;
		}	
	}

	if(isset($everly_data['google_body_custom']) && $everly_data['google_body_custom'] != ''){
		$font_body = explode(':',$everly_data['google_body_custom']);
		if(count($font_body)>1) {
			$font_body = $font_body[0];
		}
		else{
			$font_body = $everly_data['google_body_custom'];
		}
	}else{
		$font_body = explode(':',$font_body);
		if(count($font_body)>1) {
			$font_body = $font_body[0];
		}
		else{
			$font_body = $font_body;
		}		
	}	

?>


.block_footer_text, .quote-category .blogpostcategory {font-family: <?php echo $font_quote; ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;}
body {	 
	background:<?php echo $everly_data['body_background_color'].' '.$background ?>  !important;
	color:<?php echo $everly_data['body_font']['color']; ?>;
	font-family: <?php echo $font_body; ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;
	font-size: <?php echo $everly_data['body_font']['size']; ?>;
	font-weight: normal;
}

::selection { background: #000; color:#fff; text-shadow: none; }

h1, h2, h3, h4, h5, h6, .block1 p, .hebe .tp-tab-desc {font-family: <?php echo $font_heading; ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;}
h1 { 	
	color:<?php echo $everly_data['heading_font_h1']['color']; ?>;
	font-size: <?php echo $everly_data['heading_font_h1']['size'] ?> !important;
	}
	
h2, .term-description p { 	
	color:<?php echo $everly_data['heading_font_h2']['color']; ?>;
	font-size: <?php echo $everly_data['heading_font_h2']['size'] ?> !important;
	}

h3 { 	
	color:<?php echo $everly_data['heading_font_h3']['color']; ?>;
	font-size: <?php echo $everly_data['heading_font_h3']['size'] ?> !important;
	}

h4 { 	
	color:<?php echo $everly_data['heading_font_h4']['color']; ?>;
	font-size: <?php echo $everly_data['heading_font_h4']['size'] ?> !important;
	}	
	
h5 { 	
	color:<?php echo $everly_data['heading_font_h5']['color']; ?>;
	font-size: <?php echo $everly_data['heading_font_h5']['size'] ?> !important;
	}	

h6 { 	
	color:<?php echo $everly_data['heading_font_h6']['color']; ?>;
	font-size: <?php echo $everly_data['heading_font_h6']['size'] ?> !important;
	}	

.pagenav a {font-family: <?php echo $font_menu; ?> !important;
			  font-size: <?php echo $everly_data['menu_font']['size'] ?>;
			  font-weight:<?php echo $everly_data['menu_font']['style'] ?>;
			  color:<?php echo $everly_data['menu_font']['color'] ?>;
}
.block1_lower_text p,.widget_wysija_cont .updated, .widget_wysija_cont .login .message, p.edd-logged-in, #edd_login_form, #edd_login_form p  {font-family: <?php echo $font_body; ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif !important;color:#444;font-size:14px;}

a, select, input, textarea, button{ color:<?php echo $everly_data['body_link_coler']; ?>;}
h3#reply-title, select, input, textarea, button, .link-category .title a, .wttitle h4 a{font-family: <?php echo $font_body; ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;}



/* ***********************
--------------------------------------
------------MAIN COLOR----------
--------------------------------------
*********************** */

a:hover, span, .current-menu-item a, .blogmore, .more-link, .pagenav.fixedmenu li a:hover, .widget ul li a:hover,.pagenav.fixedmenu li.current-menu-item > a,.block2_text a,
.blogcontent a, .sentry a, .post-meta a:hover, .sidebar .social_icons i:hover,.blog_social .addthis_toolbox a:hover, .addthis_toolbox a:hover, .content.blog .single-date, a.post-meta-author, .block1_text p,
.grid .blog-category a, .pmc-main-menu li.colored a, .top-wrapper .social_icons a i:hover

{
	color:<?php echo $everly_data['mainColor']; ?>;
}

.su-quote-style-default  {border-left:5px solid <?php echo $everly_data['mainColor']; ?>;}
.addthis_toolbox a i:hover {color:<?php echo $everly_data['mainColor']; ?> !important;}
 
/* ***********************
--------------------------------------
------------BACKGROUND MAIN COLOR----------
--------------------------------------
*********************** */

.top-cart, .widget_tag_cloud a:hover, .sidebar .widget_search #searchsubmit,
.specificComment .comment-reply-link:hover, #submit:hover,  .wpcf7-submit:hover, #submit:hover,
.link-title-previous:hover, .link-title-next:hover, .specificComment .comment-edit-link:hover, .specificComment .comment-reply-link:hover, h3#reply-title small a:hover, .pagenav li a:after,
.widget_wysija_cont .wysija-submit,.widget ul li:before, #footer .widget_search #searchsubmit, .everly-read-more a:hover, .blogpost .tags a:hover,
.mainwrap.single-default.sidebar .link-title-next:hover, .mainwrap.single-default.sidebar .link-title-previous:hover, .everly-home-deals-more a:hover, .top-search-form i:hover, .edd-submit.button.blue:hover,
ul#menu-top-menu, a.catlink:hover, .everly-read-more a, #commentform #submit, input[type="submit"]
  {
	background:<?php echo $everly_data['mainColor']; ?> ;
}
.pagenav  li li a:hover {background:none;}
.edd-submit.button.blue:hover, .cart_item.edd_checkout a:hover {background:<?php echo $everly_data['mainColor']; ?> !important;}
.link-title-previous:hover, .link-title-next:hover {color:#fff;}
#headerwrap {background:<?php echo $everly_data['menu_background_color']; ?>;}


#everly-slider-wrapper, .everly-rev-slider {padding-top:<?php echo $everly_data['rev_slider_margin']; ?>px;}

 /* ***********************
--------------------------------------
------------BOXED---------------------
-----------------------------------*/
<?php if($use_boxed == 0 &&  isset($everly_data['use_background']) && $everly_data['use_background'] == 1){ ?>
	body, .cf, .mainwrap, .post-full-width, .titleborderh2, .sidebar, div#everly-slider-wrapper, .block1 a, .block2   {
	background:<?php echo $everly_data['body_background_color'].' '.$background ?>  !important; 
	}
	
<?php	} ?>
 <?php if(isset($everly_data['use_boxed']) &&  $use_boxed == 1){ ?>
header,.outerpagewrap{background:none !important;}

@media screen and (min-width:1240px){
body {width:1240px !important;margin:0 auto !important;}
.top-nav ul{margin-right: -21px !important;}
.mainwrap.shop {float:none;}
.pagenav.fixedmenu { width: 1240px !important;}
.bottom-support-tab,.totop{right:5px;}
<?php if($use_bg_full){ ?>
	body {
	background:<?php echo $everly_data['body_background_color'].' '.$background ?>  !important; 
	background-attachment:fixed !important;
	background-size:cover !important; 
	-webkit-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
-moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
	}	
<?php	} ?>
 <?php if(!$use_bg_full){ ?>
	body {
	background:<?php echo $everly_data['body_background_color'].' '.$background ?>  !important; 
	
	}
	
<?php	} ?>	
}
<?php } ?>
  <?php if(!empty($amory_data['image_background_header'])){ ?>
	header {
	background:<?php echo $amory_data['body_background_color'].' url('. $amory_data['image_background_header'] .')'; ?>  !important; 
	background-attachment:fixed !important;
	width:100%;
	-webkit-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
	box-shadow:	0px 0px 5px 1px rgba(0,0,0,0.2);
	float:left;
	}	
	.top-wrapper ,.logo-wrapper , div#logo{background:none;}
<?php	} ?>
 <?php if(empty($amory_data['use_menu_back']) && !empty($amory_data['image_background_header'])){ ?>
	#headerwrap {background:none;}
<?php	} ?>
<?php if(is_active_sidebar( 'everly_sidebar-under-header-left') || is_active_sidebar( 'everly-sidebar-under-header-fullwidth' )) {?>
	.sidebars-wrap.top {padding-top: 30px !important;}
<?php } ?>
 <?php if(is_active_sidebar( 'everly-sidebar-footer-fullwidth' ) || is_active_sidebar( 'everly-sidebar-footer-left' )){ ?>
	.sidebars-wrap.bottom {margin-top: 30px !important;padding-bottom:45px;}
<?php } ?>
 
.top-wrapper {background:<?php echo $everly_data['top_menu_background_color']; ?>;}

.pagenav {background:<?php echo $everly_data['menu_background_color']; ?>;border-top:<?php echo $everly_data['menu_top_border']; ?>px solid #000;border-bottom:<?php echo $everly_data['menu_bottom_border']; ?>px solid #000;} 
 


/* ***********************
--------------------------------------
------------CUSTOM CSS----------
--------------------------------------
*********************** */

<?php echo everly_stripText($everly_data['custom_style']) ?>