<?php
/**
 * Plugin Name:       GravityView Mod: Make "Year of Project" Numeric
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/4760-numeric
 * Description:       Gravity Forms isn't sorting the field values properly.
 * Version:           1.0
 * Author:            GravityView
 * Author URI:        https://gravityview.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ){
	die;
}

/**
 * Modify the sorting parameters to set sorting based on "Year of Project" field to a numeric sort, instead of text.
 *
 * @param array $parameters Array with `search_criteria`, `sorting` and `paging` keys.
 * @param array $args View configuration args. {
 *      @type int $id View id
 *      @type int $page_size Number of entries to show per page
 *      @type string $sort_field Form field id to sort
 *      @type string $sort_direction Sorting direction ('ASC' or 'DESC')
 *      @type string $start_date - Ymd
 *      @type string $end_date - Ymd
 *      @type string $class - assign a html class to the view
 *      @type string $offset (optional) - This is the start point in the current data set (0 index based).
 * }
 * @param int $form_id ID of Gravity Forms form
 *
 * @return array Modified parameters
 */
function gv_snippet_make_year_of_project_numeric( $parameters, $args, $form_id = 0 ) {

	// Only modify for "Project Input Form"
	if( 8 === intval( $form_id ) ) {

		// Make sure it exists
		if ( isset( $parameters['sorting'] ) && is_array( $parameters['sorting'] ) && isset( $parameters['sorting']['key'] ) ) {

			// The "Year of Project" field
			if ( 78 === intval( $parameters['sorting']['key'] ) ) {
				$parameters['sorting']['is_numeric'] = true;
			}
		}
	}

	return $parameters;
}

add_filter( 'gravityview_get_entries', 'gv_snippet_make_year_of_project_numeric', 10, 3 );