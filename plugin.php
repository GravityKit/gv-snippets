<?php
/**
 * Plugin Name:       GravityView Mod: Don't Encode Field Output
 * Plugin URI:        https://github.com/gravityview/gv-snippets/tree/addon/4321-unescape-output
 * Description:       Removes HTML encoding added to field output. Make sure you trust the content of your entries; this allows Javascript to be run.
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

add_filter( 'gravityview/field_output/html', 'gravityview_field_output_wp_specialchars_decode' );

function gravityview_field_output_wp_specialchars_decode( $html = '' ) {
	$html = wp_specialchars_decode( $html, ENT_QUOTES );
	return $html;
}