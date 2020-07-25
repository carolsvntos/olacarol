<?php // About Savona

// Add About Savona Page
function savona_about_page() {
	add_theme_page( esc_html__( 'About Savona', 'savona' ), esc_html__( 'About Savona', 'savona' ), 'edit_theme_options', 'about-savona', 'savona_about_page_output' );
}
add_action( 'admin_menu', 'savona_about_page' );

// Render About Savona HTML
function savona_about_page_output() {
?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Welcome to Savona!', 'savona' ); ?></h1>
		<p class="welcome-text">
			<?php esc_html_e( 'Savona is a free multi-purpose Wordpress Blog theme. It\'s perfect for any kind of blog or website: personal, professional, tech, fashion, travel, health, lifestyle, food, blogging etc. Its fully Responsive and Retina Display ready, clean, modern and minimal design. Savona is WooCommerce compatible, SEO friendly and also has RTL support.', 'savona' ); ?>
		</p>

		<!-- Tabs -->
		<?php $active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_text_field( wp_unslash($_GET[ 'tab' ]) ) : 'savona_tab_1'; ?>  
	
		<div class="nav-tab-wrapper">
			<a href="?page=about-savona&tab=savona_tab_1" class="nav-tab <?php echo $active_tab == 'savona_tab_1' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Getting Started', 'savona' ); ?>
			</a>
			<a href="?page=about-savona&tab=savona_tab_2" class="nav-tab <?php echo $active_tab == 'savona_tab_2' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Recommended Plugins', 'savona' ); ?>
			</a>
			<a href="?page=about-savona&tab=savona_tab_3" class="nav-tab <?php echo $active_tab == 'savona_tab_3' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Support', 'savona' ); ?>
			</a>
			<a href="?page=about-savona&tab=savona_tab_4" class="nav-tab <?php echo $active_tab == 'savona_tab_4' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Free vs Pro', 'savona' ); ?>
			</a>
		</div>

		<!-- Tab Content -->
		<?php if ( $active_tab == 'savona_tab_1' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Theme Documentation', 'savona' ); ?></h3>
					<p>
						<?php esc_html_e( 'Highly recommended to begin with this, read the full theme documentation to understand the basics and even more details about how to use Savona. It is worth to spend 10 minutes and know almost everything about the theme.', 'savona' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url('http://optimathemes.com/themes/savona/docs/?ref=savona-free-backend-about-docs/'); ?>" class="button button-primary"><?php esc_html_e( 'Read Documentation', 'savona' ); ?></a>
				</div>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Theme Customizer', 'savona' ); ?></h3>
					<p>
					<?php esc_html_e( 'All theme options are located here. After reading the Theme Documentation we recommend you to open the Theme Customizer and play with some options. You will enjoy it.', 'savona' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url( wp_customize_url() );?>" class="button button-primary"><?php esc_html_e( 'Customize Your Site', 'savona' ); ?></a>
				</div>

			</div>

		<?php elseif ( $active_tab == 'savona_tab_2' ) : ?>
			
			<div class="three-columns-wrap">
				
				<br>
				<p><?php esc_html_e( 'Recommended Plugins are fully supported by Savona theme, they are styled to fit the theme design and performing well. Not mandatory, but may be usefl.', 'savona' ); ?></p>
				<br>

				<?php

				// WooCommerce
				savona_recommended_plugin( 'woocommerce', 'woocommerce', esc_html__( 'WooCommerce', 'savona' ), esc_html__( 'WooCommerce is a powerful, extendable eCommerce plugin that helps you sell anything. Beautifully.', 'savona' ) );

				// MailPoet 2
				savona_recommended_plugin( 'wysija-newsletters', 'index', esc_html__( 'MailPoet 2', 'savona' ), esc_html__( 'Create and send newsletters or automated emails. Capture subscribers with a widget. Import and manage your lists. MailPoet is made with love.', 'savona' ) );

				// Contact Form 7
				savona_recommended_plugin( 'contact-form-7', 'wp-contact-form-7', esc_html__( 'Contact Form 7', 'savona' ), esc_html__( 'Just another contact form plugin. Simple but flexible.', 'savona' ) );

				// Recent Posts Widget
				savona_recommended_plugin( 'recent-posts-widget-with-thumbnails', 'recent-posts-widget-with-thumbnails', esc_html__( 'Recent Posts Widget With Thumbnails', 'savona' ), esc_html__( 'Small and fast plugin to display in the sidebar a list of linked titles and thumbnails of the most recent postings.', 'savona' ) );

				// Instagram Widget
				savona_recommended_plugin( 'wp-instagram-widget', 'wp-instagram-widget', esc_html__( 'WP Instagram Widget', 'savona' ), esc_html__( 'A WordPress widget for showing your latest Instagram photos.', 'savona' ) );

				// Facebook Widget
				savona_recommended_plugin( 'facebook-pagelike-widget', 'facebook_widget', esc_html__( 'Facebook Widget', 'savona' ), esc_html__( 'This widget adds a Simple Facebook Page Like Widget into your wordpress website sidebar within few minutes.', 'savona' ) );

				?>


			</div>

		<?php elseif ( $active_tab == 'savona_tab_3' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-book"></span>
						<?php esc_html_e( 'Documentation', 'savona' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Need more details? Please check our full documentation for detailed information on how to use Savona.', 'savona' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('http://optimathemes.com/themes/savona/docs/?ref=savona-free-backend-about-docs/'); ?>"><?php esc_html_e( 'Read Full Documentation', 'savona' ); ?></a>
					</p>
				</div>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-smiley"></span>
						<?php esc_html_e( 'Donation', 'savona' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Even a small sum can help us a lot with theme development. If the Savona theme is useful and our support is helpful, please don\'t hesitate to donate a little bit, at least buy us a Coffee :)', 'savona' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('http://optimathemes.com/themes/savona/savona-donate.html'); ?>"><?php esc_html_e( 'Donate with PayPal', 'savona' ); ?></a>
					</p>
				</div>

			</div>

		<?php elseif ( $active_tab == 'savona_tab_4' ) : ?>

			<br><br>

			<table class="free-vs-pro form-table">
				<thead>
					<tr>
						<th>
							<a href="<?php echo esc_url('http://optimathemes.com/themes/savona-pro/?ref=savona-free-backend-about-section-getpro-btn'); ?>" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Get Savona Pro', 'savona' ); ?>
							</a>
						</th>
						<th><?php esc_html_e( 'Savona', 'savona' ); ?></th>
						<th><?php esc_html_e( 'Savona Pro', 'savona' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<h3><?php esc_html_e( '100% Responsive and Retina Ready', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Theme adapts to any kind of device screen, from mobile phones to high resolution Retina displays.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Translation Ready', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Each hard-coded string is ready for translation, means you can translate everything. Language "savona.pot" file included.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'RTL Support', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'RTL stylesheet for languages that are read from right to left like Arabic, Hebrew, etc... Your content will adapt to RTL direction.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'WooCommerce Integration', 'savona' ); ?></h3>
							<p>
								<?php esc_html_e( 'The best eCommerce solution for Wordpress websites. Add your own Shop and sell anything from digital Goods to Coconuts.', 'savona' ); ?>
								
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Contact Form 7 Support', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'The most popular contact form plugin. You can build almost any kind of contact form. Very simple but super flexible.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Image &amp; Text Logos', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Upload your logo image(set the size) or simply type your text logo.', 'savona' ); ?><br><strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'savona' ); ?></strong> <?php esc_html_e( 'Adjust Logo position to fit your custom header design.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Featured Posts Slider', 'savona' ); ?></h3>
							<p>
								<?php esc_html_e( 'Showcase up to 3 most recent Blog Posts in header area.', 'savona' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'savona' ); ?></strong> <?php esc_html_e( 'Unlimited number of Slides. Feature specific(custom) posts and order them by date or even random. Set Autoplay and enable/disable any element.', 'savona' ); ?>  
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Featured Links (Promo Boxes)', 'savona' ); ?></h3>
							<p>
								<?php esc_html_e( 'Display up to 3 eye-catching linked images under header area, which could be a Custom Page Links or Banners(ads).', 'savona' ); ?> 
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'savona' ); ?></strong> <?php esc_html_e( 'You can have 5 Featured Links.', 'savona' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Background Image/Color', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Set the custom body Background image or Color.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Classic Layout', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Standard one column Blog Feed layout.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Multi-level Sub Menu Support', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Unlimited level of sub menus. Add as much as you need.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Left &amp; Right Sidebars', 'savona' ); ?></h3>
							<p>
								<?php esc_html_e( 'Left and Right Widgetised areas. Could be globally Enabled/Disabled.', 'savona' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Alternative Sidebar', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Stylish and modern Alternative Widgetised area, which is hidden by default and pops up on click.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					
					<!-- Only Pro -->
					<tr>
						<td>
							<h3><?php esc_html_e( 'One Click Demo Import', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Just a Single Click and you will get the same content as shown on our Demo website. Menus, Posts, Pages, Widgets, etc... will be imported.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Unlimited Colors', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Tons of color options. You can customize your Header, Content and Footer separately as much as possible.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( '800+ Google Fonts', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Rich Typography options. Choose from more than 800 Google Fonts, adjust Size, Line Height, Font Weight, etc...', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Post Sharing Icons', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Ability to share your Blog Posts on the most popular social media: Facebook, Twitter, Pinterest, Google Plus, Linkedin, Reddit, Tumblr.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Sticky Navigation', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Fix the main navigation to the page, it will be always visible at the top.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Instagram Widget Area', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Showcase your Instagram photos on your website footer area.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Integration with MailChimp', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'This plugin helps you add more subscribers to your MailChimp lists using various methods.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Integration with JetPack', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Jetpack is the ultimate toolkit for WordPress. It gives you everything you need to design, secure, and grow your site in one bundle.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Savona Pro Widgets', 'savona' ); ?></h3>
							<p><?php esc_html_e( 'Savona Author, Ads &amp; Social Icons widgets included.', 'savona' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>


					<tr>
						<td></td>
						<td colspan="2">
							<a href="<?php echo esc_url('http://optimathemes.com/themes/savona-pro/?ref=savona-free-backend-about-section-getpro-btn'); ?>" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Get Savona Pro', 'savona' ); ?>
							</a>
							<br>
						</td>
					</tr>
				</tbody>
			</table>

	    <?php endif; ?>

	</div><!-- /.wrap -->
<?php
} // end savona_about_page_output

// Check if plugin is installed
function savona_check_installed_plugin( $slug, $filename ) {
	return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
}

// Generate Recommended Plugin HTML
function savona_recommended_plugin( $slug, $filename, $name, $description) {

	if ( $slug === 'facebook-pagelike-widget' ) {
		$size = '128x128';
	} else {
		$size = '256x256';
	}

?>

	<div class="plugin-card">
		<div class="name column-name">
			<h3>
				<?php echo esc_html( $name ); ?>
				<img src="<?php echo esc_url('https://ps.w.org/'. $slug .'/assets/icon-'. $size .'.png') ?>" class="plugin-icon" alt="">
			</h3>
		</div>
		<div class="action-links">
			<?php if ( savona_check_installed_plugin( $slug, $filename ) ) : ?>
			<button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e( 'Installed', 'savona' ); ?></button>
			<?php else : ?>
			<a class="install-now button-primary" href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $slug ), 'install-plugin_'. $slug ) ); ?>" >
				<?php esc_html_e( 'Install Now', 'savona' ); ?>
			</a>							
			<?php endif; ?>
		</div>
		<div class="desc column-description">
			<p><?php echo esc_html( $description ); ?></p>
		</div>
	</div>

<?php
}

// enqueue ui CSS/JS
function enqueue_about_savona_page_scripts($hook) {

	if ( 'appearance_page_about-savona' != $hook ) {
		return;
	}

	// enqueue CSS
	wp_enqueue_style( 'about-savona-page-css', get_theme_file_uri( '/inc/about/css/about-savona-page.css' ) );

    // enqueue JS
    wp_enqueue_script( 'about-savona-page-js', get_theme_file_uri( '/inc/about/js/about-savona-page.js' ), array( 'jquery' ), false, true );

}
add_action( 'admin_enqueue_scripts', 'enqueue_about_savona_page_scripts' );