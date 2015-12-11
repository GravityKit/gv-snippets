<?php
/**
 * Plugin Name:       GravityView Maps Mod: Remove Links From Map Markers
 * Plugin URI:        https://github.com/gravityview/gv-snippets/tree/addon/4423-remove-marker-url
 * Description:       Remove URL links from GravityView Map markers.
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

add_filter( 'gravityview/maps/render/options', 'gravityview_maps_remove_urls_from_markers' );

/**
 * Remove URL links from map markers
 *
 * @param array $map_options
 *
 * @return array Modified map options with # for links
 */
function gravityview_maps_remove_urls_from_markers( $map_options ) {

	if( ! empty( $map_options ) && ! empty( $map_options['markers_info'] ) ) {
		foreach ( $map_options['markers_info'] as $key => $marker ) {
			$map_options['markers_info'][ $key ]['url'] = '#';
		}
	}

	return $map_options;
}