<?php
/**
 * Plugin Name:       GravityView Mod: Fix unknown issue with get_post_meta
 * Plugin URI:        https://github.com/gravityview/gv-snippets/tree/addon/5344-fix-get-post-meta
 * Description:       Fixes a strange behaviour of the WP function get_post_meta which conflicts with the GravityView plugin
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

class GV_Snippet_5344 {

	public static $ID = 5344;

	private static $_instance = null;

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct(){
		add_filter( 'gravityview/configuration/fields', array( $this, 'fix_directory_fields' ), 10, 2 );
	}

	/**
	 * Hack to fix a really strange issue with the `get_post_meta` WP core function
	 * @param $fields
	 * @param $post_id
	 *
	 * @return string
	 */
	function fix_directory_fields( $fields, $post_id ) {
		if( !empty( $fields ) ) {
			return $fields;
		}
		$new_fields = get_post_meta( $post_id, '_gravityview_directory_fields', false );
		return isset( $new_fields[0] ) ? $new_fields[0] : '';
	}
}

add_action( 'plugins_loaded', array( 'GV_Snippet_5344', 'instance' ), 15 );