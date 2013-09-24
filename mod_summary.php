<?php
require_once('../../../config.php');
require_once($CFG->dirroot . '/course/lib.php');
require_once($CFG->dirroot . '/course/format/grid/lib.php');
require_login();

$course = optional_param('course', '', PARAM_INT);
$showsummary = optional_param('showsummary', 0, PARAM_INT);

// Ensure format_grid_summary field status exists.
$courseformat = course_get_format($course);
$summary_status = $courseformat->get_summary_visibility($course);
$DB->set_field('format_grid_summary', 'showsummary', $showsummary, 
    array('courseid' => $course, 'id' => $summary_status->id));

redirect($CFG->wwwroot . "/course/view.php?id=" . $course);
