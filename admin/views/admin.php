<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   Hearthstone_Cards_for_WordPress
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

<div class="wrap hcfw-wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">

                    <div class="postbox">

                        <form action="" method="POST">
                            <h3><span><?php _e( 'Configuration', 'hcfw' ); ?></span></h3>
                            <div class="inside">
                                <p><?php _e( 'Here you can find a few options to customize the output.', 'hcfw' ); ?></p>

                                <table class="form-table">
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php _e( 'Show cards', 'hcfw' ); ?></th>
                                            <td>
                                                <fieldset>
                                                    <label for="hcfw_active">
                                                        <input name="hcfw_active" type="checkbox" id="hcfw_active" value="1"<?php if($hcfw_active == 1) echo ' checked="checked"'; ?> />
                                                        <span><?php _e( 'Enabled', 'hcfw' ); ?></span>
                                                    </label>
                                                </fieldset>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php _e( 'Language of cards', 'hcfw' ); ?></th>
                                            <td>
                                                <fieldset>
                                                    <select name="hcfw_language" id="hcfw_language">
                                                        <option<?php if($hcfw_language == 'enUS') echo ' selected="selected"'; ?> value="enUS"><?php _e( 'English', 'hcfw' ); ?></option>
                                                        <option<?php if($hcfw_language == 'frFR') echo ' selected="selected"'; ?> value="frFR"><?php _e( 'French', 'hcfw' ); ?></option>
                                                        <option<?php if($hcfw_language == 'deDE') echo ' selected="selected"'; ?> value="deDE"><?php _e( 'German', 'hcfw' ); ?></option>
                                                        <option<?php if($hcfw_language == 'ruRU') echo ' selected="selected"'; ?> value="ruRU"><?php _e( 'Russian', 'hcfw' ); ?></option>
                                                        <option<?php if($hcfw_language == 'esES') echo ' selected="selected"'; ?> value="esES"><?php _e( 'Spanish', 'hcfw' ); ?></option>
                                                    </select>
                                                </fieldset>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php _e( 'Colored card names', 'hcfw' ); ?></th>
                                            <td>
                                                <fieldset>
                                                    <label for="hcfw_colored_card_names">
                                                        <input name="hcfw_colored_card_names" type="checkbox" id="hcfw_colored_card_names" value="1"<?php if($hcfw_colored_card_names == 1) echo ' checked="checked"'; ?> />
                                                        <span><?php _e( 'Enabled', 'hcfw' ); ?></span>
                                                    </label>
                                                    <p><?php _e( 'e.g.', 'hcfw' ); ?> <span class="hcfw-card-rarity-Free"><?php _e( 'Holy Nova', 'hcfw' ); ?></span>,
                                                        <span class="hcfw-card-rarity-Common"><?php _e( 'Shadow Madness', 'hcfw' ); ?></span>,
                                                        <span class="hcfw-card-rarity-Rare"><?php _e( 'Loot Hoarder', 'hcfw' ); ?></span>,
                                                        <span class="hcfw-card-rarity-Epic"><?php _e( 'Cabal Shadow Priest', 'hcfw' ); ?></span>,
                                                        <span class="hcfw-card-rarity-Legendary"><?php _e( 'Ragnaros the Firelord', 'hcfw' ); ?></span>
                                                    </p>
                                                </fieldset>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php _e( 'Bold card names' ); ?></th>
                                            <td>
                                                <fieldset>
                                                    <label for="hcfw_bold_links">
                                                        <input name="hcfw_bold_links" type="checkbox" id="hcfw_bold_links" value="1"<?php if($hcfw_bold_links == 1) echo ' checked="checked"'; ?> />
                                                        <span><?php _e( 'Enabled', 'hcfw' ); ?></span>
                                                    </label>
                                                    <p><?php _e( 'e.g.', 'hcfw' ); ?> <span class="hcfw-card-rarity-Common"><?php _e( 'Shadow Madness', 'hcfw' ); ?></span> <?php _e( 'or', 'hcfw' ); ?>
                                                        <span class="hcfw-bold hcfw-card-rarity-Common"><?php _e( 'Shadow Madness', 'hcfw' ); ?></span>
                                                    </p>
                                                </fieldset>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>
                                    <input class="button-primary" type="submit" name="hcfw_submit" value="<?php _e( 'Update settings', 'hcfw' ); ?>" />
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
                            <p><?php _e( 'Hearthstone Cards for WordPress adds an overlay to written card names within brackets e.g. [Druid of the Claw] and displays the associated image while hovering the card name.', 'hcfw' ); ?></p>
                            <p><?php _e( 'All of my plugins & themes are handmade with passion. I really looking forward to your feedback and suggestions.', 'hcfw' ); ?></p>
                            <p>© Copyright <?php echo date('Y'); ?> <a href="http://www.flowdee.de" title="flowdee" target="_blank">flowdee</a></p>
                        </div> <!-- .inside -->

                    </div> <!-- .postbox -->

                    <div class="postbox hcfw-postbox hcfw-support">

                        <h3><span><?php _e( 'Support & Resources', 'hcfw' ); ?></span></h3>
                        <div class="inside">
                            <ul>
                                <li><a href="http://coder.flowdee.de/hearthstone-cards-for-wordpress/" title="Visit plugin page" target="_blank"><?php _e( 'Visit plugin page', 'hcfw' ); ?></a></li>
                                <li><a href="http://coder.flowdee.de/hearthstone-cards-for-wordpress/demo/" title="View Documentation"><?php _e( 'View online demo', 'hcfw' ); ?></a></li>
                                <li><a href="http://coder.flowdee.de/hearthstone-cards-for-wordpress/documentation/" title="View Documentation"><?php _e( 'View documentation', 'hcfw' ); ?></a></li>
                                <li><a href="https://github.com/flowdee/hearthstone-cards-for-wordpress/issues" title="Issue Tracker"><?php _e( 'Issue tracker', 'hcfw' ); ?></a></li>
                                <li><a href="https://twitter.com/flowdee" title="Follow me on Twitter"><?php _e( 'Follow me on Twitter', 'hcfw' ); ?></a></li>
                            </ul>
                        </div> <!-- .inside -->

                    </div> <!-- .postbox -->

                </div> <!-- .meta-box-sortables -->

            </div> <!-- #postbox-container-1 .postbox-container -->

        </div> <!-- #post-body .metabox-holder .columns-2 -->

        <br class="clear">
    </div> <!-- #poststuff -->

</div> <!-- .wrap -->