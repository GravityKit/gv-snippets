<?php
/**
 * Plugin Name:       GravityView Mod: Filter Recent Entries
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/2548
 * Description:       Filter Recent Entries
 * Version:           0.1.0
 * Author:            GravityView
 * Author URI:        https://gravityview.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ){
	die;
}

class GV_Snippet_2548 {
	public static $ID = 2548;

	private static $_instance = null;

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct(){
		add_filter( 'gravityview/widget/recent-entries/criteria', array( $this, 'filter_contributions' ), 10, 3 );
	}

	/**
	 * The View ID of the Group listing - '899'
	 * The form ID used for the Member Directory - '2'
	 * The field ID which contains the Profile ID on the Member form - '7'
	 * The field ID which contains the Profile ID on the Group form - '16'
	 */
	public function filter_contributions( $criteria, $instance, $form_id ) {

		if ( ! class_exists( 'GFAPI' ) || ! function_exists( 'gravityview_is_single_entry' ) || 899 !== $instance['view_id']  ) {
			return $criteria;
		}

		$entry_id = gravityview_is_single_entry();

		if ( ! $entry_id ) {
			return $criteria;
		}

		$entry = GFAPI::get_entry( $entry_id );

		if ( empty( $entry['7'] ) ) {
			return $criteria;
		}

		$criteria['search_criteria']['field_filters']['mode'] = 'all';
		
		$criteria['search_criteria']['field_filters'][] = array( 
			'key' => '16', 
			'value' => $entry['7'],
			'operator' => 'is'
		);

		// change the order of the entries
		$criteria['sorting'] = array('key' => '16', 'direction' => 'asc' );

		return $criteria;
	}

}
add_action( 'plugins_loaded', array( 'GV_Snippet_2548', 'instance' ), 15 );
