<?php
/**
 * Plugin Name:       GravityView Mod: Disable Checking Content-Length in DataTables
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/__ID__
 * Description:       When inaccurate content length is calculated due to plugin or theme conflicts, this disables the GravityView check.
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
 * Disable the Content-Length header on the AJAX JSON response
 * @param boolean $has_content_length true by default
 */
add_filter( 'gravityview/datatables/json/header/content_length', '__return_false' );