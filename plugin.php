<?php
/**
 * Plugin Name:       GravityView Mod: Filter recent entries based on the entry created_by user
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/3472-filter-recent-entries
 * Description:       Using the Recent Entries widget, filters the Member History to display only the user's entries
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

class GV_Snippet_3472 {

	public static $ID = 3472;

	private static $_instance = null;

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct(){
		add_filter( 'gravityview/widget/recent-entries/criteria', array( $this, 'filter_work_history' ), 10, 3 );
	}

	/**
	 * Filter the recent entries widget results to just show the work history entries related with the current user entry
	 * Using the following values:
	 *  - Work History View ID #262
	 *  - Work History form Member Name field #6 (contains the user ID)
	 *
	 */
	function filter_work_history(  $criteria, $instance, $form_id ) {
		if( !class_exists( 'GFAPI') || !function_exists('gravityview_is_single_entry') || $instance['view_id'] != '262'  ) {
			return $criteria;
		}
		$entry_id = gravityview_is_single_entry();
		if( !$entry_id ) {
			return $criteria;
		}
		// get the single entry displayed (from the Members form)
		$entry = GFAPI::get_entry( $entry_id );
		if( empty( $entry['created_by'] ) ) {
			return $criteria;
		}
		$criteria['search_criteria']['field_filters'][] = array( 'key' => '6', 'operator' => 'is',  'value' =>  $entry['created_by'] );

		return $criteria;
	}


}

add_action( 'plugins_loaded', array( 'GV_Snippet_3472', 'instance' ), 15 );