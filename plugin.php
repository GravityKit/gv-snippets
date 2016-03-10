<?php
/**
 * Plugin Name:       GravityView Mod: Change "/entry/" to "/item/"
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/5192-rename-endpoint
 * Description:       Instead of using "/view/entry/{id}/", use "/view/item/{id}/"
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

add_filter('gravityview_directory_endpoint', 'gravityview_directory_endpoint_change_to_item');

/**
 * Change the /entry/ URL piece to /item/
 * @param  string $endpoint Previous endpoint, default: "entry"
 * @return string           Change the new endpoint to "name"
 */
function gravityview_directory_endpoint_change_to_item( $endpoint ) {
	return 'item';
}