<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   Hearthstone_Cards
 * @author    flowdee <support@flowdee.de>
 * @link      http://www.flowdee.de
 * @copyright 2015 flowdee
 */
?>

<?php
$hcfw_active = get_option('hcfw_active');
$hcfw_language = get_option('hcfw_language');
$hcfw_colored_card_names = get_option('hcfw_colored_card_names');
$hcfw_bold_links = get_option('hcfw_bold_links');
?>

<style type="text/css">
    /* This stylesheet is used to style the admin option form of the plugin. */

    /* Customizations */
    .hcfw-bold {
        font-weight: bold;
    }

    /* Rarity */
    .hcfw-card-rarity-free,
    .hcfw-card-rarity-free:hover {
        color: #000;
    }

    .hcfw-card-rarity-common,
    .hcfw-card-rarity-common:hover {
        color: #0faf03;
    }

    .hcfw-card-rarity-rare,
    .hcfw-card-rarity-rare:hover {
        color: #198eff;
    }

    .hcfw-card-rarity-epic,
    .hcfw-card-rarity-epic:hover {
        color: #ab48ee;
    }

    .hcfw-card-rarity-legendary,
    .hcfw-card-rarity-legendary:hover {
        color: #f07000;
    }
</style>

<div class="wrap hcfw-wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">

                    <div class="postbox">

                        <form action="" method="POST">
                            <h2><span><?php _e( 'Configuration', 'hearthstone-cards' ); ?></span></h2>
                            <div class="inside">
                                <p><?php _e( 'Here you can find a few options to customize the output.', 'hearthstone-cards' ); ?></p>

                                <table class="form-table">
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php _e( 'Show cards', 'hearthstone-cards' ); ?></th>
                                            <td>
                                                <fieldset>
                                                    <label for="hcfw_active">
                                                        <input name="hcfw_active" type="checkbox" id="hcfw_active" value="1"<?php if($hcfw_active == 1) echo ' checked="checked"'; ?> />
                                                        <span><?php _e( 'Enabled', 'hearthstone-cards' ); ?></span>
                                                    </label>
                                                </fieldset>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php _e( 'Language of cards', 'hearthstone-cards' ); ?></th>
                                            <td>
                                                <fieldset>
                                                    <select name="hcfw_language" id="hcfw_language">
                                                        <option<?php if($hcfw_language == 'enUS') echo ' selected="selected"'; ?> value="enUS"><?php _e( 'English', 'hearthstone-cards' ); ?></option>
                                                        <option<?php if($hcfw_language == 'zhCN') echo ' selected="selected"'; ?> value="zhCN"><?php _e( 'Chinese', 'hearthstone-cards' ); ?></option>
                                                        <option<?php if($hcfw_language == 'frFR') echo ' selected="selected"'; ?> value="frFR"><?php _e( 'French', 'hearthstone-cards' ); ?></option>
                                                        <option<?php if($hcfw_language == 'deDE') echo ' selected="selected"'; ?> value="deDE"><?php _e( 'German', 'hearthstone-cards' ); ?></option>
                                                        <option<?php if($hcfw_language == 'ruRU') echo ' selected="selected"'; ?> value="ruRU"><?php _e( 'Russian', 'hearthstone-cards' ); ?></option>
                                                        <option<?php if($hcfw_language == 'esES') echo ' selected="selected"'; ?> value="esES"><?php _e( 'Spanish', 'hearthstone-cards' ); ?></option>
                                                        <option<?php if($hcfw_language == 'ptBR') echo ' selected="selected"'; ?> value="ptBR"><?php _e( 'Portuguese (Brazil)', 'hearthstone-cards' ); ?></option>
                                                    </select>
                                                    <p>
                                                        <small><?php _e('Here you can <strong>select the language for the written card names</strong>. Right now the card images are only available in English.', 'hearthstone-cards' ); ?></small>
                                                    </p>
                                                </fieldset>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php _e( 'Colored card names', 'hearthstone-cards' ); ?></th>
                                            <td>
                                                <fieldset>
                                                    <label for="hcfw_colored_card_names">
                                                        <input name="hcfw_colored_card_names" type="checkbox" id="hcfw_colored_card_names" value="1"<?php if($hcfw_colored_card_names == 1) echo ' checked="checked"'; ?> />
                                                        <span><?php _e( 'Enabled', 'hearthstone-cards' ); ?></span>
                                                    </label>
                                                    <p><?php _e( 'e.g.', 'hearthstone-cards' ); ?> <span class="hcfw-card-rarity-Free"><?php _e( 'Holy Nova', 'hearthstone-cards' ); ?></span>,
                                                        <span class="hcfw-card-rarity-common"><?php _e( 'Shadow Madness', 'hearthstone-cards' ); ?></span>,
                                                        <span class="hcfw-card-rarity-rare"><?php _e( 'Loot Hoarder', 'hearthstone-cards' ); ?></span>,
                                                        <span class="hcfw-card-rarity-epic"><?php _e( 'Cabal Shadow Priest', 'hearthstone-cards' ); ?></span>,
                                                        <span class="hcfw-card-rarity-legendary"><?php _e( 'Ragnaros the Firelord', 'hearthstone-cards' ); ?></span>
                                                    </p>
                                                </fieldset>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php _e( 'Bold card names', 'hearthstone-cards' ); ?></th>
                                            <td>
                                                <fieldset>
                                                    <label for="hcfw_bold_links">
                                                        <input name="hcfw_bold_links" type="checkbox" id="hcfw_bold_links" value="1"<?php if($hcfw_bold_links == 1) echo ' checked="checked"'; ?> />
                                                        <span><?php _e( 'Enabled', 'hearthstone-cards' ); ?></span>
                                                    </label>
                                                    <p><?php _e( 'e.g.', 'hearthstone-cards' ); ?> <span class="hcfw-card-rarity-Common"><?php _e( 'Shadow Madness', 'hearthstone-cards' ); ?></span> <?php _e( 'or', 'hearthstone-cards' ); ?>
                                                        <span class="hcfw-bold hcfw-card-rarity-Common"><?php _e( 'Shadow Madness', 'hearthstone-cards' ); ?></span>
                                                    </p>
                                                </fieldset>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php _e( 'Last Update', 'hearthstone-cards' ); ?>
                                                <?php if ( ! function_exists('curl_version') ) { ?><br /><small><?php echo date( get_option('date_format'), strtotime( HCFW_LAST_UPDATE ) ); ?></small><?php } ?>
                                            </th>
                                            <td>
                                                <fieldset>
                                                    <p>
                                                        <?php if ( function_exists('curl_version') ) { ?>
                                                            <span class="" style="color: darkgreen;"><strong><?php _e( 'Cards database will be updated automatically', 'hearthstone-cards' ); ?></strong></span>
                                                        <?php } else { ?>
                                                            <span class="" style="color: darkred;"><strong><?php _e( 'Local cards database will be taken', 'hearthstone-cards' ); ?></strong></span>
                                                        <?php } ?>
                                                    </p>
                                                    <?php if ( ! function_exists('curl_version') ) { ?>
                                                        <p><em><?php _e( 'In order to receive updated cards automatically, <strong>PHP cURL</strong> extension must be enabled on your web hosting.', 'hearthstone-cards' ); ?></em></p>
                                                    <?php } ?>

                                                    <?php if ( function_exists('curl_version') ) { ?>
                                                        <label for="hcfw_empty_cache">
                                                            <input name="hcfw_empty_cache" type="checkbox" id="hcfw_empty_cache" value="1" />
                                                            <span><?php _e( 'Check in order to force updating cards', 'hearthstone-cards' ); ?></span>
                                                        </label>
                                                    <?php } ?>
                                                </fieldset>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>
                                    <input class="button-primary" type="submit" name="hcfw_submit" value="<?php _e( 'Update settings', 'hearthstone-cards' ); ?>" />
                                </p>

                            </div> <!-- .inside -->
                        </form>

                    </div> <!-- .postbox -->

                </div> <!-- .meta-box-sortables .ui-sortable -->

            </div> <!-- post-body-content -->

            <!-- sidebar -->
            <div id="postbox-container-1" class="postbox-container">

                <div class="meta-box-sortables">

                    <div class="postbox hcfw-postbox hcfw-copyright">

                        <h3><span> Information</span></h3>
                        <div class="inside">
                            <p><?php _e( 'Hearthstone Cards for WordPress adds an overlay to written card names within brackets e.g. [Druid of the Claw] and displays the associated image while hovering the card name.', 'hearthstone-cards' ); ?></p>
                            <p><?php _e( 'All of my plugins & themes are handmade with passion. I really looking forward to your feedback and suggestions.', 'hearthstone-cards' ); ?></p>
                            <p>© Copyright <?php echo date('Y'); ?> <a href="http://www.flowdee.de" title="flowdee" target="_blank">flowdee</a></p>
                        </div> <!-- .inside -->

                    </div> <!-- .postbox -->

                    <div class="postbox hcfw-postbox hcfw-support">

                        <h3><span><?php _e( 'Support & Resources', 'hearthstone-cards' ); ?></span></h3>
                        <div class="inside">
                            <ul>
                                <li><a href="https://wordpress.org/plugins/hearthstone-cards/" title="Visit plugin page" target="_blank"><?php _e( 'Visit plugin page', 'hearthstone-cards' ); ?></a></li>
                                <li><a href="https://kryptonitewp.com/demo/hearthstone-cards-wordpress/" title="View online demo"><?php _e( 'View online demo', 'hearthstone-cards' ); ?></a></li>
                                <li><a href="https://github.com/flowdee/hearthstone-cards/issues" title="Issue Tracker"><?php _e( 'Issue tracker', 'hearthstone-cards' ); ?></a></li>
                                <li><a href="https://twitter.com/flowdee" title="Follow me on Twitter"><?php _e( 'Follow me on Twitter', 'hearthstone-cards' ); ?></a></li>
                            </ul>
                        </div> <!-- .inside -->

                    </div> <!-- .postbox -->

                </div> <!-- .meta-box-sortables -->

            </div> <!-- #postbox-container-1 .postbox-container -->

        </div> <!-- #post-body .metabox-holder .columns-2 -->

        <br class="clear">
    </div> <!-- #poststuff -->

</div> <!-- .wrap -->