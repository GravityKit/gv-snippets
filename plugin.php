<?php
/**
 * Plugin Name:       GravityView Mod: Exact Match Search
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/2730-use-exact-match
 * Description:       Exact match search results
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

class GV_Snippet_2730_3 {

	/**
	 * @param string $operator Existing operator; "like" by default
	 * @param array $filter
	 *
	 * @return string "is" To be an exact match
	 */
	public static function search_operator( $operator, $filter = array() ){
		return 'is';
	}
}

add_filter( 'gravityview_search_operator', array( 'GV_Snippet_2730_3', 'search_operator' ), 15 );