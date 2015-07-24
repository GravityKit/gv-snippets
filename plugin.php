<?php
/**
 * Plugin Name:       GravityView Mod: Search Mode "All"
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/2643-search-mode-all
 * Description:       Change the GravityView search mode to use "All" instead of "Any"
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

class GV_Snippet_2643 {

	public static function add_hooks(){
		add_filter( 'gravityview/search/mode', array( $this, 'gv_my_modify_search_mode' ), 10, 1 );
	}

	/**
	 * Force searches to match all parameters, not any.
	 *
	 * @link http://docs.gravityview.co/article/55-how-do-i-modify-the-search-mode
	 * @param string $mode 'any' or 'all'
	 */
	function gv_my_modify_search_mode ( $mode ) {
		return 'all'; // by default is 'any'
	}

}

add_action( 'plugins_loaded', array( 'GV_Snippet_2643', 'add_hooks' ), 15 );