<?php
/*
 * Build replacements
 */
function hcfw_get_replacements() {

    static $replace;

    if (is_array($replace)) {
        return $replace;
    }

    // No data available, build new
    $replace = array();

    // Load user settings: Language
    $hcfw_language = get_option('hcfw_language');

    if(!empty($hcfw_language)) {
        switch($hcfw_language)
        {
            case ("enUS"):
                $json_lang = 'enUS';
                $data_hcfw_lang = 'enus';
                break;

            case ("frFR"):
                $json_lang = 'frFR';
                $data_hcfw_lang = 'frfr';
                break;

            case ("deDE"):
                $json_lang = 'deDE';
                $data_hcfw_lang = 'dede';
                break;

            case ("ruRU"):
                $json_lang = 'ruRU';
                $data_hcfw_lang = 'ruru';
                break;

            case ("esES"):
                $json_lang = 'esES';
                $data_hcfw_lang = 'eses';
                break;

            case ("ptBR"):
                $json_lang = 'ptBR';
                $data_hcfw_lang = 'ptbr';
                break;

            case ("zhCN"):
                $json_lang = 'zhCN';
                $data_hcfw_lang = 'zhcn';
                break;

            default:
                $json_lang = 'enUS';
                $data_hcfw_lang = 'enus';
                break;
        }
    } else {
        $json_lang = 'enUS';
        $data_hcfw_lang = 'enus';
    }

    // Card sizes
    $data_hcfw_width = '200';
    $data_hcfw_height = '303';

    // Load user settings: Customizations
    $hcfw_colored_card_names = get_option('hcfw_colored_card_names');

    $hcfw_bold_links = get_option('hcfw_bold_links');

    // Fetch latest data from API
    if ( false === ( $string = get_transient( HCFW_CACHE ) ) ) {

        try {

            // Try API call
            $response = wp_remote_get( 'https://api.hearthstonejson.com/v1/latest/' . $json_lang . '/cards.json', array(
                'timeout' => 15,
                'sslverify' => false
            ));

            if ( is_wp_error( $response ) ) {
                $string = null;

            } elseif ( is_array( $response ) && isset ( $response['body'] ) && strpos( $response['body'], '"type":"SPELL"') !== false ) {
                $string = $response['body'];
                set_transient( HCFW_CACHE, $string, 60 * 60 * 120 );

            } else {
                $string = null;
            }

        } catch ( Exception $ex ) {
            $string = null;
        }
    }

    // Fallback when no newer API data available
    if ( empty ( $string ) ) {
        // Read json file
        $json_file = HCFW_DIR . 'includes/data/' . $json_lang . '/cards.json';

        // Read json file
        $string = file_get_contents($json_file);
    }

    // Images
    //$image_paths = hcfw_get_card_image_paths();
    $images = hcfw_get_card_images();

    // Action
    if( !empty($string) ) {

        // Prepare content
        $json_a = json_decode($string,true);

        foreach ($json_a as $key => $sub){

            if ( ! isset( $sub['id'] ) || ! isset( $sub['name'] ) )
                continue;

            if ( ! isset ( $sub['type'] ) || 'ENCHANTMENT' == $sub['type'] )
                continue;

            /* // Deprecated
            if ( ! isset( $image_paths[$sub['id']] ) )
                continue;

            $image_path = $image_paths[$sub['id']];
            */

            if ( ! isset( $images[$sub['id']] ) )
                continue;

            $image_url = $images[$sub['id']];

            if ( isset ( $sub['collectible'] ) || isset ( $sub['set'] ) && $sub['set'] == 'CORE' ) {

                // Setup classes
                $classes = 'hcfw-card';

                if($hcfw_colored_card_names == 1 && isset($sub['rarity'])) {
                    $classes .= ' hcfw-card-rarity-' . strtolower($sub['rarity']);
                }

                if($hcfw_bold_links == 1) {
                    $classes .= ' hcfw-bold';
                }

                // Setup link
                //$newName = '<a class="' . $classes . '" data-hcfw-card-id="' . $sub['id'] . '" data-hcfw-lang="'.$data_hcfw_lang.'" data-hcfw-width="'.$data_hcfw_width.'" data-hcfw-height="'.$data_hcfw_height.'" href="#" title="' . $sub['name'] . '" data-hcfw-image-path="' . $image_path . '">' . $sub['name'] . '</a>'; // Deprecated

                $newName = '<a class="' . $classes . '" data-hcfw-card-id="' . $sub['id'] . '" data-hcfw-lang="'.$data_hcfw_lang.'" data-hcfw-width="'.$data_hcfw_width.'" data-hcfw-height="'.$data_hcfw_height.'" href="#" title="' . $sub['name'] . '" data-hcfw-image-url="' . $image_url . '">' . $sub['name'] . '</a>';

                $replace['[' . $sub['name'] . ']'] = $newName;
                $replace['[' . htmlentities($sub['name'], ENT_COMPAT, 'UTF-8') . ']'] = $newName;
                $replace['[' . str_replace("'", '&#8217;', $sub['name']) . ']'] = $newName;

                // Gold cards
                //$newNameGold = '<a class="' . $classes . '" data-hcfw-card-id="' . $sub['id'] . '" data-hcfw-lang="'.$data_hcfw_lang.'" data-hcfw-width="'.$data_hcfw_width.'" data-hcfw-height="'.$data_hcfw_height.'" href="#" title="' . $sub['name'] . '" data-hcfw-image-path="' . $image_path . '" data-hcfw-gold="true">' . $sub['name'] . '</a>'; // Deprecated

                $newNameGold = '<a class="' . $classes . '" data-hcfw-card-id="' . $sub['id'] . '" data-hcfw-lang="'.$data_hcfw_lang.'" data-hcfw-width="'.$data_hcfw_width.'" data-hcfw-height="'.$data_hcfw_height.'" href="#" title="' . $sub['name'] . '" data-hcfw-image-url="' . $image_url . '" data-hcfw-gold="true">' . $sub['name'] . '</a>';

                $replace['[' . $sub['name'] . ' gold]'] = $newNameGold;
                $replace['[' . htmlentities($sub['name'], ENT_COMPAT, 'UTF-8') . ' gold]'] = $newNameGold;
                $replace['[' . str_replace("'", '&#8217;', $sub['name']) . ' gold]'] = $newNameGold;
            }

        }
    }

    return $replace;
}

