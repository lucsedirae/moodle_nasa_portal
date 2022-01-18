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

if ($hassiteconfig) {
    $ADMIN->add('localplugins', new admin_category('local_nasa_portal_settings', get_string('pluginname', 'local_nasa_portal')));
    $settingspage = new admin_settingpage('managelocalnasaportal', get_string('pluginname', 'local_nasa_portal'));

    if ($ADMIN->fulltree) {
        $settingspage->add(new admin_setting_heading('apod', get_string('apodheader', 'local_nasa_portal'),
            get_string('apodheader', 'local_nasa_portal')));
        $settingspage->add(new admin_setting_configcheckbox('local_nasa_portal/apod',
            get_string('include', 'local_nasa_portal') . '?',
            get_string('apodsettingsdescription', 'local_nasa_portal'),
            1));
    }
    $ADMIN->add('localplugins', $settingspage);
}
