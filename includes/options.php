<?php
// Handle settings form
if ( isset( $_POST["hcfw_submit"] ) ) {

    $delete_cards_cache = false;
    $delete_replace_cache = false;

    // Receive values
    $hcfw_active = ( ! empty( $_POST["hcfw_active"] ) ) ? '1' : '0';
    $hcfw_language = ( ! empty( $_POST["hcfw_active"] ) ) ? esc_attr( $_POST["hcfw_language"] ) : 'enUS';
    $hcfw_colored_card_names = ( ! empty( $_POST["hcfw_colored_card_names"] ) ) ? '1' : '0';
    $hcfw_bold_links = ( ! empty( $_POST["hcfw_bold_links"] ) ) ? '1' : '0';

    // Handle changes
    if ( isset ( $_POST["hcfw_empty_cache"] ) ) {
        $delete_cards_cache = true;
        $delete_replace_cache = true;
    }

    if ( $hcfw_language != get_option( "hcfw_language", 'enUS' ) ) {
        $delete_cards_cache = true;
        $delete_replace_cache = true;
    }

    if ( $hcfw_colored_card_names != get_option( "hcfw_colored_card_names", '0' ) )
        $delete_replace_cache = true;

    if ( $hcfw_bold_links != get_option( "hcfw_bold_links", '0' ) )
        $delete_replace_cache = true;

    // Empty cache
    if ( $delete_cards_cache )
        delete_transient( HCFW_CARDS_CACHE );

    if ( $delete_replace_cache )
        delete_transient( HCFW_REPLACE_CACHE );

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