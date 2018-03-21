<?php
/**
 * Handle plugin updates
 */
function hcfw_plugin_upgrade() {

    $last_version = get_option( 'hcfw_version', '' );

    //hcfw_debug_log( 'hcfw_plugin_upgrade >> $last_version >> ' . $last_version );
    //hcfw_debug_log( 'hcfw_plugin_upgrade >> HCFW_VERSION >> ' . HCFW_VERSION );

    if ( HCFW_VERSION === $last_version )
        return;

    if ( ! empty( $last_version ) && version_compare( HCFW_VERSION, $last_version, '<' ) )
        return;

    if ( ! empty ( $last_version ) ) {

        // v2.4.4 - Switching to our own CDN
        if ( version_compare( $last_version, '2.4.4', '<' ) ) {
            delete_transient(HCFW_CACHE);
            delete_transient(HCFW_CARD_IMAGES_CACHE );
        }

    } else {
        // Pre v2.4.4 - Introducing "hcfw_version"
        delete_transient(HCFW_CACHE);
        delete_transient(HCFW_CARD_IMAGES_CACHE );
    }

    update_option( 'hcfw_version', HCFW_VERSION );
}
add_action( 'admin_init', 'hcfw_plugin_upgrade' );

/**
 * Handle settings form
 */
if ( isset( $_POST["hcfw_submit"] ) ) {

    $delete_cache = false;

    // Receive values
    $hcfw_active = ( ! empty( $_POST["hcfw_active"] ) ) ? '1' : '0';
    $hcfw_language = ( ! empty( $_POST["hcfw_language"] ) ) ? esc_attr( $_POST["hcfw_language"] ) : 'enUS';
    $hcfw_colored_card_names = ( ! empty( $_POST["hcfw_colored_card_names"] ) ) ? '1' : '0';
    $hcfw_bold_links = ( ! empty( $_POST["hcfw_bold_links"] ) ) ? '1' : '0';

    // Handle changes
    if ( isset ( $_POST["hcfw_empty_cache"] ) )
        $delete_cache = true;

    if ( $hcfw_language != get_option( "hcfw_language", 'enUS' ) )
        $delete_cache = true;

    // Empty cache
    if ( $delete_cache ) {
        delete_transient(HCFW_CACHE);
        delete_transient(HCFW_CARD_IMAGES_CACHE);
    }

    // Update options
    update_option("hcfw_active", $hcfw_active);
    update_option("hcfw_language", $hcfw_language);
    update_option("hcfw_colored_card_names", $hcfw_colored_card_names);
    update_option("hcfw_bold_links", $hcfw_bold_links);
}

// Load settings
if( get_option( "hcfw_active" ) == 1 ) {
    $hcfw_activated = true;
} else {
    $hcfw_activated = false;
}

// Setup constants
define('HCFW_ACTIVE', $hcfw_activated);