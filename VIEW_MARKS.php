<?php
/**
 * Kitere Pro - Performance Viewer Controller
 * Fetches the professional UI template
 */

// Configuration
$school_name = "Kitere Primary School";
$current_term = "Term 1, 2026";

// In production, you would fetch the students list from MySQL here
// $results = $db->query("SELECT * FROM marks WHERE subject='Math'");

include 'VIEW_MARKS.html';
?>