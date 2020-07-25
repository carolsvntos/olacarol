<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-61927763-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-61927763-1');
</script>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<script src='https://www.google.com/recaptcha/api.js?render=6Lf9z3kUAAAAAGqUeppHt1OMN-k7zzyIQcMDtiBG'></script>
<script>
grecaptcha.ready(function() {
grecaptcha.execute('6Lf9z3kUAAAAAGqUeppHt1OMN-k7zzyIQcMDtiBG', {action: 'action_name'})
.then(function(token) {
// Verify the token on the server.
});
});
</script>
</head>

<body <?php body_class(); ?>>

	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=1738855659706583&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<!-- Preloader -->
	<?php get_template_part( 'templates/header/preloader' ); ?>

	<!-- Page Wrapper -->
	<div id="page-wrap">

		<!-- Boxed Wrapper -->
		<div id="page-header" <?php echo esc_attr(savona_options( 'general_header_width' )) === 'boxed' ? 'class="boxed-wrapper"': ''; ?>>

		<?php

		// Top Bar
		get_template_part( 'templates/header/top', 'bar' );

		// Main Navigation
		if ( savona_options( 'main_nav_position' ) === 'above' ) {
			get_template_part( 'templates/header/main', 'navigation' );
		}

		// Page Header
		get_template_part( 'templates/header/page', 'header' );

		// Main Navigation
		if ( savona_options( 'main_nav_position' ) === 'below' ) {
			get_template_part( 'templates/header/main', 'navigation' );
		}
		
		?>

		</div><!-- .boxed-wrapper -->

		<!-- Page Content -->
		<div id="page-content">

			<?php get_template_part( 'templates/sidebars/sidebar', 'alt' ); // Sidebar Alt ?>