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
 * Handlers for Moodle AJAX Web Service.
 *
 * @package     local_mftandco
 * @category    x
 * @copyright   2024 Mofet Institute {@link https://macam.ac.il}
 * @author      Mofet Institute {@link https://macam.ac.il}
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mftandco\external;

defined( 'MOODLE_INTERNAL' ) || die();

global $CFG;

use context_system;
use dml_exception;
use external_api;
use external_function_parameters;
use external_single_structure;
use external_value;
use moodle_url;
use stdClass;

/**
 * If you are developing a plugin whose codebase is used or tested in multiple Moodle versions, including older versions of Moodle, then you:
 *    must require_once the lib/externallib.php file
 *    must extend the external_api class instead of \core_external\external_api
 */
require_once( $CFG->libdir . '/externallib.php' );

class GetMftAndCo extends external_api
{
    /**
     * Describe the expected parameters of the function.
     *
     * @return external_function_parameters  description of method parameters
     */
    public static function GetMftAndCoCode_parameters(): external_function_parameters
    {
        return new external_function_parameters( [] );
    }

    /**
     * Called with the functions and performs the expected actions.
     *
     * @return array
     * @throws dml_exception
     */
    public static function GetMftAndCoCode( /*$args*/ ): array
    {
        $my_code = get_config( 'local_mftandco', 'mftAndCo_code' );
        $aLinkData['link'] = htmlentities( $my_code );

        $my_url = get_config( 'local_mftandco', 'mftAndCo_ref_url' );
        $my_url = '<meta name="xmlns:c" content="' . $my_url . '">';
        $urlData['url'] = htmlentities( $my_url );

        return [ 'MftAndCoCode' => json_encode( $aLinkData ),
                 'MftAndCoUrl'  => json_encode( $urlData ) ];
    }

    /**
     * Describe the values returned by the function.
     *
     * @return external_single_structure
     */
    public static function GetMftAndCoCode_returns(): external_single_structure
    {
        return new external_single_structure( [ 'MftAndCoCode' => new external_value( PARAM_TEXT, 'JSON expected' ),
                                                'MftAndCoUrl'  => new external_value( PARAM_TEXT, 'JSON expected' ) ] );
    }

}
