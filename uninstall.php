<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   Hearthstone_Cards_for_WordPress
 * @author    flowdee <support@flowdee.de>
 * @link      http://www.flowdee.de
 * @copyright 2014 flowdee
 */

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb;

if ( is_multisite() ) {

	$blogs = $wpdb->get_results( "SELECT blog_id FROM {$wpdb->blogs}", ARRAY_A );

        delete_option('hcfw_active');
        delete_option('hcfw_language');
        delete_option('hcfw_size');

	if ( $blogs ) {

	 	foreach ( $blogs as $blog ) {
			switch_to_blog( $blog['blog_id'] );

            delete_option('hcfw_active');
            delete_option('hcfw_language');
            delete_option('hcfw_size');

			restore_current_blog();
		}
	}

} else {

    delete_option('hcfw_active');
    delete_option('hcfw_language');
    delete_option('hcfw_size');
}