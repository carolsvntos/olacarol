<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Sample Theme
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	//$my_theme = wp_get_theme();
	$config = array(
		'remote_api_url' => 'https://premiumcoding.com/', // Site where EDD is hosted
		'item_name' => 'Laura', // Name of theme
		'theme_slug' => 'laura', // Theme slug
		'version' => wp_get_theme()->get( 'Version' ), // The current version of this theme
		'author' => 'PremiumCoding', // The author of this theme
		'download_id' => '', // Optional, used for generating a license renewal link
		'renew_url' => '' // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license' => __( 'Theme License', 'anariel' ),
		'enter-key' => __( 'Enter your theme license key.', 'anariel' ),
		'license-key' => __( 'License Key', 'anariel' ),
		'license-action' => __( 'License Action', 'anariel' ),
		'deactivate-license' => __( 'Deactivate License', 'anariel' ),
		'activate-license' => __( 'Activate License', 'anariel' ),
		'status-unknown' => __( 'License status is unknown.', 'anariel' ),
		'renew' => __( 'Renew?', 'anariel' ),
		'unlimited' => __( 'unlimited', 'anariel' ),
		'license-key-is-active' => __( 'License key is active.', 'anariel' ),
		'expires%s' => __( 'Expires %s.', 'anariel' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'anariel' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'anariel' ),
		'license-key-expired' => __( 'License key has expired. You will not receive updates and you can no longer use support. We recommend you to update the licence so your theme will be up to date in the future.', 'anariel' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'anariel' ),
		'license-is-inactive' => __( 'License is inactive.', 'anariel' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'anariel' ),
		'site-is-inactive' => __( 'Site is inactive.', 'anariel' ),
		'license-status-unknown' => __( 'License status is unknown.', 'anariel' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'anariel' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'anariel' )
	)

);