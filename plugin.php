<?php
/**
 * Plugin Name:       GravityView Mod: Update Entry Status After Payment
 * Plugin URI:        https://github.com/gravityview/gv-snippets/tree/addon/14028-entry-status
 * Description:       After a payment is completed, approve the entry. If failed or refunded, disapprove.
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

add_action('gform_post_payment_completed', 'gv_approve_entry_post_payment_completed', 10, 2 );

/**
 * After a payment is completed, approve the entry. If failed or refunded, disapprove.
 *
 * @param array $entry
 * @param array $action {
 *   @type bool   $is_fulfilled
 *   @type int    $transaction_id
 *   @type string $transaction_type
 *   @type string $payment_status
 *   @type string $payment_amount
 *   @type string $payment_date
 *   @type string $payment_method
 * }
 *
 * @return void
 */
function gv_approve_entry_post_payment_completed( $entry = array(), $action = array() ) {

	if ( empty( $action['payment_status'] ) || ! class_exists( 'GravityView_Entry_Approval' ) ) {
		return;
	}

	$approved_column_id = GravityView_Entry_Approval::get_approved_column( $entry['form_id'] );

	switch( $action['payment_status'] ) {
		case 'Active': // Subscription
		case 'Paid': // Single
			GravityView_Entry_Approval::update_approved( $entry['id'], GravityView_Entry_Approval_Status::APPROVED, $entry['form_id'], $approved_column_id );
			break;
		default: // Failed, voided, refunded, etc.
			GravityView_Entry_Approval::update_approved( $entry['id'], GravityView_Entry_Approval_Status::DISAPPROVED, $entry['form_id'], $approved_column_id );
			break;
	}
}
