<?php
/**
 * Plugin Name:       GravityView Mod: Hide Entry Approval Column
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/4094-hide-approval-no-connections
 * Description:       Hide the GravityView Entry Approval column when there are no Views connected to the form.
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

add_filter( 'gravityview/approve_entries/hide-if-no-connections', '__return_true' );