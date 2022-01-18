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
 * This is an informational plugin that displays data from a variety of NASA public API's
 *
 * @package    local_nasa_portal
 * @copyright  2022 Jon Deavers jonathan.deavers@moodle.com
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
require_once(__DIR__ . '/../../lib/filelib.php');


/**
 * Insert link to index.php on site front page nav menu
 *
 * @param navigation_node $frontpage Node representing the front page in the nav tree
 */
function local_nasa_portal_extend_navigation(navigation_node $frontpage) {
    $frontpage->add(
        get_string('pluginname', 'local_nasa_portal'),
        new moodle_url('/local/nasa_portal/index.php')
    );
}

/**
 * @return object Astronomy Picture of the Day data
 */
function get_apod() {
    $c = new curl;
    $html = $c->get('https://api.nasa.gov/planetary/apod?api_key=WfItBV5eWRn3mKWdp9mfCJpxqfgwLRqkBqok5vhK');
    return json_decode($html);
}
