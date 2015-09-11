<?php
/**
 * Plugin Name:       GravityView Mod: Force the "Gender" field to match exactly
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/58
 * Description:       Change the search operator for View #58 to match field ID #20 exactly.
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

add_filter( 'gravityview_get_entries_58', 'gravityview_modify_search_criteria_for_view_58' );

function gravityview_modify_search_criteria_for_view_58( $parameters, $args = array(), $form_id = 0 ) {

	if( !empty( $parameters['search_criteria']['field_filters'] ) ) {
		foreach ( $parameters['search_criteria']['field_filters'] as &$filter ) {
			if ( 20 === (int)$filter['key'] ) {
				$filter['operator'] = 'is';
			}
		}
	}

	return $parameters;
}