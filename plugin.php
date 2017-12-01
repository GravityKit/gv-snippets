<?php
/**
 * Plugin Name:       GravityView Mod: Hide Maps Entries Until Search
 * Plugin URI:        https://github.com/gravityview/gv-snippets/tree/addon/12355-hide-maps-entries
 * Description:       Hide GravityView Maps entries until search—without hiding the markers
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

add_action('gravityview_map_body_before', 'gv_hide_entries_before_search');

/**
 * Hide entries list on a Map View until a search is performed
 *
 * @return void
 */
function gv_hide_entries_before_search() {

	if( GravityView_frontend::getInstance()->is_searching() ) {
		return;
	}

	?>
<style type="text/css">
	.gv-map-container .gv-map-entries {
		display: none;
	}
</style>
}