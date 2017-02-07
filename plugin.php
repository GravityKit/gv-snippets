<?php
/**
 * Plugin Name:       GravityView Mod: Modify View Offsets
 * Plugin URI:        https://github.com/gravityview/gv-snippets/tree/addon/8037-view-offsets
 * Description:       View #304 should only display the first 24 entries, View #866 and #869 should only display the second 24 entries
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
 * View 304 should only get the first 24 entries
 */
add_filter( 'gravityview_get_entries_304', 'ontwerpkliniek_get_first_24_entries' );

/**
 * @param array $parameters Array with `search_criteria`, `sorting` and `paging` keys.
 * @param array $args View configuration args.
 * @param int $form_id Gravity Forms form ID
 *
 * @return array
 */
function ontwerpkliniek_get_first_24_entries( $parameters = array(), $args = array(), $form_id = 0 ) {

	// Always force page 1
	$parameters['pagenum'] = 1;
	$parameters['offset'] = 0;
	$parameters['page_size'] = 24;

	return $parameters;
}

/**
 * View 866 and 869 should only get the second 24 entries
 */
add_filter( 'gravityview_get_entries_866', 'ontwerpkliniek_get_second_24_entries' );
add_filter( 'gravityview_get_entries_869', 'ontwerpkliniek_get_second_24_entries' );

/**
 * @param array $parameters Array with `search_criteria`, `sorting` and `paging` keys.
 * @param array $args View configuration args.
 * @param int $form_id Gravity Forms form ID
 *
 * @return array
 */
function ontwerpkliniek_get_second_24_entries( $parameters = array(), $args = array(), $form_id = 0 ) {

	// Always force page 1
	$parameters['pagenum'] = 1;
	$parameters['offset'] = 24;
	$parameters['page_size'] = 24;

	return $parameters;
}