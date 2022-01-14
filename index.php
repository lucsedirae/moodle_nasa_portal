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
 * Reading list plugin to maintain a list of books or URL's to refer to
 *
 * @package    local_nasa_portal
 * @copyright  2022 Jon Deavers jonathan.deavers@moodle.com
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../lib/filelib.php');


$PAGE->set_url(new moodle_url('/local/nasa_portal/index.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('pluginname', 'local_nasa_portal'));
$PAGE->set_heading(get_string('pluginname', 'local_nasa_portal'));

function getdata()
{
    $c = new curl;
    $html = $c->get('https://api.nasa.gov/planetary/apod?api_key=WfItBV5eWRn3mKWdp9mfCJpxqfgwLRqkBqok5vhK');
    return json_decode($html);
}

$data = getdata();
$src = $data->url;

/* Output */
$templatecontext = (object)[
    'src' => $src
];

echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_nasa_portal/nasa_portal', $templatecontext);
echo $OUTPUT->footer();