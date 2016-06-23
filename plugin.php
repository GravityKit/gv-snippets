<?php
/**
 * Plugin Name:       GravityView Mod: Mark Entry Unread After Edit
 * Plugin URI:        https://github.com/gravityview/gv-snippets/tree/6111-unread-after-edit
 * Description:       Mark an entry as unread after it has been edited in GravityView
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
 * Mark an entry as unread after it has been edited
 *
 * @param array $form Gravity Forms form array
 * @param string $entry_id Numeric ID of the entry that was updated
 *
 * @return void
 */
function gravityview_set_entry_to_unread_after_edit( $form, $entry_id ) {

	$updated = RGFormsModel::update_lead_property( $entry_id, 'is_read', 0 );

	if( false !== $updated ) {
		do_action( 'gravityview_log_debug', sprintf( '%s: Marked Entry ID #%d unread', __FUNCTION__, $entry_id ) );
	} else {
		do_action( 'gravityview_log_error', sprintf( '%s: Failed to marked Entry ID #%d unread', __FUNCTION__, $entry_id ) );
	}
}

add_action( 'gravityview/edit_entry/after_update', 'gravityview_set_entry_to_unread_after_edit', 10, 2 );
