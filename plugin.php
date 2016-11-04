<?php
/**
 * Plugin Name:       GravityView Mod: Approve Entries by Default
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/4575-approve-by-default
 * Description:       When new entries are created in Gravity Forms, add entry approval status. Requires Gravity Forms 1.9.14.26 or newer.
 * Version:           1.0.2
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
 * When new entries are created in Gravity Forms, add entry approval status
 *
 * @param array $entry Gravity Forms entry array
 * @param array $form Gravity Forms form array
 * @return void
 */
function gv_post_add_entry_approve_entry( $entry, $form ) {
	
	$approved_status = 1;
	
	if( class_exists('GravityView_Entry_Approval_Status') ) {
		$approved_status = GravityView_Entry_Approval_Status::APPROVED;
	}
	
	gform_update_meta( $entry['id'], 'is_approved', $approved_status );
}

add_action( 'gform_entry_created', 'gv_post_add_entry_approve_entry', 10, 2 );
add_action( 'gform_post_add_entry', 'gv_post_add_entry_approve_entry', 10, 2 );
