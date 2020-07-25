<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
    <?php echo((gt3_get_theme_option("responsive") == "on") ? '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">' : ''); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="shortcut icon" href="<?php echo gt3_get_theme_option('favicon'); ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo gt3_get_theme_option('apple_touch_57'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo gt3_get_theme_option('apple_touch_72'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo gt3_get_theme_option('apple_touch_114'); ?>">
    <title><?php bloginfo('name');
        echo(strlen(wp_title("&raquo;", false)) > 0 ? wp_title("&raquo;", false) : ""); ?></title>
    <script type="text/javascript">
        var gt3_ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php echo gt3_get_if_strlen(gt3_get_theme_option("custom_css"), "<style>", "</style>") . gt3_get_if_strlen(gt3_get_theme_option("code_before_head"));
    globalJsMessage::getInstance()->render();
    wp_head(); ?>
</head>

<body <?php body_class(gt3_the_pb_custom_bg_and_color(gt3_get_theme_pagebuilder(@get_the_ID()), array("classes_for_body" => true)).gt3_the_check_fw_state(gt3_get_theme_pagebuilder(@get_the_ID()))." gt3_preloader"); ?>>
<?php
if (gt3_get_theme_option("demo_server") == "true") {
    ?>
    <!--switcher-->
    <div id="switcher">
        <div class="center">
            <ul class="headlines">
                <li class="logo"><a href="http://www.gt3themes.com/"><img src="<?php bloginfo('template_url'); ?>/ext/top_line_download/logo.png" alt=""/></a></li>
                <li class="remove_frame"><a href="#">Remove Frame</a></li>
                <li class="gt3_btn download"><a target="_blank" href="http://www.gt3themes.com/maximize-your-online-activity-with-free-pure-wordpress-theme/">Download now!</a></li>
                <li id="theme_list"><a id="theme_select" href="http://gt3demo.com/"><span class='fl'>Check Other WordPress Themes</span></a></li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">

        jQuery(document).ready(function ($) {
            var current_time = Math.round((new Date()).getTime() / 1000);
            if(typeof jQuery.cookie("top_line_time") == "undefined") {
                jQuery.cookie("top_line_time", current_time, { path: '/', expires: 7 });
            }

            if (current_time < jQuery.cookie("top_line_time")) {
            } else {
                jQuery('#switcher').fadeIn();
                jQuery('body').css({'margin-top': 59 + 'px'});
                jQuery('.fixed-menu').css({'margin-top': 59 + 'px'});
            }
        });

        jQuery(".remove_frame a").click(function () {
            var current_time = Math.round((new Date()).getTime() / 1000);
            jQuery('#switcher').fadeOut();
            jQuery('body').css({'margin-top': 0});
            jQuery('.fixed-menu').css({'margin-top': 0});
            jQuery.cookie("top_line_time", new_time = current_time + 86400, { path: '/', expires: 7 });
        });
    </script>
    
    <script type="text/javascript">
		  (function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		  })();
	</script>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
    </script>
    <!--//switcher-->
<?php
}
?>
<div class="bbody op0">
<header class="clearfix <?php gt3_the_header_type(); ?>">
    <div class="show_mobile_menu"><?php echo __('MENU', 'theme_localization'); ?></div>
    <?php wp_nav_menu(array('theme_location' => 'main_menu', 'menu_class' => 'menu_mobile', 'depth' => '3')); ?>

    <?php if (gt3_get_theme_option("header_type") == "type1") { ?>
    <nav class="clearfix desktop_menu">
        <?php wp_nav_menu(array('theme_location' => 'main_menu', 'menu_class' => 'menu', 'depth' => '3', 'walker' => new gt3_menu_walker($showtitles = false))); ?>
    </nav>
    <?php } ?>

    <?php if (gt3_get_theme_option("header_type") == "type1" || gt3_get_theme_option("header_type") == "type2") {
        echo gt3_get_logo();
    } ?>

    <?php if (gt3_get_theme_option("header_type") == "type2") { ?>
        <nav class="clearfix desktop_menu">
            <?php wp_nav_menu(array('theme_location' => 'main_menu', 'menu_class' => 'menu', 'depth' => '3', 'walker' => new gt3_menu_walker($showtitles = false))); ?>
        </nav>
    <?php } ?>

    <?php if (gt3_get_theme_option("header_type") == "type3") { ?>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="fl">
                        <?php echo gt3_get_logo(); ?>
                    </div>
                    <div class="fr desktop_menu">
                        <?php if (gt3_get_theme_option("show_socials_in_header") == "true") {echo gt3_show_social_icons($GLOBALS['available_socials']);} ?>
                        <?php echo wp_nav_menu(array('theme_location' => 'main_menu', 'menu_class' => 'menu', 'depth' => '3', 'walker' => new gt3_menu_walker($showtitles = false))); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (gt3_get_theme_option("header_type") == "type4") { ?>
        <div class="fw_header">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="left_part">
                            <?php if (strlen(gt3_get_theme_option("phone")) > 0) { ?><div class="thisitem"><i class="icon-phone"></i> <?php echo gt3_get_theme_option("phone"); ?></div><?php } ?>
                            <?php if (strlen(gt3_get_theme_option("public_email")) > 0) { ?><div class="thisitem"><i class="icon-envelope-alt"></i>
                                <a href="mailto:<?php echo gt3_get_theme_option("public_email"); ?>"><?php echo gt3_get_theme_option("public_email"); ?></a></div><?php } ?>
                        </div>
                        <div class="header_socials">
                            <?php if (gt3_get_theme_option("show_socials_in_header") == "true") {echo gt3_show_social_icons($GLOBALS['available_socials']);} ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="fl">
                        <?php echo gt3_get_logo(); ?>
                    </div>
                    <div class="fr desktop_menu">
                        <?php echo wp_nav_menu(array('theme_location' => 'main_menu', 'menu_class' => 'menu', 'depth' => '3', 'walker' => new gt3_menu_walker($showtitles = false))); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (gt3_get_theme_option("header_type") == "type5") { ?>
        <div class="fw_header">
            <div class="fl">
                <?php echo gt3_get_logo(); ?>
            </div>
            <div class="fr desktop_menu">
                <?php echo wp_nav_menu(array('theme_location' => 'main_menu', 'menu_class' => 'menu', 'depth' => '3', 'walker' => new gt3_menu_walker($showtitles = false))); ?>
            </div>
        </div>
    <?php } ?>
</header>

<div class="wrapper container">