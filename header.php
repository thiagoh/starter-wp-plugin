<?php
/**
 * @package MyFirstPlugin
 */
/*
Plugin Name: My first WordPress.org Plugin
Description: This is the description of my brand new plugin!
Version: 0.1.0
Author: Thiago Andrade
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

##
## Important
##
#
# Actions allow you to add or change WordPress functionality, while filters allow you to filter, or change, content as it is loaded.
#
 */

/*
 *
 * Good example to follow
 *
 *
register_activation_hook( __FILE__, array( 'Akismet', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Akismet', 'plugin_deactivation' ) );

require_once( AKISMET__PLUGIN_DIR . 'class.akismet.php' );
require_once( AKISMET__PLUGIN_DIR . 'class.akismet-widget.php' );

add_action( 'init', array( 'Akismet', 'init' ) );

if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
require_once( AKISMET__PLUGIN_DIR . 'class.akismet-admin.php' );
add_action( 'init', array( 'Akismet_Admin', 'init' ) );
}

//add wrapper class around deprecated akismet functions that are referenced elsewhere
require_once( AKISMET__PLUGIN_DIR . 'wrapper.php' );

if ( defined( 'WP_CLI' ) && WP_CLI ) {
require_once( AKISMET__PLUGIN_DIR . 'class.akismet-cli.php' );
}
 */

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define('MY_FIRST_PLUGIN_VERSION', '0.1.0');
define('MY_FIRST_PLUGIN__PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once MY_FIRST_PLUGIN__PLUGIN_DIR . 'header.php';
require_once MY_FIRST_PLUGIN__PLUGIN_DIR . 'error.php';

function my_first_plugin_activation() {
	LogUtil::get(__FILE__)->debug("ACTIVATED - the magic is up to happen!");
}

function my_first_plugin_deactivation() {
	LogUtil::get(__FILE__)->debug("DEACTIVATED - the plugin is no more activated");
}

function my_first_plugin_uninstall() {
	LogUtil::get(__FILE__)->debug("Uninstall (all the plugins files shall be removed in this phase");
}

register_activation_hook(__FILE__, 'my_first_plugin_activation');
register_deactivation_hook(__FILE__, 'my_first_plugin_deactivation');
register_uninstall_hook(__FILE__, 'my_first_plugin_uninstall');

require_once MY_FIRST_PLUGIN__PLUGIN_DIR . 'plugin-fancy-name.php';

?>