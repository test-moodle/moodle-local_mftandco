<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin internal classes, functions and constants are defined here.
 *
 * @package     local_mftandco
 * @copyright   2024 Mofet Institute {@link https://macam.ac.il}
 * @author      Mofet Institute {@link https://macam.ac.il}
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined( 'MOODLE_INTERNAL' ) || die();



function local_mftandco_page_init()
{
}

function local_mftandco_extend_settings_navigation( $navigation )
{
    //    error_log( '---' . __FILE__ . ' at ' . __FUNCTION__ . ' calling the shit', 1, 'vali@macam.ac.il' );
    global $PAGE;
    //    if ( $PAGE->url->get_path() == '/' ) {
    $PAGE->requires->js_call_amd( 'local_mftandco/main', 'init', [] );
    //    }
}

