<?php
/**
 * Plugin Name:       GravityView Mod: Change /view/entry/ to /view/ref/
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/4476-change-entry-slug
 * Description:       Change entry slug path from <code>entry</code> to <code>ref</code>.
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

add_filter('gravityview_directory_endpoint', 'gv_snippet_change_the_gravityview_entry_endpoint');

/**
 * Change the /entry/ URL piece to /ref/
 * @param  string $endpoint Previous endpoint, default: "entry"
 * @return string           Change the new endpoint to "name"
 */
function gv_snippet_change_the_gravityview_entry_endpoint( $endpoint ) {
	return 'ref';
}