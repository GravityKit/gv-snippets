<?php
/**
 * Plugin Name:       GravityView Mod: Make Date Range Search inclusive
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/2703-date-search-include-limits
 * Description:       When using date range search make sure the date limits are included
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

class GV_Snippet_2703 {

	public static $ID = 2703;

	private static $_instance = null;

	/**
	 * List of View IDs where this code applies
	 * @var array
	 */
	public $views = array( '1583' );

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct(){
		add_filter( 'gravityview_fe_search_criteria', array( $this, 'exact_search' ), 20, 2 );
	}

	function exact_search( $search_criteria, $form_id = '' ) {

		if( function_exists( 'gravityview_get_view_id' ) && !in_array( gravityview_get_view_id(), $this->views ) ) {
			return $search_criteria;
		}

		if( empty( $search_criteria['field_filters'] ) || !is_array( $search_criteria['field_filters'] ) ) {
			return $search_criteria;
		}

		foreach( $search_criteria['field_filters'] as $k => $filter ) {
			if( !empty( $filter['key'] ) && '1' == $filter['key'] ) {
				if( '>' === $filter['operator'] ) {
					$search_criteria['field_filters'][ $k ]['operator'] = '>=';
				} elseif( '<' === $filter['operator'] ) {
					$search_criteria['field_filters'][ $k ]['operator'] = '<=';
				}
			}
		}

		return $search_criteria;

	}


}

add_action( 'plugins_loaded', array( 'GV_Snippet_2703', 'instance' ), 15 );