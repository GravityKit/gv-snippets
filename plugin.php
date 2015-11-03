<?php
/**
 * Plugin Name:       GravityView Mod: Use Event Organiser Google Maps Script
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addons/3920-event-organiser
 * Description:       If the Event Organiser plugin is active, use their Google script instead of GravityView Maps
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

add_filter( 'gravityview_maps_google_script_handle', 'use_event_organizer_google_maps_script' );

/**
 * If the Event Organiser plugin is active, use their Google script instead of GravityView Maps
 *
 * @param string $script The handle to use for the Google Maps API
 *
 * @return string If Event Organiser is active, the Event Organiser script handle. Otherwise, GravityView Map's
 */
function use_event_organizer_google_maps_script( $script = 'gv-google-maps' ) {
	return defined('EVENT_ORGANISER_VER') ? 'eo_GoogleMap' : $script;
}