// Search & Replace Card Names
function hcfw_find_and_replace_cards($content){

    if( is_feed() )
        return $content;

    $replace = hcfw_get_replacements();

    $content = strtr($content, $replace);

    return $content;
}

function hcfw_get_card_images() {

    $images = get_transient( HCFW_CARD_IMAGES_CACHE );

    if ( ! empty( $images ) && is_array( $images ) && sizeof( $images ) > 0 )
        return $images;

    // First prio: Remote call
    try {

        // Try API call
        $response = wp_remote_get( 'https://raw.githubusercontent.com/schmich/hearthstone-card-images/master/images.json', array(
            'timeout' => 15,
            'sslverify' => false
        ));

        if ( is_wp_error( $response ) ) {
            $string = null;

        } elseif ( is_array( $response ) && isset ( $response['body'] ) ) {
            $string = $response['body'];

        } else {
            $string = null;
        }

    } catch ( Exception $ex ) {
        $string = null;
    }

    // Fallback: Local file
    if ( empty( $string ) ) {

        $local_json_file = HCFW_DIR . 'includes/data/images.json';

        // Read json file
        $string = file_get_contents( $local_json_file );
    }

    // Decode json string
    $images_data = json_decode( $string, true );

    // Build paths
    if ( ! empty( $images_data ) && is_array( $images_data ) ) {

        $images = array();

        //hcfw_debug( $images );

        foreach ( $images_data as $image_data ) {
            if ( ! empty( $image_data['id'] ) && ! empty( $image_data['url'] ) )
                $images[$image_data['id']] = $image_data['url'];
        }

        //hcfw_debug( $images );

        // Paths built
        if ( sizeof( $images ) > 0 ) {

            // Store paths
            set_transient( HCFW_CARD_IMAGES_CACHE, $images, 12 * 60 * 24 * 7 ); // 7 Day

            return $images;
        }
    }

    return null;
}

function hcfw_get_card_image_paths() { // Deprecated

    $paths = get_transient( HCFW_CARD_IMAGE_PATHS_CACHE );

    if ( ! empty( $paths ) && is_array( $paths ) && sizeof( $paths ) > 0 )
        return $paths;

    // First prio: Remote call
    try {

        // Try API call
        $response = wp_remote_get( 'https://raw.githubusercontent.com/schmich/hearthstone-card-images/master/images.json', array(
            'timeout' => 15,
            'sslverify' => false
        ));

        if ( is_wp_error( $response ) ) {
            $string = null;

        } elseif ( is_array( $response ) && isset ( $response['body'] ) ) {
            $string = $response['body'];

        } else {
            $string = null;
        }

    } catch ( Exception $ex ) {
        $string = null;
    }

    // Fallback: Local file
    if ( empty( $string ) ) {

        $local_json_file = HCFW_DIR . 'includes/data/images.json';

        // Read json file
        $string = file_get_contents( $local_json_file );
    }

    // Decode json string
    $images = json_decode( $string, true );

    // Build paths
    if ( ! empty( $images ) && is_array( $images ) ) {

        $paths = array();

        //hcfw_debug( $images );

        foreach ( $images as $image ) {
            if ( ! empty( $image['id'] ) && ! empty( $image['path'] ) )
                $paths[$image['id']] = $image['path'];
        }

        hcfw_debug( $paths );

        // Paths built
        if ( sizeof( $paths ) > 0 ) {

            // Store paths
            set_transient( HCFW_CARD_IMAGE_PATHS_CACHE, $paths, 12 * 60 * 24 * 7 ); // 7 Day

            return $paths;
        }
    }

    return null;
}

// Filter
if(HCFW_ACTIVE) {
    add_filter('the_content', 'hcfw_find_and_replace_cards');
    add_filter('the_excerpt', 'hcfw_find_and_replace_cards');

    // Page Builder & Widgets
    add_filter('widget_text', 'hcfw_find_and_replace_cards');
    // Comments
    add_filter('comment_text', 'hcfw_find_and_replace_cards');
    // bbPress
    add_filter('bbp_get_topic_content', 'hcfw_find_and_replace_cards');
    add_filter('bbp_get_reply_content', 'hcfw_find_and_replace_cards');
    // BuddyPress
    add_filter('bp_get_activity_content_body', 'hcfw_find_and_replace_cards');
    add_filter('bp_get_the_thread_message_content', 'hcfw_find_and_replace_cards');
}

/*
 * Debug
 */
add_shortcode( 'hcfw_debug', function() {

    ob_start();

    $paths = hcfw_get_card_image_paths();

    hcfw_debug($paths);

    $str = ob_get_clean();

    return $str;
});

function hcfw_debug( $args ) {
    echo '<pre>';
    print_r($args);
    echo '</pre>';
}