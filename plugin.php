<?php
/**
 * Plugin Name:       GravityView Mod: Custom Checkbox "Tick"
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/3443-checkbox-tick
 * Description:       Replace checkbox tick icon with "Approved" when the field label is "APV".
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
 * @filter `gravityview_field_tick` Change the output for a checkbox "check" symbol. Default is dashicons-yes icon
 * @see https://developer.wordpress.org/resource/dashicons/#yes
 */
add_filter( 'gravityview_field_tick', 'replace_gravityview_field_tick', 10, 3 );

/**
 * If the column is named APV, return "Approved" instead of a checkbox
 *
 * @param string $output HTML span with `dashicons dashicons-yes` class
 * @param array $entry Gravity Forms entry array
 * @param array $field GravityView field array
 *
 * @return mixed
 */
function replace_gravityview_field_tick( $html, $entry, $field ) {

	$label = GravityView_View::getInstance()->getCurrentFieldSetting('label');
	$custom_label = GravityView_View::getInstance()->getCurrentFieldSetting('custom_label');

	if( in_array( 'APV', array( $label, $custom_label ) ) ) {
		$html = 'Approved';
	}

	return $html;
}