<?php
/**
 * Plugin Name:       GravityView Mod: Force Enable Caching
 * Plugin URI:        https://github.com/gravityview/gv-snippets/tree/16590-enable-cache
 * Description:       By default, caching is disabled when <code>WP_DEBUG</code> is set. Override this to enable caching in GravityView.
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

add_filter( 'gravityview_use_cache', '__return_true' );