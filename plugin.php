<?php
/**
 * Plugin Name:       GravityView Mod: Allow Entry To Not Meet Search Criteria
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/4849-dont-check-entry-display
 * Description:       Don't check whether the entry being displayed meets Advanced Filter search criteria (a date range, for examples). Requires GravityView 1.16.2.
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

add_filter( 'gravityview/common/get_entry/check_entry_display', '__return_false' );