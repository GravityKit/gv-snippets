<?php
/**
 * Plugin Name:       GravityView Mod: Prevent Sorting Field 7 in DataTables
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/issue/4633-prevent-sorting-field-7
 * Description:       Disable sorting Field 7 in DataTables
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

add_filter( 'gravityview_datatables_js_options', 'gv_dt_prevent_sorting_field_7', 10, 3 );

/**
 * Prevent sorting
 * @param array $dt_config DataTables JS configuration array
 * @param int $view_id
 * @param int $post
 *
 * @return array
 */
function gv_dt_prevent_sorting_field_7( $dt_config = array(), $view_id = 0, $post = 0) {

	if( isset( $dt_config['columns'] ) ) {
		foreach( $dt_config['columns'] as $key => $column ) {
			if( 'gv_7' === $column['name'] ) {
				$dt_config['columns'][$key]['orderable'] = false;
			}
		}
	}

	return $dt_config;
}