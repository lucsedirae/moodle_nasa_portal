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
namespace local_nasa_portal\form;
defined('MOODLE_INTERNAL') || die();
use moodleform;
require_once("$CFG->libdir/formslib.php");

class rover_input extends moodleform {
    public function definition()
    {
        global $CFG;

        $mform = $this->_form;

        $mform->addElement('header', 'formheader', get_string('roverformheader', 'local_nasa_portal'));

    }
}