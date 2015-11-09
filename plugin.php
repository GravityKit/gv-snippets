<?php
/**
 * Plugin Name:       GravityView Mod: Prevent Automatic Paragraphs in Zones
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/4108-remove-wpautop
 * Description:       Prevent the `wpautop()` function from being applied to View Zones
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

add_filter( 'gravityview/field_output/args', 'gv_unset_wpautop_field_output_args', 10, 2 );

/**
 * Prevent `wpautop()` from being applied to View Zones
 *
 * @param array $args Associative array; `field` and `form` is required.
 * @param array $passed_args Original associative array with field data. `field` and `form` are required.
 */
function gv_unset_wpautop_field_output_args( $args = array(), $passed_args = array() ) {

	$args['wpautop'] = false;

	return $args;
}