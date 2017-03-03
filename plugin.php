<?php
/**
 * Plugin Name:       GravityView Mod: Edit Entry Process Feeds
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/edit-entry-process-feeds
 * Description:       Process feeds after an entry has been updated using GravityView's Edit Entry
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

add_action( 'gravityview/edit_entry/after_update', 'gravityview_edit_entry_process_feeds', 10, 4 );

/**
 * Process feeds after an entry has been updated using GravityView Edit Entry
 *
 * @see GFFeedAddOn::maybe_process_feed Triggers feed addons
 *
 * @param array $form Gravity Forms form array
 * @param string $entry_id Numeric ID of the entry that was updated
 * @param GravityView_Edit_Entry_Render $this This object
 *
 * @return void
 */
function gravityview_edit_entry_process_feeds( $form = array(), $entry_id = 0, $object = null ) {

	if ( empty( $form ) ) {
		do_action( 'gravityview_log_error', __FUNCTION__ . ': Form does not exist; gform_entry_post_save not triggered.' );
		return;
	}

	if ( empty( $entry_id ) || ! is_numeric( $entry_id ) ) {
		do_action( 'gravityview_log_error', __FUNCTION__ . ': Entry ID does not exist; gform_entry_post_save not triggered.' );
		return;
	}

	$entry = GFAPI::get_entry( $entry_id );

	/** @see GFFeedAddOn::maybe_process_feed */
	do_action( 'gform_entry_post_save', $entry, $form );
}