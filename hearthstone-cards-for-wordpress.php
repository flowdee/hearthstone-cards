<?php
/**
 * @package   Hearthstone_Cards_for_WordPress
 * @author    flowdee <support@flowdee.de>
 * @license   GPL-3.0+
 * @link      http://www.flowdee.de
 * @copyright 2015 flowdee
 *
 * @wordpress-plugin
 * Plugin Name:       Hearthstone Cards for WordPress
 * Plugin URI:        http://coder.flowdee.de/hearthstone-cards-for-wordpress/
 * Description:       Hearthstone Cards for WordPress adds an overlay to written card names and displays the associated image while hovering them.
 * Version:           1.7.0
 * Author:            flowdee
 * Author URI:        http://www.flowdee.de
 * Text Domain:       hearthstone-cards-for-wordpress-locale
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Define Plugin Paths
 *----------------------------------------------------------------------------*/
define('HCFW_PATH', plugin_dir_url( __FILE__ ));

/*----------------------------------------------------------------------------*
 * Plugin Includes
 *----------------------------------------------------------------------------*/
/*
 * Handle Settings
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/options.php' );

/*
 * Handle Functions
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/functions.php' );

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 *
 */
require_once( plugin_dir_path( __FILE__ ) . 'public/class-hearthstone-cards-for-wordpress.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 */
register_activation_hook( __FILE__, array( 'Hearthstone_Cards_for_WordPress', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Hearthstone_Cards_for_WordPress', 'deactivate' ) );

/*
 */
add_action( 'plugins_loaded', array( 'Hearthstone_Cards_for_WordPress', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-hearthstone-cards-for-wordpress-admin.php' );
	add_action( 'plugins_loaded', array( 'Hearthstone_Cards_for_WordPress_Admin', 'get_instance' ) );

}
