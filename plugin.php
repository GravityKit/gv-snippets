<?php
/**
 * Plugin Name:       GravityView Mod: Disable Caching
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/2863-disable-cache
 * Description:       Disable entry caching in GravityView
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

add_filter( 'gravityview_use_cache', '__return_false' );