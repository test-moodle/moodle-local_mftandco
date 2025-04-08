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
 * Put together the stuff for the local_mft.
 *
 * #package     local_mft
 * @category    x
 * @copyright   2023 Mofet Institute {@link https://macam.ac.il}
 * @author      Mofet Institute {@link https://macam.ac.il}
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/*var mftGlobals = {'carouselOnFront': null, 'carouselOnMy': null};*/

define([
    'jquery',
    'core/ajax',
    //'core/notification',
], function ($, ajax) {

    'use strict';

    /**
     * Initialize the relevant listeners.
     */
    const init = () => {
        addMftAndCoCode_new();
    };

    const addMftAndCoCode_new = () => {
        if (document.querySelector("footer#page-footer") !== null) {
            let request = {
                methodname: 'local_mftandco_getMftAndCoCode',
                args: [],
            };
            // .fail(notification.exception)
            return ajax.call([request], true, false)[0].then((data) => {
                if (true === data.hasOwnProperty('MftAndCoCode')) {
                    let oMftAndCoData = JSON.parse(data.MftAndCoCode),
                        oMftAndCoObject = new DOMParser().parseFromString(oMftAndCoData.link, "text/html"),
                        oFooterobj = document.querySelector("head");
                    oFooterobj.insertAdjacentHTML('beforeend', oMftAndCoObject.documentElement.textContent);
                    let sSrcMatch = oMftAndCoObject.documentElement.textContent.match(/<script[^>]*src="([^"]*)"[^>]*>/);
                    if (sSrcMatch !== null && sSrcMatch[1] !== null) {
                        $.getScript(sSrcMatch[1]);
                    }
                }

                if (true === data.hasOwnProperty('MftAndCoUrl')) {
                    let oMftAndCoData = JSON.parse(data.MftAndCoUrl),
                        oMftAndCoObject = new DOMParser().parseFromString(oMftAndCoData.url, "text/html"),
                        oFooterobj = document.querySelector("head");
                    oFooterobj.insertAdjacentHTML('beforeend', oMftAndCoObject.documentElement.textContent);
                    let sSrcMatch = oMftAndCoObject.documentElement.textContent.match(/<script[^>]*src="([^"]*)"[^>]*>/);
                    if (sSrcMatch !== null && sSrcMatch[1] !== null) {
                        $.getScript(sSrcMatch[1]);
                    }
                }
            });
        }
    };

    return {
        // Module exports.
        init: init
    };
});
