<?php
/**
 * Plugin Name:       GravityView Mod: "Delete Entry" Trash Mode
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/trash-entries
 * Description:       When "Delete Entry" is clicked using GravityView, send them to the Trash instead.
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

add_filter( 'gravityview/delete-entry/mode', '_gravityview_delete_entry_mode_return_trash' );

/**
 * Return trash
 *
 * @param string $mode "delete" by default
 *
 * @return string "trash"
 */
function _gravityview_delete_entry_mode_return_trash( $mode = 'delete' ) {
	return 'trash';
}