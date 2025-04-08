<?php
/**
 * Plugin administration pages are defined here.
 *
 * @package     local_mftandco
 * @category    admin
 * @copyright   2024 Mofet Institute {@link https://macam.ac.il}
 * @author      Mofet Institute {@link https://macam.ac.il}
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $ADMIN, $CFG;

defined('MOODLE_INTERNAL') || die;

if (is_siteadmin()) {
    $page = new admin_settingpage('local_mftandco', get_string('pluginname', 'local_mftandco'));

    $ADMIN->add('localplugins', $page);

    $page->add( new admin_setting_heading( 'mftAndCoHeading', get_string( 'mftAndCoHeading', 'local_mftandco' ), '' ) );



    $name = 'local_mftandco/mftAndCo_code';
    $title = get_string( 'mftAndCo_code', 'local_mftandco' );
    $description = get_string( 'mftAndCo_desc', 'local_mftandco' );
    $default = '';
    $setting = new admin_setting_configtext( $name, $title, $description, $default );
    $page->add( $setting );

    $name = 'local_mftandco/mftAndCo_ref_url';
    $title = get_string( 'mftAndCo_ref_url', 'local_mftandco' );
    $description = get_string( 'mftAndCo_url_desc', 'local_mftandco' );
    $default = '';
    $setting = new admin_setting_configtext( $name, $title, $description, $default );
    $page->add( $setting );
}