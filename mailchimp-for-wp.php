<?php
/*
Plugin Name: MailChimp for WordPress
Plugin URI: https://mc4wp.com/#utm_source=wp-plugin&utm_medium=mailchimp-for-wp&utm_campaign=plugins-page
Description: MailChimp for WordPress by ibericode. Adds various highly effective sign-up methods to your site.
Version: 3.0
Author: ibericode
Author URI: https://ibericode.com/
Text Domain: mailchimp-for-wp
Domain Path: /languages
License: GPL v3

MailChimp for WordPress
Copyright (C) 2012-2015, Danny van Kooten, hi@dannyvankooten.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// Prevent direct file access
defined( 'ABSPATH' ) or exit;

/**
* Loads the MailChimp for WP plugin files
*
* @return boolean True if the plugin files were loaded, false otherwise.
*/
function mc4wp_load_plugin() {

	// this means an older version of Pro is activated
	if( defined( 'MC4WP_VERSION' ) ) {
		return false;
	}

	// bootstrap the core plugin
	define( 'MC4WP_VERSION', '3.0' );
	define( 'MC4WP_PLUGIN_DIR', dirname( __FILE__ ) . '/' );
	define( 'MC4WP_PLUGIN_URL', plugins_url( '/' , __FILE__ ) );
	define( 'MC4WP_PLUGIN_FILE', __FILE__ );

	require_once MC4WP_PLUGIN_DIR . 'vendor/autoload_52.php';

	// Initialize admin section of plugin
	if( is_admin()
	    && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
		$admin = new MC4WP_Admin();
		$admin->add_hooks();
	}

	// forms
	MC4WP_Form_Manager::instance()->add_hooks();

	// integration core
	MC4WP_Integration_Manager::instance()->add_hooks();

	// tags
	MC4WP_Dynamic_Content_Tags::instance()->add_hooks();

	// visitor tracking
	MC4WP_Visitor_Tracking::instance()->add_hooks();

	// bootstrap custom integrations
	require_once MC4WP_PLUGIN_DIR . 'integrations/bootstrap.php';

	// Doing cron? Load Usage Tracking class.
	if( defined( 'DOING_CRON' ) && DOING_CRON ) {
		MC4WP_Usage_Tracking::instance()->add_hooks();
	}

	return true;
}

add_action( 'plugins_loaded', 'mc4wp_load_plugin' );
