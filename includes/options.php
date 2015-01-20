<?php
// Handle settings form
if (isset($_POST["hcfw_submit"])) {

    // Do the saving
    $hcfw_active = esc_attr($_POST["hcfw_active"]);
    update_option("hcfw_active", $hcfw_active);

    $hcfw_language = esc_attr($_POST["hcfw_language"]);
    update_option("hcfw_language", $hcfw_language);

    $hcfw_colored_card_names = esc_attr($_POST["hcfw_colored_card_names"]);
    update_option("hcfw_colored_card_names", $hcfw_colored_card_names);

    $hcfw_bold_links = esc_attr($_POST["hcfw_bold_links"]);
    update_option("hcfw_bold_links", $hcfw_bold_links);
}

// Load settings
if(get_option("hcfw_active") == 1) {
    $hcfw_activated = true;
} else {
    $hcfw_activated = false;
}

// Setup constants
define('HCFW_ACTIVE', $hcfw_activated);