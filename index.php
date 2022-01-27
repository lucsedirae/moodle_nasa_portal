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

use local_nasa_portal\form\rover_input;

require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../lib/filelib.php');
require_once(__DIR__ . '/lib.php');

$PAGE->set_url(new moodle_url('/local/nasa_portal/index.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('pluginname', 'local_nasa_portal'));
$PAGE->set_heading(get_string('pluginname', 'local_nasa_portal'));

require_login();

// REFACTOR NOTE: can make one settings object and test against its properties
// Astronomy picture of the day.
$apod = null;
$apodsettings = new \stdClass();
$apodsettings->apod = get_config('local_nasa_portal', 'apod');
if ($apodsettings->apod === '1') {
    $apod = local_nasa_portal_get_apod();
}

// Rover photos.
$roverphotos = null;
$roverform = null;
$roverphotossettings = new \stdClass();
$roverphotossettings->roverphotos = get_config('local_nasa_portal', 'roverphotos');
if ($roverphotossettings->roverphotos === '1') {
    $roverphotos = local_nasa_portal_get_rover_photos();
    $roverform = new rover_input();
}


// Output.
echo $OUTPUT->header();
if ($apod !== null) {
    echo $OUTPUT->render_from_template('local_nasa_portal/apod', $apod);
}
if ($roverphotos !== null) {
    echo $OUTPUT->render_from_template('local_nasa_portal/rover', $roverphotos);
    $roverform->display();
}
echo $OUTPUT->footer();
