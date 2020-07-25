<?php
#Only demo stuff
#gt3_update_theme_option("demo_server", "true");
#gt3_delete_theme_option("demo_server");

if (gt3_get_theme_option("demo_server") == "true") {
    if (!function_exists('css_js_demo')) {
        function css_js_demo()
        {
            wp_enqueue_style('top_line', get_template_directory_uri() . '/ext/top_line_download/top_line.css');
            wp_enqueue_script('cookie_js', get_template_directory_uri() . '/ext/top_line_download/jquery.cookie.js');

        }
    }
    add_action('wp_enqueue_scripts', 'css_js_demo');
}

?>