<?php
/**
 * Plugin Name:       GravityView Mod: Disable User Registration Updates on Edit Entry
 * Plugin URI:        https://github.com/gravityview/gv-snippets/tree/6065-disable-user-registration-update
 * Description:       Prevent User details from being modified during Edit Entry.
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

add_filter( 'gravityview/edit_entry/user_registration/trigger_update', '__return_false' );