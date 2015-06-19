<?php
/**
 * Plugin Name:       GravityView Mod: Use DataTables "Compact" Style
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/2677
 * Description:       Use DataTables "Compact" style. <a href="https://datatables.net/examples/styling/compact.html">See example here</a>.
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

function gravityview_datatables_table_class_compact( $class = 'display dataTables' ) {
	return 'display compact dataTables';
}

add_filter( 'gravityview_datatables_table_class', 'gravityview_datatables_table_class_compact' );