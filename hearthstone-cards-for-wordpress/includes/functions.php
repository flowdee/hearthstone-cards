<?php
// Search & Replace Card Names
function hcfw_find_and_replace_cards($content){

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

    // Read json file
    $json_file = HCFW_PATH . 'includes/lib/AllSets.' . $json_lang . '.json';

    if (function_exists('curl_version'))
    {
        $string = file_get_contents_curl($json_file);
    }
    else if (file_get_contents(__FILE__) && ini_get('allow_url_fopen'))
    {
        $string = file_get_contents($json_file);
    }

    if(isset($string) && !empty($string)) {

        // Prepare content
        $json_a = json_decode($string,true);

        $hearthstoneCards = array();

        foreach ($json_a as $key => $value){


            foreach($value as $sub) {

                if(isset($sub['cost'])) {

                    $newName = '<a class="hcfw-card" data-hcfw-card-id="' . $sub['id'] . '" data-hcfw-lang="'.$data_hcfw_lang.'" data-hcfw-width="'.$data_hcfw_width.'" data-hcfw-height="'.$data_hcfw_height.'" href="#" title="' . $sub['name'] . '">' . $sub['name'] . '</a>';

                    $hearthstoneCards[$sub['name']] = $newName;

                }
            }
        }

        $content = str_replace(array_keys($hearthstoneCards), $hearthstoneCards, $content);
    }

    return $content;
}

// WP-Filter für den Inhalt und den Exerpt (Inhalts-Auszug)
if(HCFW_ACTIVE) {
    add_filter('the_content', 'hcfw_find_and_replace_cards');
    add_filter('the_excerpt', 'hcfw_find_and_replace_cards');
}

function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}