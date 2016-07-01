<?php
/**
 * Plugin Name:       	GravityView - Add Missing Fields to Gravity Forms Export
 * Plugin URI:        	https://github.com/katzwebservices/gv-snippets/tree/6031-add-export-fields
 * Description:       	Gravity Forms doesn't include all the entry data in the the Entries export. This adds the option to export these entry values: "Is Starred", "Is Read", "Entry Status", "Is Fulfilled", "Currency", "Transaction Type", "Payment Method"
 * Version:          	1.0
 * Author:            	GravityView
 * Author URI:        	https://gravityview.co
 * License:           	GPLv2 or later
 * License URI: 		http://www.gnu.org/licenses/gpl-2.0.html
 */

add_filter( 'gform_export_fields', 'gravity_forms_export_add_missing_meta_fields' );

function gravity_forms_export_add_missing_meta_fields( $form = array() ) {

	$missing_meta = array(
		array(
			'id' => 'is_starred',
			'label' => __( 'Is Starred', 'gravityforms' ),
		),
		array(
			'id' => 'is_read',
			'label' => __( 'Is Read', 'gravityforms' ),
		),
		array(
			'id' => 'status',
			'label' => __( 'Entry Status', 'gravityforms' ),
		),
		array(
			'id' => 'is_fulfilled',
			'label' => __( 'Is Fulfilled', 'gravityforms' ),
		),
		array(
			'id' => 'currency',
			'label' => __( 'Currency', 'gravityforms' ),
		),
		array(
			'id' => 'transaction_type',
			'label' => __( 'Transaction Type', 'gravityforms' ),
		),
		array(
			'id' => 'payment_method',
			'label' => __( 'Payment Method', 'gravityforms' ),
		),
	);

	$form['fields'] = array_merge( $form['fields'], $missing_meta );

	return $form;
}