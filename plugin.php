<?php
/**
 * Plugin Name:       GravityView Mod: Bypass Delete Entry Visibility Check
 * Plugin URI:        https://github.com/gravityview/gv-snippets/tree/11148-error-deleting-entry
 * Description:       When deleting an entry, don't check entry visibility. GravityView will still verify the current user has the correct permissions.
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
 * When deleting an entry, don't consider whether the entry is visible
 *
 * The code already checks whether or not the user has the correct permissions, so this extra security isn't
 * strictly necessary. If it causes a problem, it is safe to disable.
 *
 * @param bool $check_entry_display Whether to check entry visibility before gravityview_get_entry() returns an entry
 *
 * @return bool true: Make sure the entry is visible to the current user using the slug/id; false: don't check
 */
function _gravityview_dont_check_entry_display_when_deleting_entry( $check_entry_display = true ) {

	if ( empty( $_GET['delete'] ) || empty( $_GET['entry_id'] ) ) {
		return $check_entry_display;
	}

	// Make sure it's a GravityView request
	$valid_nonce_key = wp_verify_nonce( $_GET['delete'], sprintf( 'delete_%s', $_GET['entry_id'] ) );

	if( ! $valid_nonce_key ) {
		return $check_entry_display;
	}

	return false;
}

add_filter( 'gravityview/common/get_entry/check_entry_display', '_gravityview_dont_check_entry_display_when_deleting_entry' );
