<?php
/**
 * Plugin Name:       GravityView Mod: Exact-Match Form Fields
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/13644-exact-match-field
 * Description:       Modify GravityView searches to use exact-matches when searching fields 13 and 14 for form 68.
 * Version:           1.1
 * Author:            GravityView
 * Author URI:        https://gravityview.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ){
	die;
}

add_filter( 'gravityview_fe_search_criteria', 'gravityview_customize_search_operator_13644', 10, 2 );

/**
 * @param array $search_criteria
 * @param int $form_id
 *
 * @return array Modified search, if it's the current form
 */
function gravityview_customize_search_operator_13644( $search_criteria = array(), $form_id = 0 ) {

	// ----- Modify the IDs below ----- //

	/** @var int $exact_match_form_id ID of the form */
	$exact_match_form_id = 68;

	/** @var array $exact_match_fields ID of the fields that should be exact-match. Can also modify single inputs (as strings: "1.2") */
	$exact_match_fields = array( 13, 14 );

	// ----- Do not modify below this line ----- //

	if( $exact_match_form_id !== intval( $form_id ) ) {
		return $search_criteria;
	}

	foreach ( (array) $search_criteria['field_filters'] as $key => $field_filter ) {

		// Don't process for search mode
		if ( ! is_numeric( $key ) ) {
			continue;
		}

		// Not the right fields
		if( ! isset( $field_filter['key'] ) || ! in_array( $field_filter['key'], $exact_match_fields ) ) {
			continue;
		}

		foreach ( $exact_match_fields as $field_id ) {

			$field = GFAPI::get_field( $form_id, $field_id );

			if ( ! $field ) {
				continue;
			}

			if ( 'list' === $field->get_input_type() || $field->storageType === 'json' ) {
				// @see https://gravityview.co/?p=563101 Wrap in quotes
				$search_criteria['field_filters'][ $key ]['value'] = '"' . $field_filter['value'] . '"';
				$search_criteria['field_filters'][ $key ]['operator'] = 'contains';
			} else {
				$search_criteria['field_filters'][ $key ]['operator'] = 'is';
			}
		}
	}

	return $search_criteria;

}