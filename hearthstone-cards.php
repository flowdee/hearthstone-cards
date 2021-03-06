<?php
/**
 * Plugin Name:       Hearthstone Cards for WordPress
 * Plugin URI:        https://wordpress.org/plugins/hearthstone-cards/
 * Description:       Hearthstone Cards for WordPress adds an overlay to written card names and displays the associated image while hovering them.
 * Version:           2.9.0
 * Author:            KryptoniteWP
 * Author URI:        https://kryptonitewp.com
 * Text Domain:       hearthstone-cards
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Define Plugin Constants
 *----------------------------------------------------------------------------*/
define( 'HCFW_VERSION', '2.9.0' );
define( 'HCFW_LAST_UPDATE', '20.06.2019' );
define( 'HCFW_DIR', plugin_dir_path( __FILE__ ) );
define( 'HCFW_URL', plugin_dir_url( __FILE__ ) );
define( 'HCFW_CACHE', 'hcfw_cache' );
define( 'HCFW_CARD_IMAGES_CACHE', 'hcfw_card_images_cache' );
define( 'HCFW_CDN_URL', 'https://raw.githubusercontent.com/schmich/hearthstone-card-images/master/' );

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
require_once( plugin_dir_path( __FILE__ ) . 'public/class-hearthstone-cards.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 */
register_activation_hook( __FILE__, array( 'Hearthstone_Cards', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Hearthstone_Cards', 'deactivate' ) );

/*
 */
add_action( 'plugins_loaded', array( 'Hearthstone_Cards', 'get_instance' ) );

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

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-hearthstone-cards-admin.php' );
	add_action( 'plugins_loaded', array( 'Hearthstone_Cards_Admin', 'get_instance' ) );

}
