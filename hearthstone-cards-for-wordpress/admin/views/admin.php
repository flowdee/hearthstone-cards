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
 * @copyright 2014 flowdee
 */
?>

<?php
$hcfw_active = get_option('hcfw_active');
$hcfw_language = get_option('hcfw_language');
?>

<div class="wrap hcfw-wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <div class="updated below-h2">
        <p><strong>Update 1.2 comes along with a usability rebuild to improve reliable card name detection.</strong></p>
        <p>Please use e.g. <strong>[Druid of the Claw]</strong> to convert your card names within your WordPress pages or posts.</p>
    </div>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">

                    <div class="postbox">

                        <form action="" method="POST">
                            <h3><span><?php _e( 'Configuration' ); ?></span></h3>
                            <div class="inside">
                                <p><?php _e( 'Here you can find a few options to customize the output' ); ?>.</p>

                                <table class="form-table">
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php _e( 'Show cards' ); ?></th>
                                            <td>
                                                <fieldset>
                                                    <label for="hcfw_active">
                                                        <input name="hcfw_active" type="checkbox" id="hcfw_active" value="1"<?php if($hcfw_active == 1) echo ' checked="checked"'; ?> />
                                                        <span><?php _e( 'Enabled' ); ?></span>
                                                    </label>
                                                </fieldset>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php _e( 'Language of cards' ); ?></th>
                                            <td>
                                                <fieldset>
                                                    <select name="hcfw_language" id="hcfw_language">
                                                        <option<?php if($hcfw_language == 'enUS') echo ' selected="selected"'; ?> value="enUS">English</option>
                                                        <option<?php if($hcfw_language == 'frFR') echo ' selected="selected"'; ?> value="frFR">French</option>
                                                        <option<?php if($hcfw_language == 'deDE') echo ' selected="selected"'; ?> value="deDE">German</option>
                                                        <option<?php if($hcfw_language == 'ruRU') echo ' selected="selected"'; ?> value="ruRU">Russian</option>
                                                        <option<?php if($hcfw_language == 'esES') echo ' selected="selected"'; ?> value="esES">Spanish</option>
                                                    </select>
                                                </fieldset>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>
                                    <input class="button-primary" type="submit" name="hcfw_submit" value="<?php _e( 'Update' ); ?>" />
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
                            <p>Hearthstone Cards for WordPress automatically adds an overlay to written card names and displays the associated image while hovering them.</p>
                            <p>All of my plugins & themes are handmade with passion. I really looking forward to your feedback and suggestions.</p>
                            <p>© Copyright 2014 <a href="http://www.flowdee.de" title="flowdee">flowdee</a></p>
                        </div> <!-- .inside -->

                    </div> <!-- .postbox -->

                    <div class="postbox hcfw-postbox hcfw-support">

                        <h3><span> Support & Resources</span></h3>
                        <div class="inside">
                            <ul>
                                <li><a href="http://codecanyon.net/user/flowdee?ref=flowdee" title="Envato Author Profile">Envato Author Profile</a></li>
                                <li><a href="http://codecanyon.net/user/flowdee/portfolio?ref=flowdee" title="Envato Portfolio">Envato Portfolio</a></li>
                                <li><a href="http://coder.flowdee.de/hearthstone-cards-for-wordpress/documentation/" title="View Documentation">View Documentation</a></li>
                                <li><a href="http://coder.flowdee.de/support/" title="Support Forum">Support Forum</a></li>
                                <li><a href="http://coder.flowdee.de/contact/" title="Contact via E-Mail">Contact via E-Mail</a></li>
                            </ul>
                        </div> <!-- .inside -->

                    </div> <!-- .postbox -->

                </div> <!-- .meta-box-sortables -->

            </div> <!-- #postbox-container-1 .postbox-container -->

        </div> <!-- #post-body .metabox-holder .columns-2 -->

        <br class="clear">
    </div> <!-- #poststuff -->

</div> <!-- .wrap -->